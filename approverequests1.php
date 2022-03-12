<?php

    header("location:approverequests.php");
    require_once("config.php");

    $reqid = $_POST['reqid'];
    $userid = $_POST['userid'];
    $datetime = $_POST['datetime'];
    $item = $_POST['item'];
    $type = $_POST['type'];
    $amt = $_POST['amt'];
    $unit = $_POST['unit'];
    $datetime = $_POST['datetime'];
    
    $s = '';
    if(isset($_POST['approve'])) {
        $s = "UPDATE REQUESTS SET APPROVAL = 'APPROVED', ADATETIME = NOW() WHERE REQUESTID = $reqid;";
    } elseif (isset($_POST['reject'])) {
        $s = "UPDATE REQUESTS SET APPROVAL = 'REJECTED', ADATETIME = NOW() WHERE REQUESTID = $reqid;";
    }
    mysqli_query($conn,$s);
?>