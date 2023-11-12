<?php
    include_once('../mainFunction/functionClasses.php');

    $addFPCUId = md5(uniqid(mt_rand() . time(), true));
    $addFPPId = $_POST['addFPPId'];
    $addFPPN = ucwords($_POST['addFPPN']);
    $addFPQty = ucwords($_POST['addFPQty']);
    $addFPDateFinished = $_POST['addFPDate'];

    date_default_timezone_set('Asia/Manila');
    $addFPDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addFinishProd($addFPCUId, $addFPPId, $addFPPN, $addFPQty, $addFPDateFinished, $addFPDate);

    echo $returnMsg;
    
?>