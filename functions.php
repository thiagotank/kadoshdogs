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
    $css_file = get_template_directory() . '/assets/css/main.css';

    wp_enqueue_style(
        'kadoshdogs-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        file_exists($css_file) ? filemtime($css_file) : $theme_version
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


/**
 * =========================================================
 * FOTOS DO INSTAGRAM - HOME
 * =========================================================
 */

function kadoshdogs_instagram_meta_box()
{
    add_meta_box(
        'kadoshdogs_instagram',
        'Fotos do Instagram',
        'kadoshdogs_instagram_meta_box_html',
        'page',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'kadoshdogs_instagram_meta_box');


function kadoshdogs_instagram_meta_box_html($post)
{
    wp_nonce_field(
        'kadoshdogs_save_instagram_images',
        'kadoshdogs_instagram_nonce'
    );

    for ($i = 1; $i <= 4; $i++) {

        $meta_key = '_kadoshdogs_instagram_' . $i;

        $image_id = (int) get_post_meta(
            $post->ID,
            $meta_key,
            true
        );

        $image_url = $image_id
            ? wp_get_attachment_image_url($image_id, 'medium')
            : '';
        ?>

        <div
            class="kadoshdogs-instagram-field"
            style="
                margin-bottom: 24px;
                padding-bottom: 24px;
                border-bottom: 1px solid #ddd;
            "
        >

            <strong>
                Foto <?php echo esc_html($i); ?>
            </strong>

            <div style="margin: 12px 0;">

                <img
                    class="kadoshdogs-instagram-preview"
                    src="<?php echo esc_url($image_url); ?>"
                    style="
                        <?php echo $image_url ? '' : 'display:none;'; ?>
                        width: 160px;
                        height: 160px;
                        object-fit: cover;
                        border-radius: 6px;
                    "
                    alt=""
                >

            </div>

            <input
                type="hidden"
                class="kadoshdogs-instagram-image-id"
                name="kadoshdogs_instagram_<?php echo esc_attr($i); ?>"
                value="<?php echo esc_attr($image_id); ?>"
            >

            <button
                type="button"
                class="button kadoshdogs-select-image"
            >
                Selecionar imagem
            </button>

            <button
                type="button"
                class="button kadoshdogs-remove-image"
                <?php echo $image_id ? '' : 'style="display:none;"'; ?>
            >
                Remover
            </button>

        </div>

        <?php
    }
}


function kadoshdogs_save_instagram_images($post_id)
{
    if (
        !isset($_POST['kadoshdogs_instagram_nonce']) ||
        !wp_verify_nonce(
            $_POST['kadoshdogs_instagram_nonce'],
            'kadoshdogs_save_instagram_images'
        )
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    for ($i = 1; $i <= 4; $i++) {

        $field = 'kadoshdogs_instagram_' . $i;
        $meta_key = '_kadoshdogs_instagram_' . $i;

        if (!empty($_POST[$field])) {

            update_post_meta(
                $post_id,
                $meta_key,
                absint($_POST[$field])
            );

        } else {

            delete_post_meta(
                $post_id,
                $meta_key
            );
        }
    }
}

add_action(
    'save_post_page',
    'kadoshdogs_save_instagram_images'
);


/**
 * Biblioteca de mídia no editor da página
 */
function kadoshdogs_instagram_admin_assets($hook)
{
    if (
        $hook !== 'post.php' &&
        $hook !== 'post-new.php'
    ) {
        return;
    }

    wp_enqueue_media();
}

add_action(
    'admin_enqueue_scripts',
    'kadoshdogs_instagram_admin_assets'
);


/**
 * JavaScript do seletor de imagens
 */
function kadoshdogs_instagram_admin_script()
{
    global $pagenow;

    if (
        $pagenow !== 'post.php' &&
        $pagenow !== 'post-new.php'
    ) {
        return;
    }
    ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll(
            '.kadoshdogs-select-image'
        ).forEach(function (button) {

            button.addEventListener('click', function () {

                const container = button.closest(
                    '.kadoshdogs-instagram-field'
                );

                const input = container.querySelector(
                    '.kadoshdogs-instagram-image-id'
                );

                const preview = container.querySelector(
                    '.kadoshdogs-instagram-preview'
                );

                const removeButton = container.querySelector(
                    '.kadoshdogs-remove-image'
                );

                const frame = wp.media({
                    title: 'Selecionar foto do Instagram',
                    button: {
                        text: 'Usar esta imagem'
                    },
                    multiple: false
                });

                frame.on('select', function () {

                    const attachment = frame
                        .state()
                        .get('selection')
                        .first()
                        .toJSON();

                    input.value = attachment.id;

                    preview.src =
                        attachment.sizes &&
                        attachment.sizes.medium
                            ? attachment.sizes.medium.url
                            : attachment.url;

                    preview.style.display = 'block';
                    removeButton.style.display = 'inline-block';
                });

                frame.open();
            });
        });


        document.querySelectorAll(
            '.kadoshdogs-remove-image'
        ).forEach(function (button) {

            button.addEventListener('click', function () {

                const container = button.closest(
                    '.kadoshdogs-instagram-field'
                );

                const input = container.querySelector(
                    '.kadoshdogs-instagram-image-id'
                );

                const preview = container.querySelector(
                    '.kadoshdogs-instagram-preview'
                );

                input.value = '';
                preview.src = '';
                preview.style.display = 'none';
                button.style.display = 'none';
            });
        });

    });
    </script>

    <?php
}

add_action(
    'admin_footer',
    'kadoshdogs_instagram_admin_script'
);