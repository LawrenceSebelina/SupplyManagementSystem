<?php
    include_once('../mainFunction/functionClasses.php');

    $addPOPOUId = md5(uniqid(mt_rand() . time(), true));
    $addPOPOId = $_POST['addPOPOId'];
    $addPONo = ucwords($_POST['addPONo']);
    $addPORM = ucwords($_POST['addPORM']);
    $addPODateReceived = $_POST['addPODate'];
    $addPOSupplier = ucwords($_POST['addPOSupplier']);
    $addPOQuantity = ucwords($_POST['addPOQuantity']);
    $addPOPrice = ucwords($_POST['addPOPrice']);
    
    date_default_timezone_set('Asia/Manila');
    $addPODate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addPurchaseOrder($addPOPOUId, $addPOPOId, $addPONo, $addPORM, $addPODateReceived, $addPOSupplier, $addPOQuantity, $addPOPrice, $addPODate);

    echo $returnMsg;
    
?>