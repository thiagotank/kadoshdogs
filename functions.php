<?php

/**
 * Kadosh Dogs
 * Funções principais do tema
 */

if (!defined('ABSPATH')) {
    exit;
}


/**
 * =========================================================
 * CONFIGURAÇÕES DO TEMA
 * =========================================================
 */
function kadoshdogs_setup()
{
    // WordPress controla a tag <title>
    add_theme_support('title-tag');

    // Habilita imagens destacadas
    add_theme_support('post-thumbnails');

    // Habilita logo personalizada
    add_theme_support('custom-logo');

    // Registra menus
    register_nav_menus([
        'primary' => __('Menu Principal', 'kadoshdogs'),
    ]);

    // Tamanho de imagem para os cards de cães (crop hard)
    add_image_size('dog-card', 1200, 800, true);
}

add_action('after_setup_theme', 'kadoshdogs_setup');


/**
 * =========================================================
 * CSS E JAVASCRIPT
 * =========================================================
 */
function kadoshdogs_assets()
{
    $theme_version = wp_get_theme()->get('Version');

    // CSS principal
    wp_enqueue_style(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        $theme_version
    );

    // JavaScript principal
    wp_enqueue_script(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $theme_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'kadoshdogs_assets');


/**
 * =========================================================
 * CUSTOM POST TYPE - CÃES
 * =========================================================
 *
 * Cria uma área "Cães" no painel administrativo.
 *
 * Cada cão poderá ter:
 * - Nome
 * - Foto destacada
 * - Descrição
 * - Resumo
 */
function kadoshdogs_register_dogs_post_type()
{
    $labels = [
        'name'                  => 'Cães',
        'singular_name'         => 'Cão',
        'menu_name'             => 'Cães',
        'name_admin_bar'        => 'Cão',

        'add_new'               => 'Adicionar novo',
        'add_new_item'          => 'Adicionar novo cão',
        'new_item'              => 'Novo cão',

        'edit_item'             => 'Editar cão',
        'view_item'             => 'Ver cão',

        'all_items'             => 'Todos os cães',
        'search_items'          => 'Buscar cães',

        'parent_item_colon'     => 'Cão pai:',

        'not_found'             => 'Nenhum cão encontrado',
        'not_found_in_trash'    => 'Nenhum cão encontrado na lixeira',

        'featured_image'        => 'Foto do cão',
        'set_featured_image'    => 'Definir foto do cão',
        'remove_featured_image' => 'Remover foto do cão',
        'use_featured_image'    => 'Usar como foto do cão',

        'archives'              => 'Arquivo de cães',
        'insert_into_item'      => 'Inserir no cão',
        'uploaded_to_this_item' => 'Enviado para este cão',
    ];

    $args = [
        'labels' => $labels,

        // Disponível publicamente
        'public' => true,

        // Exibe no painel administrativo
        'show_ui' => true,

        // Exibe no menu do WordPress
        'show_in_menu' => true,

        // Compatibilidade com editor de blocos / REST API
        'show_in_rest' => true,

        // Ícone no painel
        'menu_icon' => 'dashicons-pets',

        // Posição no menu administrativo
        'menu_position' => 6,

        // Recursos disponíveis no cadastro
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        // Cria página de arquivo
        'has_archive' => true,

        // URL amigável
        'rewrite' => [
            'slug'       => 'nossos-caes',
            'with_front' => false,
        ],

        // Permite adicionar ao menu
        'show_in_nav_menus' => true,

        // Permite consultas
        'query_var' => true,

        // Página individual de cada cão
        'publicly_queryable' => true,

        // Não é hierárquico como páginas
        'hierarchical' => false,
    ];

    register_post_type('kadosh_dog', $args);
}

add_action('init', 'kadoshdogs_register_dogs_post_type');