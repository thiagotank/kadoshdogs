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

    // Tamanho de imagem para os cards de cães
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
    $css_file = get_template_directory() . '/assets/css/main.css';

    wp_enqueue_style(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        file_exists($css_file) ? filemtime($css_file) : $theme_version
    );

    // JavaScript principal
    $js_file = get_template_directory() . '/assets/js/main.js';

    wp_enqueue_script(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        file_exists($js_file) ? filemtime($js_file) : $theme_version,
        true
    );
}

add_action('wp_enqueue_scripts', 'kadoshdogs_assets');


/**
 * =========================================================
 * GOOGLE TAG
 * =========================================================
 *
 * Tag principal utilizada para Google Analytics / Google Ads.
 */

function kadoshdogs_google_tag()
{
    ?>
    <!-- Google tag (gtag.js) -->
    <script
        async
        src="https://www.googletagmanager.com/gtag/js?id=G-X2ZKXW5VS1">
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-X2ZKXW5VS1');
    </script>
    <?php
}

add_action('wp_head', 'kadoshdogs_google_tag', 5);


/**
 * =========================================================
 * CUSTOM POST TYPE - CÃES
 * =========================================================
 */

function kadoshdogs_register_dogs_post_type()
{
    // AQUI CONTINUA EXATAMENTE O CÓDIGO
    // QUE VOCÊ JÁ POSSUI NO ARQUIVO.
}