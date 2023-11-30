<?php
    include_once('../mainFunction/functionClasses.php');

    $minusFPQtyPUId = $_POST['minusFPQtyPUId'];
    $minusFPQtyPId = $_POST['minusFPQtyPId'];
    $minusFPRQty = $_POST['minusFPRQty'];
    $minusFPQty = $_POST['minusFPQty'];

    $returnMsg = $functionClass->minusFinishProdQty($minusFPQtyPUId, $minusFPQtyPId, $minusFPRQty, $minusFPQty);

    if (is_array($returnMsg)) {
        $readableMsg = implode(PHP_EOL, $returnMsg);

        echo $readableMsg;
    } else {
        echo $returnMsg;
    }
?>