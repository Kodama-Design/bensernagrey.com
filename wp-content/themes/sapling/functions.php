<?php
require_once __DIR__.'/vendor/autoload.php';
global $sapling;

use Sapling\Menu\CustomMenuWalker;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

$sapling_cache = __DIR__.'/cache/sapling.php';
$sapling_config_cache = new ConfigCache($sapling_cache, true);

if($sapling_config_cache->isFresh()) {
    require_once $sapling_cache;
    $sapling = new SaplingContainer();
} else {
    $sapling = new ContainerBuilder();
    $sapling->setParameter('WP_DEBUG', WP_DEBUG);
    $sapling->setParameter('theme_dir', get_stylesheet_directory() . '/');
    $sapling->setParameter('theme_uri', get_stylesheet_directory_uri() . '/');
    $loader = new YamlFileLoader($sapling, new FileLocator(__DIR__));
    $loader->load('config.sapling.yml');
    $sapling->compile();

    $dumper = new PhpDumper($sapling);
    file_put_contents($sapling_cache, $dumper->dump(['class' => 'SaplingContainer']));
}

add_action('after_setup_theme', function() use($sapling) {
    foreach ($sapling->getParameter('remove_theme_supports') as $feature) {
        remove_theme_support($feature);
    }

    foreach ($sapling->getParameter('theme_supports') as $feature) {
        add_theme_support($feature);
    }

    foreach ($sapling->getParameter('remove_menus') as $menu) {
        unregister_nav_menu($menu);
    }

    foreach ($sapling->getParameter('menus') as $menu_name => $menu_description) {
        register_nav_menu($menu_name, __($menu_description, 'sapling'));
    }

    foreach ($sapling->getParameter('remove_theme_mods') as $mod) {
        remove_theme_mod($mod);
    }

    foreach ($sapling->getParameter('theme_mods') as $mod_name => $mod_value) {
        set_theme_mod($mod_name, $mod_value);
    }

    $primary_menu = wp_nav_menu([
        "walker" => new CustomMenuWalker(),
        "menu_class" => "vertical menu",
        "items_wrap" => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        "theme_location" => "primary",
        "depth" => 2,
        "echo" => false,
    ]);
    $twig = $sapling->get('twig.environment');
    $twig->addGlobal('primary_menu', $primary_menu);
});

add_action('init', function() use($sapling) {
    foreach ($sapling->getParameter('image_sizes') as $image_size) {
        add_image_size($image_size['name'], $image_size['width'], $image_size['height'], $image_size['crop'] ?? true);
        if($image_size['add_filter'] ?? true) {
            add_filter('image_size_names_choose', function($sizes) use($image_size) {
                return array_merge($sizes, [
                    $image_size['name'] => $image_size['filter_name'] ?? $image_size['name'],
                ]);
            });
        }
    }

    foreach ($sapling->getParameter('remove_oembed_provider') as $provider) {
        wp_oembed_remove_provider($provider);
    }

    foreach ($sapling->getParameter('post_types') as $post_type => $args) {
        register_post_type($post_type, $args);
    }

    foreach ($sapling->getParameter('remove_post_type_support') as $post_type => $args) {
        remove_post_type_support($post_type, $args);
    }

    foreach ($sapling->getParameter('post_type_support') as $post_type => $args) {
        add_post_type_support($post_type, $args);
    }
});

add_action('widgets_init', function() use($sapling) {
    foreach ($sapling->getParameter('remove_sidebars') as $sidebar) {
        unregister_sidebar($sidebar);
    }

    foreach ($sapling->getParameter('sidebars') as $sidebar) {
        if(isset($sidebar['name'])) {
            $sidebar['name'] == __($sidebar['name'], 'sapling');
        }
        register_sidebar($sidebar);
    }
});

add_action('wp_enqueue_scripts', function() use($sapling) {
    foreach ($sapling->getParameter('remove_stylesheets') as $stylesheet) {
        wp_deregister_style($stylesheet);
    }

    if($sapling->hasParameter('stylesheets')) {
        foreach ($sapling->getParameter('stylesheets') as $stylesheet) {
            wp_register_style(
                $stylesheet['name'],
                $sapling->getParameterBag()->resolveValue($stylesheet['source']),
                $stylesheet['requires'] ?? [],
                $stylesheet['version'] ?? false,
                $stylesheet['media'] ?? 'all'
            );
            wp_enqueue_style($stylesheet['name']);
        }
    }

    foreach ($sapling->getParameter('remove_scripts') as $script) {
        wp_deregister_script($script);
    }

    if($sapling->hasParameter('scripts')) {
        foreach ($sapling->getParameter('scripts') as $script) {
            wp_register_script(
                $script['name'],
                $sapling->getParameterBag()->resolveValue($script['source']),
                $script['requires'] ?? [],
                $script['version'] ?? false,
                $script['footer'] ?? true
            );
            wp_enqueue_script($script['name']);
        }
    }
});

add_action('acf/init', function(){
    $builder = new \Sapling\ACF\ACFBuilder();
    $builder->addLocalFieldGroup('sample', 'Sample', [], [[[
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
    ]]]);
    $textfield = new \Sapling\ACF\Fields\Text('text', 'text', 'text');
    $textfield->register('sample');
});