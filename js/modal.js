$(document).ready(function() {
    $('.connect').on('click', function() {
        $('.ob_c').addClass('open');
        $('body').css("overlow", "hidden");
        event.preventDefault();
    });

    $('.spik').on('click', function() {

        let idSpeak = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'indexVivod.php',
            data: ({ idSpeak }),
            dataType: "html",
            success: function(data) {
                var char_data = JSON.parse(data);
                $('.popup__text__spaek__h2').text(char_data["name"]);
                $('.popup__text__spaek__p').text(char_data["info"]);
                $('.popup__text__spaek__a').text(char_data["linkSP"]);
                $('.popup__text__spaek__a').attr('href', char_data["linkSP"]);
                $('.spic').addClass('open');
                $('body').css("overlow", "hidden");
                event.preventDefault();
            }
        });

    });

    $('.popup__close').on('click', function() {
        let classmodal = $('.open').attr('id');
        $("div#" + classmodal).removeClass('open');
        $('body').css("overlow", "hidden");
        event.preventDefault();
    });
});