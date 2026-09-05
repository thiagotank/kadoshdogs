document.addEventListener('DOMContentLoaded', () => {

    const toggle = document.querySelector('.site-nav-toggle');
    const navigation = document.querySelector('.site-header__navigation');

    if (!toggle || !navigation) {
        return;
    }

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

});

/**
 * Google Ads - Conversão de clique no WhatsApp
 */
function gtag_report_conversion(url, target) {
    let openedWindow = null;

    if (target === '_blank' && url) {
        openedWindow = window.open('about:blank', '_blank');
    }

    const callback = function () {
        if (!url) {
            return;
        }

        if (openedWindow) {
            openedWindow.location = url;
            return;
        }

        if (target === '_blank') {
            window.open(url, '_blank', 'noopener,noreferrer');
            return;
        }

        window.location.href = url;
    };

    if (typeof gtag === 'function') {
        gtag('event', 'conversion', {
            send_to: 'AW-726135474/y2vKCMOghekcELLln9oC',
            event_callback: callback
        });

        setTimeout(callback, 1000);
        return;
    }

    callback();
}

/**
 * Captura todos os links de WhatsApp do site.
 */
document.addEventListener('DOMContentLoaded', function () {
    const whatsappLinks = document.querySelectorAll(
        'a[href*="wa.me"], a[href*="whatsapp.com"]'
    );

    whatsappLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const url = this.href;
            const target = this.getAttribute('target');

            gtag_report_conversion(url, target);
        });
    });
});