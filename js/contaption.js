$(document).ready(function() {
    $('#contaption__link').click(function() {
        // event.preventDefault();
        $('.contaption__spaeks__list').toggleClass("contaption__spaeks__list__full");

        if ($(".contaption__spaeks__list").hasClass("contaption__spaeks__list__full")) {
            $('#contaption__link').attr("href", "#contaption__link");
            let elementClick = $(this).attr("href");
            let destination = $(elementClick).offset().top;
            $('html, body').animate({ scrollTop: destination }, 1500);
            return false;
        } else {
            $('#contaption__link').attr("href", "#block1");
            let elementClick1 = $(this).attr("href");
            let destination1 = $(elementClick1).offset().top;
            $('html, body').animate({ scrollTop: destination1 }, 1500);
            return false;
        }
    });


});