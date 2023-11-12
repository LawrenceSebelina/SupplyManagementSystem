<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getFinishProd();

    echo json_encode($returnMsg);
    
?>