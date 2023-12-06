<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getSearchFinishProd();

    echo json_encode($returnMsg);
    
?>