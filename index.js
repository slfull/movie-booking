$(document).ready(function() { //去後端取得用戶名稱
    $.ajax({
        method: 'GET',
        url: 'login/index.php',
        success: function(response) {
            $('#userData').html(response);
        },
    });
});