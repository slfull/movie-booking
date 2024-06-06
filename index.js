$(document).ready(function() {
    $.ajax({
        method: 'GET',
        url: 'login/index.php',
        success: function(response) {
            $('#userData').html(response);
        },
    });
});