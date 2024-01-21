<?php
    include_once('../mainFunction/functionClasses.php');

    $addPOLUId = md5(uniqid(mt_rand() . time(), true));
    $addPOLDId = $_POST['addPOPOId'];
    $addPOLNo = ucwords($_POST['addPONo']);
    $addPOLSupplier = ucwords($_POST['addPOSupplier']);
    $addPOLFinishProdIds = $_POST['produid'];
    $addPOLFinishProdQtys = $_POST['finishprodqty'];

    date_default_timezone_set('Asia/Manila');
    $purchaseOrderDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addPurchaseOrderWithFinishProducts($addPOLUId, $addPOLDId, $addPOLNo, $addPOLSupplier, $addPOLFinishProdIds, $addPOLFinishProdQtys, $purchaseOrderDateCreated);

    // echo $returnMsg;

    if (is_array($returnMsg)) {
        $readableMsg = implode(PHP_EOL, $returnMsg);

        echo $readableMsg;
    } else {
        echo $returnMsg;
    }
    
?>