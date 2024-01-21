<?php
    include_once('../mainFunction/functionClasses.php');

    $updateUserPassUId = ucwords($_POST['updateUserPassUId']);
    $updateUserPassId = $_POST['updateUserPassId'];
    $currentUserPPass = ucwords($_POST['currentUserPPass']);
    $updateUserPPass = ucwords($_POST['updateUserPPass']);
    $updateUserPPassC = ucwords($_POST['updateUserPPassC']);

    date_default_timezone_set('Asia/Manila');
    $updateUserPassDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updatePassword($updateUserPassUId, $updateUserPassId, $currentUserPPass, $updateUserPPass, $updateUserPPassC, $updateUserPassDate);

    echo $returnMsg;
    
?>