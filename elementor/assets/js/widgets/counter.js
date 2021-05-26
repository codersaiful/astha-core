;
(function ($, w) {
    "use strict";
    //Counter animation
    $(document).ready(function ($) {

        $('.mc-counter-text').appear(function () {
            var element = $(this);
            var timeSet = setTimeout(function () {
                if (element.hasClass('mc-counter-text')) {
                    element.find('.mc-counter-value').countTo();
                }
            });
        });
    });
}(jQuery, window));