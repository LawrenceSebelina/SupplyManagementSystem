<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getSupply();

    echo json_encode($returnMsg);
    
?>