$(document).ready(function() {
    $(".konf__footer").hide();
    let count = 0;
    $('.slide').on('click', function() {
        if ($(".konf__footer").is(":hidden")) {
            $(".konf__footer").slideDown();
        } else {
            $(".konf__footer").slideUp();
        }

    });
});