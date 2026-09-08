document.addEventListener('DOMContentLoaded', () => {

    const toggle = document.querySelector('.site-nav-toggle');
    const navigation = document.querySelector('.site-header__navigation');

    if (toggle && navigation) {

        toggle.addEventListener('click', () => {

            const isOpen = navigation.classList.toggle('is-open');

            toggle.classList.toggle('is-open', isOpen);

            toggle.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

            toggle.setAttribute(
                'aria-label',
                isOpen ? 'Fechar menu' : 'Abrir menu'
            );

        });


        navigation.querySelectorAll('a').forEach((link) => {

            link.addEventListener('click', () => {

                navigation.classList.remove('is-open');
                toggle.classList.remove('is-open');

                toggle.setAttribute(
                    'aria-expanded',
                    'false'
                );

                toggle.setAttribute(
                    'aria-label',
                    'Abrir menu'
                );

            });

        });

    }

});


/**
 * =========================================================
 * GOOGLE ADS - CONVERSÃO WHATSAPP
 * =========================================================
 *
 * Registra como conversão qualquer clique em links
 * wa.me ou whatsapp.com.
 */

document.addEventListener('click', function (event) {

    const whatsappLink = event.target.closest(
        'a[href*="wa.me"], a[href*="whatsapp.com"]'
    );

    if (!whatsappLink) {
        return;
    }

    if (typeof window.gtag === 'function') {

        window.gtag('event', 'conversion', {
            'send_to': 'AW-726135474/y2vKCMOghekcELLln9oC'
        });

    }

});