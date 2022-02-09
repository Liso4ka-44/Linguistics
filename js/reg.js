$(document).ready(function() {
    $("#error_login").hide();
    $(".reg__btn").attr('disabled', true);
    $("input[name = 'login']").change(function() {
        $.ajax({
            type: "post",
            url: "userOnl.php",
            data: ({ login: $("input[name = 'login']").val() }),
            dataType: "html",
            success: function(data) {
                console.log(data);
                if (data != "done") {
                    $("#error_login").show();

                } else {
                    $("#error_login").hide();
                    $(".reg__btn").attr('disabled', false);
                }
            }
        });
    });
});