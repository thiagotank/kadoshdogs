<?php

$dogs = new WP_Query([
    'post_type'      => 'kadosh_dog',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!$dogs->have_posts()) {
    return;
}
?>

<section class="dogs" id="nossos-caes">

    <div class="site-container">

        <div class="dogs__heading">

            <p class="dogs__eyebrow">
                NOSSOS CÃES
            </p>

            <h2 class="dogs__title">
                Conheça nossos Boston Terriers
            </h2>

            <p class="dogs__description">
                Cada cão faz parte da nossa história e representa
                o cuidado, a seleção e o carinho que fazem parte
                da Kadosh Dogs.
            </p>

        </div>

        <div class="dogs__grid">

            <?php while ($dogs->have_posts()) : $dogs->the_post(); ?>

                <article class="dog-card">

                    <?php if (has_post_thumbnail()) : ?>

                        <a
                            href="<?php the_permalink(); ?>"
                            class="dog-card__image"
                            aria-label="<?php echo esc_attr(sprintf(__('Conheça %s', 'kadoshdogs'), get_the_title())); ?>"
                        >
                            <?php
                            the_post_thumbnail(
                                'large',
                                [
                                    'loading' => 'lazy',
                                    'alt'     => esc_attr(get_the_title()),
                                ]
                            );
                            ?>
                        </a>

                    <?php endif; ?>

                    <div class="dog-card__content">

                        <h3 class="dog-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <?php if (has_excerpt()) : ?>

                            <p class="dog-card__description">
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <div class="dogs__footer">

            <a
                href="<?php echo esc_url(get_post_type_archive_link('kadosh_dog')); ?>"
                class="dogs__link"
            >
                Conheça todos os nossos cães →
            </a>

        </div>

    </div>

</section>

<?php wp_reset_postdata(); ?>
