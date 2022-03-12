<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php ");
    }
    else {
        header("location:viewdonated.php");
    }
    require_once("config.php");

    $userid = $_SESSION["username"];
    $items = $_POST["item"];
    $type = $_POST["type"];
    $amt = $_POST["amt"];
    $unit = $_POST["unit"];
    $remarks = $_POST["remarks"];

    $n = count($items);
    for ($i = 0; $i < $n; $i++)
    {
        $s = "INSERT INTO DONATIONS VALUES(DEFAULT,'$userid','$type[$i]','$items[$i]',$amt[$i],'$unit[$i]',DEFAULT,'$remarks[$i]')";
        mysqli_query($conn, $s);
        $s1 = "UPDATE RESOURCES SET AMOUNT=AMOUNT+$amt[$i] WHERE TYPE='$type[$i]' AND SUBTYPE='$items[$i]'";
        $s2 = "INSERT INTO RESOURCES VALUES('$type[$i]','$items[$i]',$amt[$i],'$unit[$i]')";
        echo "<h3>$s1<br>$s2</h3>";
        mysqli_query($conn, $s1);
        if (mysqli_affected_rows($conn) == 0) {
            mysqli_query($conn, $s2);
        }   
    }
    
?>