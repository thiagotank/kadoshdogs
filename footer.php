<?php

if (!defined('ABSPATH')) {
    exit;
}

$whatsapp_number = '5511983903907';

$whatsapp_message = rawurlencode(
    'Olá! Visitei o site da Kadosh Dogs e gostaria de saber mais sobre os filhotes de Boston Terrier.'
);

$whatsapp_url = 'https://wa.me/' . $whatsapp_number . '?text=' . $whatsapp_message;

?>

<footer class="site-footer">

    <div class="site-container">

        <div class="site-footer__grid">

            <!-- Marca -->
            <div class="site-footer__brand">

                <a
                    class="site-footer__logo"
                    href="<?php echo esc_url(home_url('/')); ?>"
                    aria-label="Kadosh Dogs"
                >
                    KADOSH DOGS
                </a>

                <p class="site-footer__breed">
                    BOSTON TERRIER
                </p>

                <p class="site-footer__description">
                    Criação responsável de Boston Terrier,
                    com cuidado, dedicação e acompanhamento
                    em cada etapa.
                </p>

                <p class="site-footer__location">
                    Ribeirão Pires - SP
                </p>

            </div>


            <!-- Navegação -->
            <nav
                class="site-footer__column"
                aria-label="Navegação do rodapé"
            >

                <h2 class="site-footer__title">
                    Navegação
                </h2>

                <ul class="site-footer__menu">

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

                </ul>

            </nav>


            <!-- Contato -->
            <div class="site-footer__column">

                <h2 class="site-footer__title">
                    Contato
                </h2>

                <ul class="site-footer__menu">

                    <li>
                        <a
                            href="<?php echo esc_url($whatsapp_url); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            WhatsApp
                        </a>
                    </li>

                    <li>
                        <a
                            href="https://www.instagram.com/kadoshdogskennel/"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Instagram
                        </a>
                    </li>

                    <li>
                        <a href="tel:+5511983903907">
                            +55 11 98390-3907
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        <!-- Rodapé inferior -->
        <div class="site-footer__bottom">

            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                Kadosh Dogs. Todos os direitos reservados.
            </p>

            <p class="site-footer__signature">
                Boston Terrier Kennel
            </p>

        </div>

    </div>

</footer>


<!-- WhatsApp flutuante -->
<a
    class="whatsapp-float"
    href="<?php echo esc_url($whatsapp_url); ?>"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Falar com a Kadosh Dogs pelo WhatsApp"
>

    <svg
        viewBox="0 0 24 24"
        aria-hidden="true"
        focusable="false"
    >
        <path d="M20.52 3.48A11.78 11.78 0 0 0 12.07 0C5.48 0 .12 5.36.12 11.95c0 2.1.55 4.16 1.6 5.97L0 24l6.24-1.64a11.9 11.9 0 0 0 5.82 1.48h.01C18.66 23.84 24 18.48 24 11.9c0-3.18-1.24-6.16-3.48-8.42ZM12.07 21.83h-.01a9.89 9.89 0 0 1-5.04-1.38l-.36-.21-3.7.97.99-3.61-.23-.37a9.9 9.9 0 0 1-1.52-5.28C2.2 6.47 6.63 2.03 12.08 2.03c2.64 0 5.12 1.03 6.98 2.9a9.81 9.81 0 0 1 2.9 6.98c0 5.45-4.44 9.92-9.89 9.92Zm5.43-7.42c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.66.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.64.07-.3-.15-1.25-.46-2.38-1.47a8.85 8.85 0 0 1-1.65-2.05c-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.66-1.6-.91-2.18-.24-.58-.48-.5-.66-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.87 1.22 3.07c.15.2 2.1 3.2 5.08 4.49.71.3 1.27.49 1.7.63.72.23 1.37.2 1.88.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/>
    </svg>

</a>


<?php wp_footer(); ?>

</body>
</html>