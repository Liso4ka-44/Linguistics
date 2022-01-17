$(document).ready(function() {
    function slowScroll(id) {
        var offset = 0;
        $('html, body').animate({
            scrollTop: $(id).offset().top + offset
        }, 1000);
        return false;
    }
    $('#contaption__link').click(function() {
        // event.preventDefault();
        $('.contaption__spaeks__list').toggleClass("contaption__spaeks__list__full");
        $('#contaption__link').attr("href", "#block1");

    });


});