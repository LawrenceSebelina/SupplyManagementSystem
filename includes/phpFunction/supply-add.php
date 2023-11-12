<?php
    include_once('../mainFunction/functionClasses.php');

    $addSupplySUId = md5(uniqid(mt_rand() . time(), true));
    $addSupplySId = $_POST['addSupplySId'];
    $addSupplyRM = ucwords($_POST['addSupplyRM']);
    $addSupplyCat = ucwords($_POST['addSupplyCat']);
    $addSupplyUnit = ucwords($_POST['addSupplyUnit']);
    $addSupplyStock = ucwords($_POST['addSupplyStock']);
    date_default_timezone_set('Asia/Manila');
    $addSupplyDate = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addSupply($addSupplySUId, $addSupplySId, $addSupplyRM, $addSupplyCat, $addSupplyUnit, $addSupplyStock, $addSupplyDate);

    echo $returnMsg;
    
?>