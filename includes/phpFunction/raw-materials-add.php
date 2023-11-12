<?php
    include_once('../mainFunction/functionClasses.php');

    $addRMUId = md5(uniqid(mt_rand() . time(), true));
    $addRMMId = $_POST['addRMMId'];
    $addRMMN = ucwords($_POST['addRMMN']);
    $addRMCat = ucwords($_POST['addRMCat']);
    $addRMUnit = ucwords($_POST['addRMUnit']);
    $addRMQty = $_POST['addRMQty'];
    $addRMSupplier = ucwords($_POST['addRMSupplier']);

    date_default_timezone_set('Asia/Manila');
    $addRMDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addRM($addRMUId, $addRMMId, $addRMMN, $addRMCat, $addRMUnit, $addRMQty, $addRMSupplier, $addRMDate);

    echo $returnMsg;
    
?>