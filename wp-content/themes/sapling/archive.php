<?php
$twig = $sapling->get('twig.environment');
$template = 'pages/archive.html.twig';

// determine template
if(is_post_type_archive('recording')) {
    $template = 'pages/archive-recording.html.twig';
} else if(is_post_type_archive('publication')) {
    $template = 'pages/archive-publication.html.twig';
} else if(is_post_type_archive('sheet_music')) {
    $template = 'pages/archive-sheet_music.html.twig';
}


// get data
$rows = [];
while(have_posts()) {
    the_post();
    if(is_post_type_archive('recording')) {
        $rows[] = [
            'title' => get_the_title(),
            'file' => get_field('recording_mp3')['url'],
            'link' => get_the_permalink(),
        ];
        continue;
    } elseif(is_post_type_archive('publication')) {
        $rows[] = [
            'title' => get_the_title(),
            'thumbnail' => get_the_post_thumbnail(),
            'link' => get_the_permalink(),
        ];
        continue;
    } elseif(is_post_type_archive('sheet_music')) {
        $rows[] = [
            'title' => get_the_title(),
            'description' => get_the_content(),
            'instrumentation' => get_field('sheet_instrumentation'),
            'url' => get_field('sheet_url'),
        ];
        continue;
    }
    $rows[] = [
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
    ];
}

// pagination
global $paged;
global $wp_query;
$current_page = $paged ?: 1;
$pages = $wp_query->max_num_pages ?: 1;

// render
echo $twig->render($template, [
    'posts' => $rows,
    'current_page' => $current_page,
    'pages' => $pages,
]);