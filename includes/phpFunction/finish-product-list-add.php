<?php
    include_once('../mainFunction/functionClasses.php');

    $addFPLFPUId = md5(uniqid(mt_rand() . time(), true));
    $addFPPId = $_POST['addFPPId'];
    $addFPPN = ucwords($_POST['addFPPN']);
    $addFPLMaterialIds = $_POST['materialuid'];
    $addFPLMaterialQtys = $_POST['materialqty'];

    date_default_timezone_set('Asia/Manila');
    $finishProdMaterialsDateCreated = date('Y-m-d H:i:s');

    $returnMsg = $functionClass->addFinishProductWithRawMaterials($addFPLFPUId, $addFPPId, $addFPPN, $addFPLMaterialIds, $addFPLMaterialQtys, $finishProdMaterialsDateCreated);

    echo $returnMsg;
    
?>