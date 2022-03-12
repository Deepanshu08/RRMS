<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php ");
    }
    else {
        header("location:viewrequested.php");
    }
    require_once("config.php");

    $userid = $_SESSION["username"];
    $items = $_POST["item"];
    $type = $_POST["type"];
    $amt = $_POST["amt"];
    $unit = $_POST["unit"];
    $loc = $_POST["loc"];
    $details = $_POST["details"];

    $n = count($items);

    for ($i = 0; $i < $n; $i++)
    {
        $s = "INSERT INTO REQUESTS VALUES(DEFAULT,'$userid','$type[$i]','$items[$i]',$amt[$i],'$unit[$i]',DEFAULT,'$loc[$i]','$details[$i]',NULL,NULL)";
        mysqli_query($conn, $s);
    }
    
?>