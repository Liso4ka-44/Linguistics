$(document).ready(function() {
    $('.authorization__btn').click(function() {
        $(".error__autoriz").empty();
        let login1 = $('input[name="authorization__login"]').text();
        let pass = $('input[name="authorization__password"]').val();
        if (login1 == "" || pass == "") {
            $(".error__autoriz").css("display", "block");
            $(".error__autoriz").append("<b>*Заполните все поля</b>");
        } else {
            $.ajax({
                url: 'php/checkAutoriz.php',
                method: 'post',
                data: { login1, pass },
                success: function(data) {
                    console.log(data);
                    if (data == true) {
                        window.location.href = "/php/add.php";
                    } else {
                        $(".error__autoriz").append("<b>*Логин или пароль неверные</b>");
                    }
                }
            });
        }
    });
});