<?php
    include_once('../mainFunction/functionClasses.php');

    $addFPQtyPUId = $_POST['addFPQtyPUId'];
    $addFPQtyPId = $_POST['addFPQtyPId'];
    $addFPRQty = $_POST['addFPRQty'];
    $addFPQty = $_POST['addFPQty'];

    $returnMsg = $functionClass->addFinishProdQty($addFPQtyPUId, $addFPQtyPId, $addFPRQty, $addFPQty);

    echo $returnMsg;
    
?>