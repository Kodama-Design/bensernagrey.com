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
    $sapling->setParameter('theme_dir', get_stylesheet_directory());
    $sapling->setParameter('theme_uri', get_stylesheet_directory_uri());
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
    
    $footer_menu = wp_nav_menu([
        "menu_class" => "vertical medium-horizontal menu align-center",
        "items_wrap" => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        "theme_location" => "footer",
        "depth" => 1,
        "echo" => false,
    ]);

    ob_start();
    wp_head();
    $head = ob_get_clean();

    ob_start();
    wp_footer();
    $foot = ob_get_clean();

    $twig = $sapling->get('twig.environment');
    $twig->addGlobal('primary_menu', $primary_menu);
    $twig->addGlobal('footer_menu', $footer_menu);
    $twig->addGlobal('contact_form', gravity_form(1, false, false, false, null, false, 49, false));
    $twig->addGlobal('publications_link', get_post_type_archive_link('publication'));
    $twig->addGlobal('recordings_link', get_post_type_archive_link('recording'));
    $twig->addGlobal('sheet_music_link', get_post_type_archive_link('sheet_music'));
    $twig->addGlobal('posts_link', get_post_type_archive_link('post'));
    $twig->addGlobal('head', $head);
    $twig->addGlobal('foot', $foot);

    //var_dump(get_post_type_archive_link('publication'));exit;
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

    register_taxonomy(
        'album',
        'recording',
        [
            'label' => __('Album'),
            'hierarchical' => false,
        ]
    );

    register_taxonomy(
        'instrumentation',
        'sheet_music',
        [
            'label' => __('Instrumentation'),
            'hierarchical' => false,
        ]
    );

    register_taxonomy(
        'publication_type',
        'publication',
        [
            'label' => __('Publication Type'),
            'hierarchical' => false,
        ]
    );
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

add_action('admin_menu', function(){
    remove_meta_box('tagsdiv-album', 'recording', 'side');
    remove_meta_box('tagsdiv-instrumentation', 'sheet_music', 'side');
    remove_meta_box('tagsdiv-publication_type', 'publication', 'side');
    remove_meta_box('categorydiv', 'publication', 'side');
});

