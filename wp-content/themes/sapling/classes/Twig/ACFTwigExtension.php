<?php
namespace Sapling\Twig;

use Twig_Extension;

class ACFTwigExtension extends Twig_Extension
{
    public function getFunctions()
    {
        $functions = [];
        $functions[] = new \Twig_SimpleFunction('get_field', function($selector, $post_id = false, $format_value = true){
            return get_field($selector, $post_id, $format_value);
        }, []);

        return $functions;
    }


}