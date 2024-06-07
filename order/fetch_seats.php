<?php
session_start();
include("connection.php");
//傳已被訂位走的座位到前端預防使用者重複訂位
$movie = $_SESSION['movie'];
$query = "SELECT seat_number FROM seats WHERE movie_name = '$movie'";
$result = mysqli_query($con, $query);
$soldSeats = array();
while($row = mysqli_fetch_assoc($result)){
    $soldSeats[] = $row['seat_number'];
}

$response = array(
    'soldSeats' => $soldSeats
);
echo json_encode($response);
?>