$(document).ready(function() {


    //發送get請求到fetch_seats.php來獲取該電影已被訂位的座位
    $.ajax({
        method: 'GET',
        url: 'order/fetch_seats.php',
        success: function(response) {
            let data = JSON.parse(response);
            let soldSeats = data.soldSeats;
            
            soldSeats.forEach(function(seat) {
                let seatElement = $('.seat[data-seat="' + seat + '"]');
                seatElement.addClass('sold');
            });
        }
    });

    //控制座位被點的動畫，sold不動，因為sold表示已售出的
    $('.seat').click(function() {
        if (!$(this).hasClass('sold')) {
            $(this).toggleClass('buy');
            updateSelectedSeats();
        }
    });

    //給予buy class來控制動畫，且計算有幾個座位被選擇
    function updateSelectedSeats() {
        let selectedSeats = [];
        $('.seat.buy').each(function() {
            selectedSeats.push($(this).data('seat'));
        });
        $('#selectedSeats').val(selectedSeats.join(','));
    }
});