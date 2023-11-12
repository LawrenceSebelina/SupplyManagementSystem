<?php
    include_once('../mainFunction/functionClasses.php');

    $updateFPPUId = $_POST['updateFPPUId'];
    $updateFPPId = $_POST['updateFPPId'];
    $updateFPPN = ucwords($_POST['updateFPPN']);
    $updateFPQty = ucwords($_POST['updateFPQty']);
    $updateFPDateFinished = ucwords($_POST['updateFPDate']);

    date_default_timezone_set('Asia/Manila');
    $updateFPDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateFinishProd($updateFPPUId, $updateFPPId, $updateFPPN, $updateFPQty, $updateFPDateFinished, $updateFPDate);

    echo $returnMsg;
    
?>