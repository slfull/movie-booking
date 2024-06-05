<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']== "POST"){
        //當有post請求
        $name = $_POST['name'];
        $password = $_POST['password'];
    }

    if(!empty($name) && !empty($password) && !is_numeric($name)){

        $user_id = random_num(20);
        $query = "insert into users (user_id, name, password) values('$user_id', '$name', '$password')";

        mysqli_query($con, $query);
        header("Location: ../login.html");
        die;
    }else{
        echo "請輸入有效的數值!";
    }
?>