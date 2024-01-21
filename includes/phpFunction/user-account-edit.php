<?php
    include_once('../mainFunction/functionClasses.php');

    $updateUserUId = ucwords($_POST['updateUserUId']);
    $updateUserId = $_POST['updateUserId'];
    $updateUserFName = ucwords($_POST['updateUserFName']);
    $updateUserLName = ucwords($_POST['updateUserLName']);
    $updateUserEmail = ucwords($_POST['updateUserEmail']);
    $updateUserType = ucwords($_POST['updateUserType']);

    date_default_timezone_set('Asia/Manila');
    $updateUserDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateUserAccount($updateUserUId, $updateUserId, $updateUserFName, $updateUserLName, $updateUserEmail, $updateUserType, $updateUserDate);

    echo $returnMsg;
    
?>