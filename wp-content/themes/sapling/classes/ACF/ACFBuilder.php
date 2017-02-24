<?php
namespace Sapling\ACF;


class ACFBuilder
{
    public function __construct()
    {
        if(!function_exists('acf_add_local_field_group')) {
            trigger_error('ACF must be installed to use this theme', E_USER_ERROR);
        }
    }

    public function addOptionsPage($page_title, $menu_title, $menu_slug, $capability = 'edit_theme_options', $redirect = false)
    {
        return acf_add_options_page(array(
            'page_title' 	=> $page_title,
            'menu_title'	=> $menu_title,
            'menu_slug' 	=> $menu_slug,
            'capability'	=> $capability,
            'redirect'		=> $redirect,
        ));
    }

    public function addOptionsSubPage($page_title, $menu_title, $parent_slug)
    {
        return acf_add_options_sub_page(array(
            'page_title' 	=> $page_title,
            'menu_title'	=> $menu_title,
            'parent_slug'	=> $parent_slug,
        ));
    }

    public function addLocalFieldGroup($key, $title, array $fields = [], array $locations = [])
    {
        acf_add_local_field_group(array(
            'key' => $key,
            'title' => $title,
            'fields' => $fields,
            'location' => $locations,
        ));
        return $key;
    }
}