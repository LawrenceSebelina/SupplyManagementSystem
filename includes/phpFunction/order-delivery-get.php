<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getOrderDelivery();

    echo json_encode($returnMsg);
    
?>