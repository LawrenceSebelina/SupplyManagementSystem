<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getRMForSearch();

    echo json_encode($returnMsg);
    
?>