<?php
$twig = $sapling->get('twig.environment');
$template = 'pages/page'.'.html.twig';
$data = [];

the_post();

$data['title'] = get_the_title();
$data['content'] = get_the_content();

echo $twig->render($template, $data);