<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	$content = "<p>" . $user_data['name'] . "</p>";

	if($_SERVER['REQUEST_METHOD'] == "GET"){
		echo $content;
	}

?>