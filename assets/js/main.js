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
/**
 * Google Ads - Conversão de clique no WhatsApp
 */
function gtag_report_conversion(url) {
    if (typeof gtag === 'function') {
        gtag('event', 'conversion', {
            send_to: 'AW-726135474/y2vKCMOghekcELLln9oC'
        });
    }

    return true;
}

/**
 * Captura todos os links de WhatsApp do site.
 */
document.addEventListener('DOMContentLoaded', function () {
    const whatsappLinks = document.querySelectorAll(
        'a[href*="wa.me"], a[href*="whatsapp.com"]'
    );

    whatsappLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            gtag_report_conversion(this.href);
        });
    });
});
