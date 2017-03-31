<?php
$twig = $sapling->get('twig.environment');
ob_start();
wp_head();
$head = ob_get_clean();
ob_start();
wp_footer();
$foot = ob_get_clean();

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
]);