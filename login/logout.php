<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']); //把登入資訊解除

}

header("Location: ../login.html");
die;