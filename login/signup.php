<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//到DB建立一筆新的user資料
			$user_id = random_num(20);
			$query = "insert into users (user_id,name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: ../login.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>