<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	$content = "<p>" . $user_data['name'] . "</p>";

	if($_SERVER['REQUEST_METHOD'] == "GET"){
		echo $content;
	}

	//用戶在首頁選擇電影後獲取電影名字與跳轉至訂票頁面
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$_SESSION['movie'] = $_POST['movie'];
		header("Location: ../order.html");
	}

?>