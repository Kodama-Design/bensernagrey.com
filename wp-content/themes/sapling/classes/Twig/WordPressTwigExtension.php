<?php
namespace Sapling\Twig;

use Twig_Extension;

class WordPressTwigExtension extends Twig_Extension
{
    public function getFunctions()
    {
        $functions = [];
        $functions[] = new \Twig_SimpleFunction('body_class', function($classes = ''){
            return body_class($classes);
        }, []);


        $functions[] = new \Twig_SimpleFunction('dynamic_sidebar', function($index = 1){
            ob_start();
            dynamic_sidebar($index);
            return ob_get_clean();
        }, []);

        $functions[] = new \Twig_SimpleFunction('post_class', function($classes = '', $post_id = null){
            return get_post_class($classes, $post_id);
        }, []);

        $functions[] = new \Twig_SimpleFunction('stylesheet_directory', function(){
            return get_stylesheet_directory();
        }, []);

        $functions[] = new \Twig_SimpleFunction('stylesheet_directory_uri', function(){
            return get_stylesheet_directory_uri();
        }, []);

        $functions[] = new \Twig_SimpleFunction('template_directory', function(){
            return get_template_directory();
        }, []);

        $functions[] = new \Twig_SimpleFunction('template_directory_uri', function(){
            return get_template_directory_uri();
        }, []);

        $functions[] = new \Twig_SimpleFunction('template_directory_uri', function($slug, $name = null){
            return get_template_part($slug, $name);
        }, []);

        $functions[] = new \Twig_SimpleFunction('theme_support', function($feature){
            return get_theme_support($feature);
        }, []);

        $functions[] = new \Twig_SimpleFunction('theme_root', function($stylesheet_or_template = false){
            return get_theme_root($stylesheet_or_template);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_theme_mod', function($name, $default = false){
            return get_theme_mod($name, $default);
        }, []);

        $functions[] = new \Twig_SimpleFunction('has_header_image', function(){
            return has_header_image();
        }, []);

        $functions[] = new \Twig_SimpleFunction('header_image', function(){
            return get_header_image();
        }, []);

        $functions[] = new \Twig_SimpleFunction('header_textcolor', function(){
            return get_header_textcolor();
        }, []);

        $functions[] = new \Twig_SimpleFunction('locale_stylesheet', function(){
            return locale_stylesheet();
        }, []);

        $functions[] = new \Twig_SimpleFunction('in_the_loop', function(){
            return in_the_loop();
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_child_theme', function(){
            return is_child_theme();
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_active_sidebar', function($index){
            return is_active_sidebar($index);
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_admin_bar_showing', function(){
            return is_admin_bar_showing();
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_customize_preview', function(){
            return is_customize_preview();
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_dynamic_sidebar', function(){
            return is_dynamic_sidebar();
        }, []);

        $functions[] = new \Twig_SimpleFunction('language_attributes', function($doctype = 'html'){
            return get_language_attributes($doctype);
        }, []);

        $functions[] = new \Twig_SimpleFunction('theme', function($stylesheet = null, $theme_root = null){
            return wp_get_theme($stylesheet, $theme_root);
        }, []);

        $functions[] = new \Twig_SimpleFunction('nav_menu', function(array $args = []){
            ob_start();
            wp_nav_menu();
            return ob_get_clean();
        }, []);

        $functions[] = new \Twig_SimpleFunction('nav_menu', function($menu, array $args = []){
            return wp_get_nav_menu_items($menu, $args);
        }, []);

        $functions[] = new \Twig_SimpleFunction('page_menu', function(array $args = []){
            $args['echo'] = false;
            return wp_page_menu($args);
        }, []);

        $functions[] = new \Twig_SimpleFunction('title', function($sep = '&raquo;', $display = true, $seplocation = ''){
            return wp_title($sep, $display, $seplocation);
        }, []);

        $functions[] = new \Twig_SimpleFunction('post_type_supports', function($post_type, $feature){
            return post_type_supports($post_type, $feature);
        }, []);

        $functions[] = new \Twig_SimpleFunction('post_type_exists', function($post_type){
            return post_type_exists($post_type);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_post_type', function($post = null){
            return get_post_type($post);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_post_type_archive_link', function($post_type){
            return get_post_type_archive_link($post_type);
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_post_type_hierarchical', function($post_type){
            return is_post_type_hierarchical($post_type);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_next_posts_link', function($label = null, $max_page = 0){
            return get_next_posts_link($label, $max_page);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_previous_posts_link', function($label = null){
            return get_previous_posts_link($label);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_permalink', function($post = 0, $leavename = false){
            return get_permalink($post, $leavename);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_the_excerpt', function($post = null){
            return get_the_excerpt($post);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_the_post_thumbnail', function($post = null, $size = 'post-thumbnail', $attr = ''){
            return get_the_post_thumbnail($post, $size, $attr);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_the_post_thumbnail', function($ID = ''){
            return get_post_mime_type($ID);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_post_status', function($ID = ''){
            return get_post_status($ID);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_post_format', function($post = null){
            return get_post_format($post);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_edit_post_link', function($id = 0, $context = 'display'){
            return get_edit_post_link($id, $context);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_delete_post_link', function($id = 0, $deprecated = '', $force_delete = false){
            return get_delete_post_link($id, $deprecated, $force_delete);
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_single', function($post = ''){
            return is_single($post);
        }, []);

        $functions[] = new \Twig_SimpleFunction('is_sticky', function($post_id = 0){
            return is_sticky($post_id);
        }, []);

        $functions[] = new \Twig_SimpleFunction('get_the_ID', function(){
            return get_the_ID();
        }, []);

        $functions[] = new \Twig_SimpleFunction('has_post_thumbnail', function($post = null){
            return has_post_thumbnail($post);
        }, []);

        $functions[] = new \Twig_SimpleFunction('has_excerpt', function($id = 0){
            return has_excerpt($id);
        }, []);

        $functions[] = new \Twig_SimpleFunction('has_post_format', function($format = array(), $post = null){
            return has_post_format($format, $post);
        }, []);

        return $functions;
    }


}