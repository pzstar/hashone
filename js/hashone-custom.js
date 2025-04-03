/**
 * Hashone Custom JS
 *
 * @package HashOne
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

jQuery(function ($) {

    if ($('#hs-bx-slider .hs-slide').length > 0) {
        $('#hs-bx-slider').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            animateOut: 'fadeOut',
            mouseDrag: false
        });
    }

    $('.hs-testimonial-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true
    });

    $(".hs_client_logo_slider").owlCarousel({
        items: 5,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            420: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    $(window).scroll(function () {

        if ($(this).scrollTop() > 100) {
            $('.page-template-home-template #hs-masthead, .home.blog #hs-masthead').addClass('animated fadeInDown').fadeIn();
        } else {
            $('#hs-masthead').removeClass('animated fadeInDown');
        }

    });

    var first_class = $('.hs-portfolio-cat-name:first').data('filter');
    $('.hs-portfolio-cat-name:first').addClass('active');

    var $container = $('.hs-portfolio-posts').imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.hs-portfolio',
            layoutMode: 'fitRows',
            filter: first_class,
            percentPosition: true,
        });
    });

    $('.hs-portfolio-cat-name-list').on('click', '.hs-portfolio-cat-name', function () {
        var filterValue = $(this).attr('data-filter');
        $container.isotope({filter: filterValue});
        $('.hs-portfolio-cat-name').removeClass('active');
        $(this).addClass('active');
    });

    $('.hs-portfolio-image').nivoLightbox();

    $(window).on("scroll", function () {
        $("[data-pllx-bg-ratio]").each(function () {
            const $section = $(this);
            const scrollPosition = $(window).scrollTop();
            const offset = $section.offset().top; // Section's distance from top of the document
            const speed = $(this).attr('data-pllx-bg-ratio'); // Adjust this value for parallax speed
            var additionalOffset = 0;

            if ($(this).attr('data-pllx-vertical-offset')) {
                additionalOffset = parseInt($(this).attr('data-pllx-vertical-offset'));
            }

            // Update the background position if the section is in view
            if (
                scrollPosition + $(window).height() > offset &&
                scrollPosition < offset + $section.outerHeight()
            ) {
                const backgroundPosition = additionalOffset + ((scrollPosition - offset) * speed * -1);
                $section.css("background-position", `center ${backgroundPosition}px`);
            }
        });
    });

    wow = new WOW({
        offset: 100, // default
        mobile: false, // default
    })
    wow.init();

    $('.odometer').waypoint(function () {
        setTimeout(function () {
            $('.odometer1').html($('.odometer1').data('count'));
        }, 500);
        setTimeout(function () {
            $('.odometer2').html($('.odometer2').data('count'));
        }, 1000);
        setTimeout(function () {
            $('.odometer3').html($('.odometer3').data('count'));
        }, 1500);
        setTimeout(function () {
            $('.odometer4').html($('.odometer4').data('count'));
        }, 2000);
    }, {
        offset: 800,
        triggerOnce: true
    });

    $('.hs-progress-bar-length').waypoint(function () {
        $(this.element).css({
            width: $(this.element).attr('data-width') + '%',
            visibility: 'visible'
        });
    }, {
        offset: '90%',
        triggerOnce: true
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('#hs-back-top').removeClass('bounceInRight bounceOutRight hs-hide').addClass('bounceInRight');
        } else {
            $('#hs-back-top').removeClass('bounceInRight bounceOutRight').addClass('bounceOutRight');
        }
    });

    $('#hs-back-top').click(function () {
        $('html,body').animate({scrollTop: 0}, 800);
    });

    $('.hs-toggle-menu').click(function () {
        $('.hs-main-navigation .hs-menu').slideToggle();
    });

    $('.hs-menu').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 750,
        scrollThreshold: 0.1,
        scrollOffset: 82
    });

    $('.menu-item-has-children > a').append('<span class="ht-dropdown"></span>');

    $('.ht-dropdown').on('click', function () {
        $(this).parent('a').next('ul').slideToggle();
        $(this).toggleClass('ht-opened');
        return false;
    })

    $(window).resize(function () {
        if ($(window).width() > 768) {
            $('.hs-menu .ht-dropdown').removeClass('ht-opened');
            $('.hs-menu .sub-menu').removeAttr('style');
        }
    }).resize();

    // *only* if we have anchor on the url
    var anchorId = window.location.hash;
    anchorId = anchorId.replace('/', '');
    if ($(anchorId).length > 0) {
        $('html, body').animate({
            scrollTop: $(anchorId).offset().top - 82
        }, 1000);
    }

});