;(function ($, w) {
    var $window = $(w);
    $.fn.getAsthaSettings = function() {
            return this.data('settings');
    };
    var AsthaHeroSlider = function ($scope, $) {
        
        
        var slider_elem = $scope.find('.mc-slider').eq(0);
//        slider_elem.owlCarousel();
        slider_elem.owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay: true,
            navText: ['<i class="fas fa-angle-double-left"></i> ','<i class="fas fa-angle-double-right"></i>'],
            autoplayTimeout: 1000,
            autoplayHoverPause:true,
            //animateOut: 'animate__jello',
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


        /**
         * For Mouse Wheel
         * Here should On Off
         */
        slider_elem.on('mousewheel_off', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                slider_elem.trigger('next.owl');
            } else {
                slider_elem.trigger('prev.owl');
            }
            e.preventDefault();
        });

        
    };
    
    var skillBar = function( $scope, $ ){

            var items = $scope.find('.mc-skill-wrapper');
            $(items).each(function(a, b){
                let color = $(b).attr('aria-color');
                let id = $(b).attr('aria-id');
                let parentID = $(b).closest('.astha_skill_bar').data('id');
                $('#bar-' + parentID + '-' + id + '-' + (a+1)).barfiller({ barColor: color });
            });
    }
    
    
    $window.on('elementor/frontend/init', function () {
        

        
        //alert(4545);
        elementorFrontend.hooks.addAction( 'frontend/element_ready/astha_slider.default', AsthaHeroSlider);
        elementorFrontend.hooks.addAction( 'frontend/element_ready/astha_skill_bar.default', skillBar );
        
     

    });

    $(document).ready(function(){
        $('.team-box-temp-2 .team-box-social-link li.handle').each(function(index, plus){
            console.log(plus);
            $(plus).on('click', function(){
               $(this).parents('.team-box-social-link').toggleClass('active'); 
               $(this).toggleClass('rotated'); 
            });
        });
    });



    $window.on( 'elementor/frontend/init', function() {
        
            var cx_settings;
            var EF = elementorFrontend,
                EM = elementorModules;
            
            var SliderBase = EM.frontend.handlers.Base.extend({
                    onInit: function () {
                            EM.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
                            this.run();
                    },

                    getDefaultSettings: function() {
                            return {
                                    selectors: {
                                            container: '.mc-slider-wrapper'
                                    },
                                    navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],

                            }
                    },

                    getDefaultElements: function () {
                            var selectors = this.getSettings('selectors');
                            return {
                                    $container: this.findElement(selectors.container)
                            };
                    },

                    onElementChange: function() {
                            this.elements.$container.owlCarousel('refresh');
                            this.run();
                    },

                    getReadySettings: function() {
                            var settings = {
                                    autoplay: !! this.getElementSettings('autoplay'),
                                    autoplayHoverPause: !! this.getElementSettings('pause_on_hover'),
                                    autoplaySpeed: this.getElementSettings('autoplay_speed'),
                                    loop: !! this.getElementSettings('loop'),
                                    autoplayTimeout: this.getElementSettings('autoplayTimeout'),
                                    nav: false,
                                    margin: 20,
                                    
                            };

                            switch (this.getElementSettings('navigation')) {
                                    case 'arrow':
                                            settings.nav = true;
                                            settings.dots = false;
                                            break;
                                    case 'dots':
                                            settings.dots = true;
                                            settings.nav = false;
                                            break;
                                    case 'both':
                                            settings.nav = true;
                                            settings.dots = true;
                                            break;
                                    default:
                                            settings.nav = false;
                                            settings.dots = false;
                                            break;
                            }
                            
                            settings.items = this.getElementSettings('slides_to_show') || 1;

                            settings.responsive = {
                                0:{
                                    items: (this.getElementSettings('slides_to_show_mobile') || this.getElementSettings('slides_to_show_tablet')) || settings.items,
                                    nav:false
                                },
                                768:{
                                    items: (this.getElementSettings('slides_to_show_tablet') || settings.items),
                                    nav:false
                                },
                                1025:{
                                    items: settings.items,
//                                    nav:true,
//                                    loop:false
                                }
                            };

                            

                            return $.extend({}, this.getDefaultSettings(), settings);
                    },

                    run: function() {
                        console.log( EF.config.breakpoints.lg,EF.config.breakpoints.md,EF.config.breakpoints.sm );
                        this.elements.$container.owlCarousel(this.getReadySettings());
                    }
            });
            // Carousel
            elementorFrontend.hooks.addAction(
                    'frontend/element_ready/astha_testimonial_slider.default',
                    function ($scope) {
                            elementorFrontend.elementsHandler.addHandler(SliderBase, {
                                    $element: $scope,
                                    selectors: {
                                            container: '.mc-testimonial-slider-wrapper',
                                    },
                                    autoplay: true,
                            });
                    }
            );
            
            // Slider
            elementorFrontend.hooks.addAction(
                    'frontend/element_ready/astha_slider.default',
                    function ($scope) {
                            elementorFrontend.elementsHandler.addHandler(SliderBase, {
                                    $element: $scope,
                                    selectors: {
                                            container: '.mc-slider-wrapper',
                                    },
                                    autoplay: true,
                                    
                            });
                    }
            );
            
            elementorFrontend.hooks.addAction( 'frontend/element_ready/astha_slider.default', add_number_inside_bullets);
           
            
    
    /********************************************/
    });
    
    function add_number_inside_bullets(){
        var dots = document.querySelectorAll(".mc-number-slider-wrapper .owl-dots .owl-dot");
        
        let i=1;
        dots.forEach((elem)=>{
            var text = i;
            if(i < 10){
                text = "0" + i;
            }
            elem.innerHTML = text;
            i++;
        });
    }

} (jQuery, window));
