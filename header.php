<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="site-container site-header__inner">

        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            KADOSH DOGS
        </a>

        <nav class="site-nav" aria-label="<?php esc_attr_e('Navegação principal', 'kadoshdogs'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => false,
            ]);
            ?>
        </nav>

    </div>
</header>

<main id="main-content" class="site-main">
