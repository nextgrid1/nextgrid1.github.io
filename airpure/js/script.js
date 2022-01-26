$(window).on("load", function () {

    "use strict";

/* ===================================
        Loading Timeout
 ====================================== */

    $('.side-menu').removeClass('hidden');
    $('.link').addClass('d-none');

    setTimeout(function () {
        $(".loader").fadeOut("slow");
    }, 400);
});

jQuery(function ($) {

    "use strict";

/* ===================================
        Header Appear
====================================== */

$(window).on('scroll', function () {

    if ($(this).scrollTop() > 500) { // Set position from top to add class
        $('.inner-header').addClass('header-appear');
        $('.link').removeClass('d-none');
    } else {
        $('.inner-header').removeClass('header-appear');
        $('.link').addClass('d-none');
    }
});


/* ===================================
        Navbar smooth Scroll
====================================== */

$(".scroll").on("click", function (event) {
    event.preventDefault();
    $("html,body").animate({
        scrollTop: $(this.hash).offset().top - 80}, 1200);
});


/* ===================================
        WOW Animation
====================================== */

if ($(window).width() > 991) {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true
    });
    new WOW().init();
}

/* ===================================
        Mouse parallax
====================================== */

$('.banner-slider .slider-img-area').mousemove(function(e) {
    $('[data-depth]').each(function () {
        var depth = $(this).data('depth');
        var amountMovedX = (e.pageX * -depth/4);
        var amountMovedY = (e.pageY * -depth/4);

        $(this).css({
            'transform':'translate3d(' + amountMovedX +'px,' + amountMovedY +'px, 0)',
        });
    });
});

/* ===================================
        Counters
====================================== */

$(".company-stats-section").appear(function () {
    $('.stats-number-inner span').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
});

/* ===================================
        Cube Portfolio
====================================== */

$('#js-grid-mosaic').cubeportfolio({
    filters: '#js-filters-mosaic',
    layoutMode: 'grid',
    sortByDimension: true,
    mediaQueries: [{
        width: 1500,
        cols: 2,
    }, {
        width: 1100,
        cols: 2,
    }, {
        width: 768,
        cols: 1,
    }, {
        width: 480,
        cols: 1,
        options: {
            gapHorizontal: 60
        }
    }],
    defaultFilter: '*',
    animationType: 'fadeIn',
    gapHorizontal: 50,
    gapVertical: 50,
    gridAdjustment: 'responsive',
    caption: 'zoom',

    // lightbox
    lightboxDelegate: '.cbp-lightbox',
    lightboxGallery: true,
    lightboxTitleSrc: 'data-title',
    lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

    plugins: {
        loadMore: {
            element: "#js-loadMore-lightbox-gallery",
            action: "click",
            loadItems: 5,
        }
    }
})
    .on('initComplete.cbp', function () {
        // your functionality
        var $this = $(this);
        if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
            $("#js-loadMore-lightbox-gallery").addClass("active");
        } else {
            $("#js-loadMore-lightbox-gallery").removeClass("active");
        }
        $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
            $(this).removeClass("even");

            console.log();
            var val = index + 1;
            if ($(this).css('left') !== "0px") {
                $(this).addClass("even");
            }
        });
    })
    .on('onAfterLoadMore.cbp', function () {
        // your functionality
        var $this = $(this);
        $("#js-loadMore-lightbox-gallery a").addClass("d-none");
        $("#js-loadMore-lightbox-gallery").addClass("active-outer");
        $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
            $(this).removeClass("even");
            console.log();
            var val = index + 1;
            if ($(this).css('left') !== "0px") {
                $(this).addClass("even");
            }
        });
    })
    .on('filterComplete.cbp', function () {
        // your functionality
        var $this = $(this);
        if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
            $("#js-loadMore-lightbox-gallery").addClass("active");
            $("#js-loadMore-lightbox-gallery").removeClass("d-none");
        } else {
            $("#js-loadMore-lightbox-gallery").removeClass("active");
            $("#js-loadMore-lightbox-gallery").addClass("d-none");
        }
        $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
            $(this).removeClass("even");
            var val = index + 1;
            if ($(this).css('left') !== "0px") {
                $(this).addClass("even");
            }
        });
    });

/*=====================================
        Testimonial Carousel
======================================*/
$('.testimonial-box').owlCarousel({
    loop: true,
    margin: 20,
    slideSpeed: 5000,
    slideTransition: 'linear',
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 2
        },
    }
});

});

$(window).on("load", function () {

/* ===================================
    WOW Animation
====================================== */

if ($(window).width() > 991) {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true
    });
    new WOW().init();
}

/* ===================================
        Testimonial-Carousel
====================================== */
$('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 30,
    autoplay: true,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

});