add_action('acf/init', function(){
    $builder = new \Sapling\ACF\ACFBuilder();
    $builder->addOptionsPage('Theme Settings', 'Theme Settings', 'theme-settings', 'manage_options');

    // navigation section in theme options
    $builder->addLocalFieldGroup('settings_navigation', 'Navigation', [], [[[
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-settings',
    ]]], 0);

    $headshot = new \Sapling\ACF\Fields\Image('headshot', 'Head Shot', 'headshot');
    $headshot->setRequired(true);
    $headshot->setWrapper([
            'width' => '50',
            'class' => '',
            'id' => '',
    ]);

    $twitter = new \Sapling\ACF\Fields\Text('twitter', 'Twitter', 'twitter');
    $twitter->setRequired(true);
    $twitter->setDefault('bensernagrey');
    $twitter->setWrapper([
        'width' => '25',
        'class' => '',
        'id' => '',
    ]);
    
    $email = new \Sapling\ACF\Fields\Email('email', 'Email', 'email');
    $email->setRequired(true);
    $email->setDefault('ben@bensernagrey.com');
    $email->setWrapper([
        'width' => '25',
        'class' => '',
        'id' => '',
    ]);
    
    $headshot->register('settings_navigation');
    $twitter->register('settings_navigation');
    $email->register('settings_navigation');

    // header section in theme options
    $builder->addLocalFieldGroup('settings_header', 'Header', [], [[[
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-settings',
    ]]], [], 1);

    $header = new \Sapling\ACF\Fields\Image('header', 'Home Page header', 'header');
    $header->setRequired(true);
    $header->setPreview("hero");

    $header->register('settings_header');

    // footer section in theme options
    $builder->addLocalFieldGroup('settings_footer', 'Footer', [], [[[
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-settings',
    ]]], [], 2);

    $footer = new \Sapling\ACF\Fields\Number('contact_form_id', 'Contact Form ID', 'contact_form_id');
    $footer->setRequired(true);
    $footer->register('settings_footer');

    // Recordings
    $builder->addLocalFieldGroup('recordings', 'Recording', [], [[[
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'recording',
    ]]], [], 0);

    $mp3 = new \Sapling\ACF\Fields\File('recording_mp3', 'MP3', 'recording_mp3');
    $mp3->setRequired(true);
    $mp3->setMimeTypes(["mp3"]);
    $mp3->register('recordings');

    $track = new \Sapling\ACF\Fields\Number('recording_track', 'Track number', 'recording_track');
    $track->setRequired(true);
    $track->setWrapper([
        'width' => '25',
        'class' => '',
        'id' => '',
    ]);
    $track->register('recordings');

    $album = new \Sapling\ACF\Fields\Taxonomy('recording_album', 'album', 'recording_album');
    $album->setTaxonomy('album');
    $album->setFieldType('select');
    $album->setFormat('object');
    $album->setAddTerm(true);
    $album->setWrapper([
        'width' => '75',
        'class' => '',
        'id' => '',
    ]);
    $album->register('recordings');

    // Sheet music
    $builder->addLocalFieldGroup('sheet_music', 'Sheet Music', [], [[[
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'sheet_music',
    ]]], [], 0);

    $instrumentation = new \Sapling\ACF\Fields\Taxonomy('sheet_instrumentation', 'Instrumentation', 'sheet_instrumentation');
    $instrumentation->setTaxonomy('album');
    $instrumentation->setFieldType('select');
    $instrumentation->setFormat('object');
    $instrumentation->setAddTerm(true);
    $instrumentation->setWrapper([
        'width' => '50',
        'class' => '',
        'id' => '',
    ]);
    $instrumentation->register('sheet_music');

    $url = new \Sapling\ACF\Fields\Number('sheet_url', 'URL', 'sheet_url');
    $url->setRequired(true);
    $url->setWrapper([
        'width' => '50',
        'class' => '',
        'id' => '',
    ]);
    $url->register('sheet_music');

    // Publications
    $builder->addLocalFieldGroup('publication', 'Publication', [], [[[
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'publication',
    ]]], [], 0);

    $type = new \Sapling\ACF\Fields\Taxonomy('publish_type', 'Type of Publication', 'publish_type');
    $type->setTaxonomy('publication_type');
    $type->setFieldType('select');
    $type->setFormat('object');
    $type->setAddTerm(true);
    $type->register('publication');

    $type = new \Sapling\ACF\Fields\Taxonomy('publish_category', 'Category', 'publish_category');
    $type->setTaxonomy('category');
    $type->setFieldType('checkbox');
    $type->setFormat('object');
    $type->setAddTerm(true);
    $type->register('publication');

    $publisher = new \Sapling\ACF\Fields\Text('publish_publisher', 'Publisher', 'publish_publisher');
    $publisher->setRequired(true);
    $publisher->setWrapper([
        'width' => '33',
        'class' => '',
        'id' => '',
    ]);
    $publisher->register('publication');

    $date = new \Sapling\ACF\Fields\Date('publish_date', 'Date', 'publish_date');
    $date->setRequired(true);
    $date->setWrapper([
        'width' => '33',
        'class' => '',
        'id' => '',
    ]);
    $date->register('publication');

    $url = new \Sapling\ACF\Fields\URL('publish_url', 'Publish URL', 'publish_url');
    $url->setRequired(true);
    $url->setWrapper([
        'width' => '34',
        'class' => '',
        'id' => '',
    ]);
    $url->register('publication');


});

add_filter('excerpt_more', function ($more) {
    global $post;
    return '... <a href="'. get_permalink($post->ID) . '"> Read More</a>';
});