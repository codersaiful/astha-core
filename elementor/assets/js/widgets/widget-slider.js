//;(function ($, w) {
//
//"use strict";
//
//
//var $window = $(w);
//    $.fn.getAsthaSettings = function() {
//            return this.data('settings');
//    };
//    var new_data = $('.elementor-widget-astha_widget_slider').getAsthaSettings();
//
//    console.log(new_data);
//    var slider_settings = {
//        slidesPerView: 1,
//        spaceBetween: 10,
//        slideClass: 'swiper-slide',
//        wrapperClass: 'swiper-wrapper',
//        //******************** New Start
//        
//        updateOnWindowResize: true, //Its a default value
//        keyboard: {
//            enabled: true,
//            onlyInViewport: false,
//        },
//        // Disable preloading of all images
//        preloadImages: false,
//        // Enable lazy loading
//        lazy: true,
//        
//        //******************** New End
//        navigation: {
//            nextEl: '.elementor-swiper-button-next',
//            prevEl: '.elementor-swiper-button-prev',
//        },
//        breakpoints: {
//            640: {
//              slidesPerView: 1,
//              spaceBetween: 20,
//            },
//            768: {
//              slidesPerView: 1,
//              spaceBetween: 40,
//            },
//            1024: {
//              slidesPerView: 1,
//              spaceBetween: 0,
//            },
//        },
////        autoplay: {
////            delay: 500,
////          }
//    };
//    
//    if( new_data.autoplay === 'yes' ){
//        slider_settings.autoplay = {delay: new_data.autoplay_speed};
//    }
//    if( new_data.transition ){ // == 'fade'
//        slider_settings.effect = new_data.transition;
//    }
//    
//    if( new_data.transition_speed ){
//        slider_settings.speed = new_data.transition_speed;
//    }
//    
//    
//    if( new_data.infinite === 'yes' ){
//        slider_settings.loop = true;
//    }
//    
//    
//    //Object.assign(slider_settings, new_data);
//    
//    
//    console.log("Slider");
//    console.log(slider_settings);
//    
//    var mySwiper = new Swiper('.astha-slides .swiper-container',slider_settings);
//    if( new_data.autoplay === 'yes' ){
//        mySwiper.autoplay.start();
//        //mySwiper.autoplay.stop();
//
//    }
//    if( new_data.autoplay === 'yes' && new_data.pause_on_hover === 'yes' ){
//        $('.astha-slides .swiper-container').on('mouseenter', function (e) {
//            console.log('stop autoplay');
//            mySwiper.autoplay.stop();
//        })
//        $('.astha-slides .swiper-container').on('mouseleave', function (e) {
//            console.log('start autoplay');
//            mySwiper.autoplay.start();
//        })
//    }
//} (jQuery, window));
//
//$().slssl();