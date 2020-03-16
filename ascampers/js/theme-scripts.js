(function($) {

    $('.slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.galerija').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.galerija2').slick({
        infinite: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rows: 1,

        nextArrow: '<button type="button" class="lijevo"><span class="ikonal"></span></button>',
        prevArrow: '<button type="button" class="desno"><span class="ikonad"></span></button>'
    });

})(jQuery);