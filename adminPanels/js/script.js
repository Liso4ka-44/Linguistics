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

function list__null() { //функция если блок __list пустой
    let dataHeight = $(".datelist").height();
    let programmList = $(".programm__list").height();
    let speack = $(".list").height();
    if (dataHeight == 0) {
        $(".block_height").css("display", "none");
    } else if (programmList == 0) {
        $(".program").css("display", "none");
    } else if (speack == 0) {
        $(".list").css("display", "none");
    }
}

function list__full() { //функция если блок __list не пустой
    let dataItemHeight = $(".dateitem").height();
    let programmItemList = $(".programm__item").height();
    let speackItemList = $(".speack__item").height();
    $(".datelist").css("height", dataItemHeight);
    $(".programm__list").css("height", programmItemList);
    $(".list").css("height", speackItemList);

}
$(document).ready(function() {
    creatEditor();
    list__null();
    list__full();
    $('.header__link').mouseenter(function() {
            let left = $(this).offset().left - $('.header__list').offset().left,
                width = $(this).width();
            $('hr').css({
                'margin-left': left,
                'width': width
            });
        }

    );

    $('.show__more__link').click(function() {
        event.preventDefault();
        if ($(this).text() == "Показать ещё") {
            $(this).text("Скрыть");
            $(this).next().attr("src", "../img/icon/arrow_top.svg");
            switch ($(this).attr("data-show")) {
                case "list":
                    $(".list").css("height", "100%");
                    break;
                case "programm__list":
                    $(".programm__list").css("height", "100%");
                    break;
                case "datelist":
                    $(".datelist").css("height", "100%");
                    break;
            }
        } else {
            $(this).text("Показать ещё");
            $(this).next().attr("src", "../img/icon/down.svg");
            list__full();
        }
    });
});