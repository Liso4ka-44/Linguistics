function creatEditor() {
    let myEditor
    for (var i = 0; i < 13; i++) {
        ClassicEditor.create(document.querySelector('#editor' + i)).then(editor => {
                myEditor = editor
            }

        ).catch(error => {
                console.error(error);
            }

        );
    }
}

$(document).ready(function() {

        // $('.header__link').click(function() {
        //     $(".header__link").removeClass('active');
        //     let dateNav = $(this).attr("date-nav");
        //     $(`.header__link[date-nav="${dateNav}"]`).addClass("active");
        // });
        creatEditor();

        $('.header__link').mouseenter(function() {
                let left = $(this).offset().left - $('.header__list').offset().left,
                    width = $(this).width();
                $('hr').css({
                        'margin-left': left,
                        'width': width
                    }

                );
            }

        );

        $('.show__more__link').click(function() {
                event.preventDefault();
                switch ($(this).attr("data-show")) {
                    case "list":
                        $(".list").toggleClass("list__all");
                        break;
                    case "programm__list":
                        $(".programm__list").toggleClass("list__all");
                        break;
                    case "datelist":
                        $(".datelist").toggleClass("list__all");
                        break;
                }

            }

        );
    }

);