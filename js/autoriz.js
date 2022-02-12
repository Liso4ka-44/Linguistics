$(document).ready(function() {
        $('.authorization__btn').click(function() {
                let login1 = $('input[name="authorization__login"]').val();
                let pass = $('input[name="authorization__password"]').val();

                if (login1 == '' && pass == '') {
                    $('input[name="authorization__login"]').addClass('autoriz_border_red');
                    $('input[name="authorization__password"]').addClass('autoriz_border_red');
                } else if (pass == '') {
                    $('input[name="authorization__password"]').addClass('autoriz_border_red');

                } else if (login1 == '') {
                    $('input[name="authorization__login"]').addClass('autoriz_border_red');

                } else {
                    $('input[name="authorization__login"]').removeClass('autoriz_border_red');
                    $('input[name="authorization__password"]').removeClass('autoriz_border_red');

                    $.ajax({

                            url: 'php/checkAutoriz.php',
                            method: 'post',
                            data: {
                                login1,
                                pass
                            }

                            ,
                            success: function(data) {
                                if (data == true) {
                                    window.location.href = "/php/add.php";
                                } else {
                                    $(".error").css("display", "block");
                                }
                            }
                        }

                    );
                }

            }

        );
    }

);