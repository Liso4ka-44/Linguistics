    // Скрипты для меню

    $(document).ready(function() {
        $(".header__burger").click(function() {
            $('.header__burger,.header__menu').toggleClass('Active');
            $(".header__burger").toggleClass('lock');
            $("body").toggleClass('overl');
        });


        $(".headerr__item").click(function() {
            $('.header__burger,.header__menu').toggleClass('Active');
            $("body").toggleClass('overl');
        });
        $(".block__title").on('click', function() {
            $(".block__title").toggleClass('active_li').next().slideToggle(300);
        });
        $(".cookie_btn").click(function() {
            $(".cookie").css("display", "none");
        });
    });