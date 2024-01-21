<?php
    include_once('../mainFunction/functionClasses.php');

    $addUserUId = md5(uniqid(mt_rand() . time(), true));
    $addUserId = $_POST['addUserId'];
    $addUserFName = ucwords($_POST['addUserFName']);
    $addUserLName = ucwords($_POST['addUserLName']);
    $addUserEmail = ucwords($_POST['addUserEmail']);
    $addUserPass = ucwords($_POST['addUserPass']);
    $addUserPassC = ucwords($_POST['addUserPassC']);
    $addUserType = ucwords($_POST['addUserType']);

    date_default_timezone_set('Asia/Manila');
    $addUserDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->createUserAccount($addUserUId, $addUserId, $addUserFName, $addUserLName, $addUserEmail, $addUserPass, $addUserPassC, $addUserType, $addUserDate);

    echo $returnMsg;
    
?>