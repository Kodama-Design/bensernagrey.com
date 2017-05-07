<?php
$twig = $sapling->get('twig.environment');
$template = 'pages/single-'.get_post_type().'.html.twig';
$data = [];

the_post();

$data['title'] = get_the_title();
$data['content'] = get_the_content();

switch(get_post_type()) {
    case 'recording':
        $data['file'] = get_field('recording_mp3')['url'];
        break;
    case 'publication':
        $data['publisher'] = get_field('publish_publisher');
        $data['date'] = get_field('publish_date');
        $data['url'] = get_field('publish_url');
        $data['type'] = get_field('publish_type');
        $data['category'] = get_field('publish_category');
        break;
    default: break;
}

echo $twig->render($template, $data);