jQuery(document).ready(function ($) {


    "use strict";

    // Page loading animation

    $(".loading-window").animate({
        'opacity': '0'
    }, 600, function () {
        setTimeout(function () {
            $(".loading-window").css("visibility", "hidden").fadeOut();
        }, 300);
    });


    // Header Style and Scroll to Top
    function headerStyle() {
        if ($('.main-header').length) {
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.main-header');
            var scrollLink = $('.scroll-top');
            if (windowpos >= 250) {
                siteHeader.addClass('fixed-header');
                scrollLink.fadeIn(300);
            } else {
                siteHeader.removeClass('fixed-header');
                scrollLink.fadeOut(300);
            }
        }
    }

    headerStyle();

    function handleCompare() {
        if ($('.compare-nav-item').length) {
            let comparisonCars = JSON.parse(window.localStorage.getItem('compareCarIds'));
            if (comparisonCars != undefined && comparisonCars.length) {
                $('.compare-nav-item .badge').text(comparisonCars.length);
                $('.compare-nav-item .badge').css({"display": "block"});
                let queryParams = '';
                comparisonCars.forEach(function (carId, idx){
                    queryParams += queryParams + 'car_id[]=' + carId
                    if (idx != comparisonCars.length - 1){
                        queryParams += "&";
                    }
                    if($('.compare').length && $('.compare').data('car-id') == carId) {
                        $('.compare button').text(`{{trans('web.page.car_details.added_to_compare')}}`);
                    }
                });

                $('.compare-nav-item a').attr("href", "/compare?"+ queryParams +"");

            } else {
                $('.compare-nav-item .badge').css({"display": "none"});
                $('.compare-nav-item a').attr("href", "/compare");
            }
        }
    }

    handleCompare();

    $(window).on('scroll', function () {

        // Header Style and Scroll to Top
        function headerStyle() {
            if ($('.main-header').length) {
                var windowpos = $(window).scrollTop();
                var siteHeader = $('.main-header');
                var scrollLink = $('.scroll-top');
                if (windowpos >= 100) {
                    siteHeader.addClass('fixed-header');
                    scrollLink.fadeIn(300);
                } else {
                    siteHeader.removeClass('fixed-header');
                    scrollLink.fadeOut(300);
                }
            }
        }

        headerStyle();

    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var box = $('.header-text').height();
        var header = $('header').height();

        if (scroll >= box - header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });

    if ($('.car-makes-slider').length) {
        $('.car-makes-slider').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            items: 3,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 6000,
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                460: {
                    items: 1,
                    margin: 0
                },
                576: {
                    items: 2,
                    margin: 20
                },
                992: {
                    items: 3,
                    margin: 30
                }
            }
        });
    }

    if ($('.owl-banner').length) {
        $('.owl-banner').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            items: 1,
            margin: 0,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                460: {
                    items: 1,
                    margin: 0
                },
                576: {
                    items: 1,
                    margin: 20
                },
                992: {
                    items: 1,
                    margin: 30
                }
            }
        });
    }


});
