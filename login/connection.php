<?php

$dbhost="localhost:3307";
$dbuser="root";
$dbpass="";
$dbname="movies";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("fail to connect!");
}
