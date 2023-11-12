<?php
    require_once('functionClasses.php');
    $userDetails = $functionClass->getUserDetails();
    $userUniqueId = $userDetails['userUId'];
    $functionClass->logoutAccount($userUniqueId);
    header ("location: ../../index.php");
?>