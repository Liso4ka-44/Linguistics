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
            let destination1 = $(elementClick1).offset().top - 120;
            $('html, body').animate({ scrollTop: destination1 }, 1500);
            return false;
        }
    });

    $('.headerr__item').click(function() {
        $('.headerr__item').attr("href");
        let link = $(this).attr("href");
        let elementClick2 = link.split('#');
        // alert("#" + elementClick2[1]);
        if (elementClick2[1] != "") {
            let destination2 = $("#" + elementClick2[1]).offset().top - 150;
            $('html, body').animate({ scrollTop: destination2 }, 1500);
        } else if (link == "index.php") {
            let destination3 = $(link).offset().top;
            $('html, body').animate({ scrollTop: destination3 }, 1500);
        }
        return false;
    });
});