$(document).ready(function() {
    $(".konf__footer").hide();
    $('.slide').on('click', function() {
        let div = $(this).attr('data-item');
        if ($(`.konf__footer[data-item="${div}"]`).is(":hidden")) {
            $(`.konf__footer[data-item="${div}"]`).slideDown();
        } else {
            $(`.konf__footer[data-item="${div}"]`).slideUp();
        }

    });
});