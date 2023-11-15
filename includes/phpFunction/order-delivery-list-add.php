<?php
    include_once('../mainFunction/functionClasses.php');

    $addODLODUId = md5(uniqid(mt_rand() . time(), true));
    $addODLODId = $_POST['addODLODId'];
    $addODLNo = ucwords($_POST['addODLNo']);
    $addODLSupplier = ucwords($_POST['addODLSupplier']);
    $addODLMaterialIds = $_POST['materialuid'];

    // $addODLPN = ucwords($_POST['addODLPN']);
    // $addODLCustomer = $_POST['addODLCustomer'];
    // $addODLTO = ucwords($_POST['addODLTO']);
    // $addODLSDate = ucwords($_POST['addODLSDate']);
    // $addODLEDate = ucwords($_POST['addODLEDate']);
    // $addODLStatus = ucwords($_POST['addODLStatus']);

    date_default_timezone_set('Asia/Manila');
    $addODLDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addOrderDeliveryWithRawMaterials($addODLODUId, $addODLODId, $addODLNo, $addODLSupplier, $addODLMaterialIds);

    echo $returnMsg;
    
?>