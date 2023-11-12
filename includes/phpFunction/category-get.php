<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getCat();

    echo json_encode($returnMsg);
    
?>