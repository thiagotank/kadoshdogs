<?php
/**
 * Página individual de um cão.
 *
 * @package KadoshDogs
 */

get_header();

while (have_posts()) :
    the_post();
    ?>
    <article <?php post_class('dog-single'); ?>>
        <div class="site-container">
            <header class="dog-single__header">
                <p class="dogs__eyebrow"><?php esc_html_e('Nossos cães', 'kadoshdogs'); ?></p>
                <h1 class="dog-single__title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <p class="dog-single__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('dog-card', ['class' => 'dog-single__image']); ?>
            <?php endif; ?>

            <div class="dog-single__content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
    <?php
endwhile;

get_footer();
