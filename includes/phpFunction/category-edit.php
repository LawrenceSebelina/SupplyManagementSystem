<?php
    include_once('../mainFunction/functionClasses.php');

    $updateCatCUId = $_POST['updateCatCUId'];
    $updateCatCId = $_POST['updateCatCId'];
    $updateCatCN = ucwords($_POST['updateCatCN']);
    $updateCatDesc = ucwords($_POST['updateCatDesc']);

    date_default_timezone_set('Asia/Manila');
    $updateCatDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->updateCat($updateCatCUId, $updateCatCId, $updateCatCN, $updateCatDesc, $updateCatDate);

    echo $returnMsg;
    
?>