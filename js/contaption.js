$(document).ready(function() {
    $('#contaption__link').click(function() {
        // event.preventDefault();
        $('.contaption__spaeks__list').toggleClass("contaption__spaeks__list__full");
        if ($(".contaption__spaeks__list").hasClass("contaption__spaeks__list__full")) {
            var elementClick = $('#contaption__link').attr("href", "#block1");
            var destination = $(elementClick).offset().top;
            $('html, body').animate({ scrollTop: destination }, 1500);
            return false;
        }



    });


});