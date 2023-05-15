(function ($) {
    $(document).on('click', '.post-filters-categories ul a', function (e) {
        e.preventDefault();
        const term = $(this).data('term');
        $('.post-filters-categories ul a').removeClass('active')
        $(this).addClass('active')

        $.ajax({
            url: site_vars.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_post_filters',
                term_name: term
            },
            beforeSend: function () {
                $('#post-filter-content').html('<div class="preload">Cargando ...</div>');
            },
            success: function (resultado) {
                $('#post-filter-content').html(resultado);
            }
        });
    });

    $(document).on('click', '.filter-order-buttom', function (e) {
        e.preventDefault();
        const dropdown = $('.post-filters-order ul');
        dropdown.toggleClass('dropdown-open');
    });

})(jQuery);

(function ($) {
    $(document).on('click', '.post-filters-order ul input[type="radio"]', function (e) {
        const order = $(this).val();

        $.ajax({
            url: site_vars.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_post_filters',
                orderby: order
            },
            beforeSend: function () {
                $('#post-filter-content').html('<div class="preload">Cargando ...</div>');
            },
            success: function (resultado) {
                $('#post-filter-content').html(resultado);
            }
        });
    });

})(jQuery);

document.addEventListener('DOMContentLoaded', function () {

    if (document.querySelector('.recent-post .swiper')) {
        const swiper = new Swiper(document.querySelector('.recent-post .swiper'), {
            slidesPerView: 4,
            spaceBetween: 24,
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                enabled: false,
                el: '.swiper-scrollbar',
            },
        })
    }
});