$(document).ready(function() {
    $('.authorization__btn').click(function() {
        $(".error__autoriz").empty();
        let login = $('input[name="authorization__login"]').val();
        let pass = $('input[name="authorization__password"]').val();
        if (login == "" || pass == "") {
            $(".error__autoriz").css("display", "block");
            $(".error__autoriz").append("<b>*Заполните все поля</b>");
        } else {
            $.ajax({
                url: 'php/checkAutoriz.php',
                method: 'post',
                data: { login, pass },
                success: function(data) {
                    if (data == true) {
                        window.location.href = "php/add.php";
                    } else {
                        $(".error__autoriz").append("<b>*Логин или пароль неверные</b>");
                    }
                }
            });
        }
    });
});