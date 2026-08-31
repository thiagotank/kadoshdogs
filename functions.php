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

<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registra o tipo de conteúdo "Cães"
 */
function kadoshdogs_register_dogs_post_type()
{
    $labels = [
        'name'               => 'Cães',
        'singular_name'      => 'Cão',
        'menu_name'          => 'Cães',
        'name_admin_bar'     => 'Cão',
        'add_new'            => 'Adicionar novo',
        'add_new_item'       => 'Adicionar novo cão',
        'new_item'           => 'Novo cão',
        'edit_item'          => 'Editar cão',
        'view_item'          => 'Ver cão',
        'all_items'          => 'Todos os cães',
        'search_items'       => 'Buscar cães',
        'not_found'          => 'Nenhum cão encontrado',
        'not_found_in_trash' => 'Nenhum cão encontrado na lixeira',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-pets',
        'supports'           => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],
        'has_archive'        => true,
        'rewrite'            => [
            'slug' => 'nossos-caes',
        ],
        'show_in_nav_menus'  => true,
        'menu_position'      => 6,
    ];

    register_post_type('kadosh_dog', $args);
}

add_action('init', 'kadoshdogs_register_dogs_post_type');