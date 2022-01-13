$(document).ready(function() {
    $('.connect').on('click', function() {
        $('.ob_c').addClass('open');
        $('body').css("overlow", "hidden");
        event.preventDefault();
    });

    $('.spik').on('click', function() {
        $('.spic').addClass('open');
        $('body').css("overlow", "hidden");
        event.preventDefault();
    });

    $('.popup__close').on('click', function() {
        let classmodal = $('.open').attr('id');
        $("div#" + classmodal).removeClass('open');
        $('body').css("overlow", "hidden");
        event.preventDefault();
        classmodal = "";
    });
});