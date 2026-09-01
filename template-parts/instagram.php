<?php

if (!defined('ABSPATH')) {
    exit;
}

$page_id = get_queried_object_id();

?>

<section class="instagram-section" id="instagram">

    <div class="site-container">

        <div class="instagram-section__heading">

            <p class="instagram-section__eyebrow">
                SIGA NOSSA ROTINA
            </p>

            <h2 class="instagram-section__title">
                Acompanhe a Kadosh Dogs no Instagram
            </h2>

            <p class="instagram-section__description">
                Veja nossos cães, filhotes e um pouco da rotina
                da Kadosh Dogs.
            </p>

        </div>

        <div class="instagram-section__grid">

            <?php for ($i = 1; $i <= 4; $i++) : ?>

                <?php

                $image_id = (int) get_post_meta(
                    $page_id,
                    '_kadoshdogs_instagram_' . $i,
                    true
                );

                ?>

                <?php if ($image_id) : ?>

                    <a
                        class="instagram-photo"
                        href="https://www.instagram.com/kadoshdogskennel/"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Ver Kadosh Dogs no Instagram"
                    >

                        <?php

                        echo wp_get_attachment_image(
                            $image_id,
                            'large',
                            false,
                            [
                                'loading' => 'lazy',
                                'alt'     => 'Kadosh Dogs no Instagram',
                            ]
                        );

                        ?>

                    </a>

                <?php else : ?>

                    <div class="instagram-photo">

                        <span>
                            Adicione a foto <?php echo esc_html($i); ?>
                        </span>

                    </div>

                <?php endif; ?>

            <?php endfor; ?>

        </div>

        <div class="instagram-section__footer">

            <a
                class="instagram-section__handle"
                href="https://www.instagram.com/kadoshdogskennel/"
                target="_blank"
                rel="noopener noreferrer"
            >
                @kadoshdogskennel
            </a>

            <a
                class="button button--primary"
                href="https://www.instagram.com/kadoshdogskennel/"
                target="_blank"
                rel="noopener noreferrer"
            >
                Ver Instagram
            </a>

        </div>

    </div>

</section>