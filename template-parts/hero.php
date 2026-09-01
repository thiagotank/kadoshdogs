<?php

$page_id = get_queried_object_id();

$hero_image = get_the_post_thumbnail(
    $page_id,
    'large',
    [
        'loading'       => 'eager',
        'fetchpriority' => 'high',
        'alt'           => 'Boston Terrier - Kadosh Dogs',
        'class'         => 'hero__img',
    ]
);

?>

<section class="hero">

    <div class="site-container hero__container">

        <p class="hero__eyebrow">
            KADOSH DOGS · BOSTON TERRIER
        </p>

        <div class="hero__image">

            <?php if (!empty($hero_image)) : ?>

                <?php echo $hero_image; ?>

            <?php else : ?>

                <div class="hero__placeholder">
                    Adicione uma imagem destacada nesta página
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

            <a
                class="button button--primary"
                href="#filhotes"
            >
                Conheça nossos filhotes
            </a>

        </div>

    </div>

</section>