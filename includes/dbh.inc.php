<?php

$serverName = "localhost";
$userName = "root";
$passWord = "";
$databaseName = "supplymanagementsystem";

$conn = mysqli_connect($serverName, $userName, $passWord, $databaseName);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

