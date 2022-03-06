$(document).ready(function() {
    $('.slide').on('click', function() {
        let div = $(this).attr('data-item');
        if ($(`.konf__footer[data-item="${div}"]`).is(":hidden")) {
            $(`.slide[data-item="${div}"]`).attr("src", "../img/icon/arrow_top.svg");
            $(`.konf__footer[data-item="${div}"]`).slideDown();
        } else {
            $(`.konf__footer[data-item="${div}"]`).slideUp();
            $(`.slide[data-item="${div}"]`).attr("src", "../img/icon/down.svg");
        }

    });
});