$(document).ready(function() {
    $('#contaption__link').click(function() {
        event.preventDefault();
        // $('.contaption__spaeks__list').toggleClass("full");
        $(".contaption__spaeks__list__full").slideToggle();
    });
});