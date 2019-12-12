(function ($) {
  'use strict';

  Drupal.behaviors.nodelist_advanced_carousel = {
    attach: function (context, settings) {
      $('.ding_nodelist-advanced-carousel', context).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
        dots: true,
        customPaging: function (slick, index) {
          return '<a>' + (index + 1) + '</a>';
        },
        responsive: [
          {
            breakpoint: 989,
            settings: {
              autoplay: true,
              autoplaySpeed: 2000,
              infinite: false
            }
          }
        ]
      });

      $('.slider-nav', context).slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.ding_nodelist-advanced-carousel',
        focusOnSelect: true,
        infinite: false,
        arrows: false,
      });

      // Slide indicator
      var $total = $('.carousel-controls__indicator .indicator--total');
      var $current = $('.carousel-controls__indicator .indicator--current');
      $('.ding_nodelist-advanced-carousel', context).on('init afterChange', function (event, slick, currentSlide, nextSlide) {
        var curslide = slick.currentSlide + 1;
        $current.text('0' + curslide);
        $total.text('0' + slick.slideCount);
      });

      $('.carousel-controls__next', context).click(function () {
        $('.ding_nodelist-advanced-carousel', context).slick('slickNext');
      });

      // Prev slide button
      $('.carousel-controls__prev', context).click(function () {
        $('.ding_nodelist-advanced-carousel', context).slick('slickPrev');
      });
    }
  }
})(jQuery, Drupal);
