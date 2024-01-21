<?php
    include_once('../mainFunction/functionClasses.php');

    $returnMsg = $functionClass->getUserAccounts();

    echo json_encode($returnMsg);
    
?>