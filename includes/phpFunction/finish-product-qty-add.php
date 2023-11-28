<?php
    include_once('../mainFunction/functionClasses.php');

    $addFPQtyPUId = $_POST['addFPQtyPUId'];
    $addFPQtyPId = $_POST['addFPQtyPId'];
    $addFPRQty = $_POST['addFPRQty'];
    $addFPQty = $_POST['addFPQty'];

    $returnMsg = $functionClass->addFinishProdQty($addFPQtyPUId, $addFPQtyPId, $addFPRQty, $addFPQty);

    // echo $returnMsg;
    
    // Check if the result is an array
if (is_array($returnMsg)) {
    // Convert array to a readable string
    $readableMsg = implode(PHP_EOL, $returnMsg);

    echo $readableMsg;
} else {
    // If the result is not an array, directly echo it
    echo $returnMsg;
}
?>