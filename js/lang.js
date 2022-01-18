$(document).ready(function() {
    $(".lang_link_menu").on('click', '.lang', function() {
        let lang = $(this).attr("id");
        $.ajax({
            type: 'POST',
            url: 'probnik/podcl.php',
            data: ({ lang }),
            dataType: "html",
            success: function(data) {

            }
        });
    });
});