function show() {
    $.ajax({
        url: "userOnl.php",
        cache: false,
        method: 'post',
        success: function(html) {
            for (var i = 0; i < (html.length - 1); i++) {
                let obj = JSON.parse(html);
                let d = obj[i].split(" ");
                console.log(d);
                $('.user__list').append("<li>" + d[0] + " " + d[1] + "</li>");
            }

        }
    });
}

$(document).ready(function() {
    show();
    setInterval(show, 1000);
});