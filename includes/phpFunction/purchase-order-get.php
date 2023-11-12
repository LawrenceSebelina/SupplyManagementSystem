<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getPurchaseOrder();

    echo json_encode($returnMsg);
    
?>