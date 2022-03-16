$(document).ready(function() {
    $(".select__yers").change(function() {
        var yers_val = $(".select__yers").val();

        $.ajax({

            type: 'POST',
            url: '/adminPanels/php/no_markup/analiticData.php',
            data: ({ yers_val }),
            success: function(date) {

            }
        });
    });
});