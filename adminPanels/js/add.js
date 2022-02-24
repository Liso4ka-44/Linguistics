$(document).ready(function() {
    $(".add__item").click(function() {
        $(".add__item").removeClass("add__item_active_darker");
        $(this).addClass("add__item_active_darker");
        let data = $(this).attr("data-nav");
        $(".form").removeClass("add__form__active");
        $(`.form[data-form="${data}"]`).addClass("add__form__active");
    });
});