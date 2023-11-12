<?php
    include_once('../mainFunction/functionClasses.php');

    $updateRMMUId = $_POST['updateRMMUId'];
    $updateRMMId = $_POST['updateRMMId'];
    $updateRMMN = ucwords($_POST['updateRMMN']);
    $updateRMCat = ucwords($_POST['updateRMCat']);
    $updateRMUnit = ucwords($_POST['updateRMUnit']);
    $updateRMQty = $_POST['updateRMQty'];
    $updateRMSupplier = ucwords($_POST['updateRMSupplier']);

    date_default_timezone_set('Asia/Manila');
    $updateRMDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateRM($updateRMMUId, $updateRMMId, $updateRMMN, $updateRMCat, $updateRMUnit, $updateRMQty, $updateRMSupplier, $updateRMDate);

    echo $returnMsg;
    
?>