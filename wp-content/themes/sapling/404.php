<?php
$twig = $sapling->get('twig.environment');
ob_start();
wp_head();
$head = ob_get_clean();
ob_start();
wp_footer();
$foot = ob_get_clean();
echo $twig->render('pages/404.html.twig', [
    'head' => $head,
    'foot' => $foot,
]);