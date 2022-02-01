$(document).ready(function() {
    $('.header__link').click(function() {
        $(".header__link").removeClass('active');
        let dateNav = $(this).attr("date-nav");
        $(`.header__link[date-nav="${dateNav}"]`).addClass("active");
    });
    let myEditor
    ClassicEditor.create(document.querySelector('#editor')).then(editor => {
        myEditor = editor
    });
    ClassicEditor.create(document.querySelector('#editor1')).then(editor => {
        myEditor = editor
    });
    ClassicEditor.create(document.querySelector('#editor2')).then(editor => {
        myEditor = editor
    });
    ClassicEditor.create(document.querySelector('#editor3')).then(editor => {
        myEditor = editor
    }).catch(error => {
        console.error(error);
    });
    $('.header__link').mouseenter(function() {
        let left = $(this).offset().left - $('.header__list').offset().left,
            width = $(this).width();

        $('hr').css({
            'margin-left': left,
            'width': width
        });
    });
});