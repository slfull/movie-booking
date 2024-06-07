<?php
//建立與DB的連線
$dbhost = "localhost:3307";
$dbuser = "root";
$dbpass = "";
$dbname = "movies";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}