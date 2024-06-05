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

    $query = "select * from users where name = '$name' limit 1";

    $result = mysqli_query($con, $query);

    if($result){
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password){
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: ../index.html");
                die;
            }
        }
    }
    echo "wrong username or password";
}else{
    echo "請輸入有效的數值!";
}
?>