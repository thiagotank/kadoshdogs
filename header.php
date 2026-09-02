<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php

$whatsapp_number = '5511983903907';

$whatsapp_message = rawurlencode(
    'Olá! Visitei o site da Kadosh Dogs e gostaria de saber mais sobre os filhotes de Boston Terrier.'
);

$whatsapp_url = 'https://wa.me/' . $whatsapp_number . '?text=' . $whatsapp_message;

?>

<header class="site-header">

    <div class="site-container site-header__inner">

        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="site-logo"
            aria-label="Kadosh Dogs - Página inicial"
        >
            <span class="site-logo__name">
                KADOSH DOGS
            </span>

            <span class="site-logo__breed">
                BOSTON TERRIER
            </span>
        </a>


        <button
            class="site-nav-toggle"
            type="button"
            aria-expanded="false"
            aria-controls="site-navigation"
            aria-label="Abrir menu"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


        <div
            class="site-header__navigation"
            id="site-navigation"
        >

            <nav
                class="site-nav"
                aria-label="<?php esc_attr_e('Navegação principal', 'kadoshdogs'); ?>"
            >

                <ul class="site-nav__menu">

                    <li>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            Início
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(home_url('/#nossos-caes')); ?>">
                            Nossos Cães
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(home_url('/#nossa-historia')); ?>">
                            Nossa História
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(home_url('/#como-funciona')); ?>">
                            Como funciona
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(home_url('/#instagram')); ?>">
                            Instagram
                        </a>
                    </li>

                </ul>

            </nav>


            <a
                class="button button--primary site-header__whatsapp"
                href="<?php echo esc_url($whatsapp_url); ?>"
                target="_blank"
                rel="noopener noreferrer"
            >
                WhatsApp
            </a>

        </div>

    </div>

</header>

<main id="main-content" class="site-main">