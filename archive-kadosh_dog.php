<?php
/**
 * Arquivo do post type Cães.
 *
 * @package KadoshDogs
 */

get_header();
?>

<section class="dogs-archive" aria-labelledby="dogs-archive-title">
    <div class="site-container">
        <header class="dogs-archive__header">
            <p class="dogs__eyebrow"><?php esc_html_e('Nossos cães', 'kadoshdogs'); ?></p>
            <h1 id="dogs-archive-title" class="dogs-archive__title"><?php post_type_archive_title(); ?></h1>
            <p class="dogs-archive__description"><?php esc_html_e('Conheça os Boston Terriers que fazem parte da história da Kadosh Dogs.', 'kadoshdogs'); ?></p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="dogs__grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('dog-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a class="dog-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf(__('Conheça %s', 'kadoshdogs'), get_the_title())); ?>">
                                <?php the_post_thumbnail('dog-card', ['loading' => 'lazy']); ?>
                            </a>
                        <?php endif; ?>
                        <div class="dog-card__content">
                            <h2 class="dog-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php if (has_excerpt()) : ?>
                                <p class="dog-card__description"><?php echo esc_html(get_the_excerpt()); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <nav class="dogs-pagination" aria-label="<?php esc_attr_e('Paginação dos cães', 'kadoshdogs'); ?>">
                <?php the_posts_pagination(['mid_size' => 1]); ?>
            </nav>
        <?php else : ?>
            <p><?php esc_html_e('Nenhum cão publicado no momento.', 'kadoshdogs'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
