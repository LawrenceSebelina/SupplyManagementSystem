<?php
    include_once('../mainFunction/functionClasses.php');

    $addODODUId = md5(uniqid(mt_rand() . time(), true));
    $addODODId = $_POST['addODODId'];
    $addODNo = ucwords($_POST['addODNo']);
    $addODPN = ucwords($_POST['addODPN']);
    $addODCustomer = $_POST['addODCustomer'];
    $addODTO = ucwords($_POST['addODTO']);
    $addODSDate = ucwords($_POST['addODSDate']);
    $addODEDate = ucwords($_POST['addODEDate']);
    $addODStatus = ucwords($_POST['addODStatus']);

    date_default_timezone_set('Asia/Manila');
    $addODDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addOrderDelivery($addODODUId, $addODODId, $addODNo, $addODPN, $addODCustomer, $addODTO, $addODSDate, $addODEDate, $addODStatus, $addODDate);

    echo $returnMsg;
    
?>