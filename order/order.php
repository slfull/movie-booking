<?php
session_start();

include("connection.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedSeats = $_POST['selectedSeats'];
    $user_id = $_SESSION['user_id']; 
    $movie = $_SESSION['movie'];
    $total = 0;

    if (!empty($selectedSeats)) {
        $seats = explode(',', $selectedSeats);
        foreach ($seats as $seat) {
            $total += 200; //算訂單的總價格，一張票200計算
            $query = "INSERT INTO seats (seat_number, movie_name) VALUES ('$seat', '$movie')"; //存到seats的表中表示這個電影的這個位置被訂走了
            mysqli_query($con, $query);
        }
        $query = "INSERT INTO orders (user_id, total) VALUES ('$user_id', '$total')";//存到orders的表中表示有這個訂單
        mysqli_query($con, $query);
        unset($_SESSION['movie']);
        echo "Booking successful!";
        header("Location: ../index.html");
    } else {
        echo "No seats selected!";
    }
}
?>