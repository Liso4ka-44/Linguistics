var block_show = null;

function scrollTracking() {
    var wt = $(window).scrollTop();
    var wh = $(window).height();
    var et = $('.information__announcement').offset().top;
    var eh = $('.information__announcement').outerHeight();

    if (wt + wh >= et && wt + wh - eh * 2 <= et + (wh - eh)) {
        if (block_show == null || block_show == false) {
            $(".main__nav__item").addClass("active_nav_red");
        }
        block_show = true;
    } else {
        if (block_show == null || block_show == true) {
            $(".main__nav__item").removeClass("active_nav_red");
        }
        block_show = false;
    }
}

$(window).scroll(function() {
    scrollTracking();
});

$(document).ready(function() {
    scrollTracking();
    //     $(".date__add").click(function() {
    //         event.preventDefault();
    //         $(".additionalDates__item").clone().appendTo(".additionalDates");
    //     });
    //     $(".programm__add").click(function() {
    //         event.preventDefault();
    //         $(".programm__item").clone().appendTo(".program");
    //     });
});