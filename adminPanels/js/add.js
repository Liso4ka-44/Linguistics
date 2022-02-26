$(document).ready(function() {
    $(".date__add").click(function() {
        event.preventDefault();
        $(".additionalDates__item").clone().appendTo(".additionalDates");
    });
    $(".programm__add").click(function() {
        event.preventDefault();
        $(".programm__item").clone().appendTo(".program");
    });
});