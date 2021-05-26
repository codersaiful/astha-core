(function($) {
    'use strict';
    $(document).ready(function() {
        
          /*    Accordion js
         -------------------------------------*/
        $('.faq-title').on('click', function() {
            $(this).parent('.department-faq-item').toggleClass('open');
            $(this).parent('.department-faq-item').find('.faq-details').slideToggle(400);
            $(this).parent('.department-faq-item').siblings().find('.faq-details').slideUp(400);
            $(this).parent('.department-faq-item').siblings('.department-faq-item.open').removeClass('open');
        });
    
    });
    
})(jQuery);