<?php
    include_once('../mainFunction/functionClasses.php');

    $updateODODUId = $_POST['updateODODUId'];
    $updateODODId = $_POST['updateODODId'];
    $updateODNo = ucwords($_POST['updateODNo']);
    $updateODPN = ucwords($_POST['updateODPN']);
    $updateODCustomer = ucwords($_POST['updateODCustomer']);
    $updateODTO = ucwords($_POST['updateODTO']);
    $updateODSDate = ucwords($_POST['updateODSDate']);
    $updateODEDate = ucwords($_POST['updateODEDate']);
    $updateODStatus = ucwords($_POST['updateODStatus']);

    date_default_timezone_set('Asia/Manila');
    $updateODDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateOrderDelivery($updateODODUId, $updateODODId, $updateODNo, $updateODPN, $updateODCustomer, $updateODTO, $updateODSDate, $updateODEDate, $updateODStatus, $updateODDate);

    echo $returnMsg;
    
?>