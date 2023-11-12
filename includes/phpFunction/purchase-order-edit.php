<?php
    include_once('../mainFunction/functionClasses.php');

    $updatePOPOUId = $_POST['updatePOPOUId'];
    $updatePOPOId = $_POST['updatePOPOId'];
    $updatePONo = ucwords($_POST['updatePONo']);
    $updatePORM = ucwords($_POST['updatePORM']);
    $updatePODateReceived = $_POST['updatePODate'];
    $updatePOSupplier = ucwords($_POST['updatePOSupplier']);
    $updatePOQuantity = ucwords($_POST['updatePOQuantity']);
    $updatePOPrice = ucwords($_POST['updatePOPrice']);
    
    date_default_timezone_set('Asia/Manila');
    $updatePODate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updatePurchaseOrder($updatePOPOUId, $updatePOPOId, $updatePONo, $updatePORM, $updatePODateReceived, $updatePOSupplier, $updatePOQuantity, $updatePOPrice, $updatePODate);

    echo $returnMsg;
    
?>