<?php

if (!defined('ABSPATH')) {
    exit;
}

function kadoshdogs_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    register_nav_menus([
        'primary' => __('Menu Principal', 'kadoshdogs'),
    ]);
}

add_action('after_setup_theme', 'kadoshdogs_setup');


function kadoshdogs_assets()
{
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        $theme_version
    );

    wp_enqueue_script(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $theme_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'kadoshdogs_assets');