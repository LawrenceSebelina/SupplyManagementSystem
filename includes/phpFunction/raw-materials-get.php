<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getRM();

    echo json_encode($returnMsg);
    
?>