    // Скрипты для меню

    $(document).ready(function() {
        $(".header__burger").click(function() {
            $('.header__burger,.header__menu').toggleClass('Active');
            $(".header__burger").toggleClass('lock');
            $("body").toggleClass('overl');
        });


        $(".headerr__item").click(function() {
            if ((".headerr_item").hasClass("item_archive")) {

            } else {
                $('.header__burger,.header__menu').toggleClass('Active');
                $("body").toggleClass('overl');
            }


        });
        $(".block__title").click(function() {
            $(".block__title").toggleClass('active_li').next().slideToggle(300);
        });
    });