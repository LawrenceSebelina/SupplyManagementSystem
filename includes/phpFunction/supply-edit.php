<?php
    include_once('../mainFunction/functionClasses.php');

    $updateSuppySUId = $_POST['updateSuppySUId'];
    $updateSupplySId = $_POST['updateSupplySId'];
    $updateSupplyRM = ucwords($_POST['updateSupplyRM']);
    $updateSupplyCat = ucwords($_POST['updateSupplyCat']);
    $updateSupplyUnit = ucwords($_POST['updateSupplyUnit']);
    $updateSupplyStock = ucwords($_POST['updateSupplyStock']);

    date_default_timezone_set('Asia/Manila');
    $updateSupplyDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateSupply($updateSuppySUId, $updateSupplySId, $updateSupplyRM, $updateSupplyCat, $updateSupplyUnit, $updateSupplyStock, $updateSupplyDate);

    echo $returnMsg;
    
?>