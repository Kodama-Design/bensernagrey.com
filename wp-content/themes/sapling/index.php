<?php
$twig = $sapling->get('twig.environment');
ob_start();
wp_head();
$head = ob_get_clean();
ob_start();
wp_footer();
$foot = ob_get_clean();

// publications
$publications = [];
$args = array(
    'numberposts'	=> 4,
    'post_type'		=> 'publication',
);
$the_query = new WP_Query($args);
while($the_query->have_posts()) {
    $the_query->the_post();
    $publications[] = [
        'title' => get_the_title(),
        'thumbnail' => get_the_post_thumbnail(),
        'link' => get_the_permalink(),
    ];
}
wp_reset_query();

// recordings
$recordings = [];
$args = array(
    'numberposts'	=> 4,
    'post_type'		=> 'recording',
    'meta_key'		=> 'recording_mp3',
);
$the_query = new WP_Query($args);
while($the_query->have_posts()) {
    $the_query->the_post();
    $recordings[] = [
        'title' => get_the_title(),
        'file' => get_field('recording_mp3')['url'],
        'link' => get_the_permalink(),
    ];
}
wp_reset_query();

// posts
$posts = [];
query_posts('post_type=post');
while(have_posts()) {
    the_post();
    $posts[] = [
        'title' => get_the_title(),
        'excerpt' => get_the_excerpt(),
    ];
}

echo $twig->render('pages/welcome.html.twig', [
    'head' => $head,
    'foot' => $foot,
    'posts' => $posts,
    'recordings' => $recordings,
    'publications' => $publications,
]);