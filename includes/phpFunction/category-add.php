<?php
    include_once('../mainFunction/functionClasses.php');

    $addCatCUId = md5(uniqid(mt_rand() . time(), true));
    $addCatCId = $_POST['addCatCId'];
    $addCatCN = ucwords($_POST['addCatCN']);
    $addCatDesc = ucwords($_POST['addCatDesc']);
    date_default_timezone_set('Asia/Manila');
    $addCatDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addCat($addCatCUId, $addCatCId, $addCatCN, $addCatDesc, $addCatDate);

    echo $returnMsg;
    
?>