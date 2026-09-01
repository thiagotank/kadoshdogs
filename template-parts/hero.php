<?php

$current_page_id = get_queried_object_id();
$front_page_id   = (int) get_option('page_on_front');

$current_thumb_id = get_post_thumbnail_id($current_page_id);
$front_thumb_id   = get_post_thumbnail_id($front_page_id);

?>

<section class="hero">

    <div class="site-container hero__container">

        <p class="hero__eyebrow">
            KADOSH DOGS · BOSTON TERRIER
        </p>

        <div class="hero__image">

            <?php if ($front_thumb_id) : ?>

                <?php
                echo wp_get_attachment_image(
                    $front_thumb_id,
                    'large',
                    false,
                    [
                        'loading'       => 'eager',
                        'fetchpriority' => 'high',
                        'alt'           => 'Boston Terrier - Kadosh Dogs',
                        'class'         => 'hero__img',
                    ]
                );
                ?>

            <?php else : ?>

                <div class="hero__placeholder">

                    <strong>DIAGNÓSTICO</strong><br><br>

                    Página atual:
                    <?php echo esc_html($current_page_id); ?>
                    <br>

                    Página inicial configurada:
                    <?php echo esc_html($front_page_id); ?>
                    <br>

                    Imagem da página atual:
                    <?php echo esc_html($current_thumb_id ?: 'NENHUMA'); ?>
                    <br>

                    Imagem da página inicial:
                    <?php echo esc_html($front_thumb_id ?: 'NENHUMA'); ?>

                </div>

            <?php endif; ?>

        </div>

        <div class="hero__content">

            <h1 class="hero__title">
                Filhotes de Boston Terrier
            </h1>

            <p class="hero__description">
                Criação responsável de Boston Terrier,
                com cuidado, acompanhamento e dedicação
                em cada etapa.
            </p>

            <a class="button button--primary" href="#filhotes">
                Conheça nossos filhotes
            </a>

        </div>

    </div>

</section>