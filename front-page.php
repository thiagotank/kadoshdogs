<?php

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();

        get_template_part('template-parts/hero');
        get_template_part('template-parts/diferenciais');
        get_template_part('template-parts/nossos-caes');
        get_template_part('template-parts/nossa-historia');
        get_template_part('template-parts/reserva');
        get_template_part('template-parts/instagram');
        get_template_part('template-parts/instagram');
    }
}

get_footer();