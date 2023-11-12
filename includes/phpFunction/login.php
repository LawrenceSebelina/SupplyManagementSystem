<?php
    include_once('../mainFunction/functionClasses.php');
    date_default_timezone_set('Asia/Manila');

    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    $returnMessage = $functionClass->loginAccount($userEmail, $userPassword);

    echo $returnMessage;
?>