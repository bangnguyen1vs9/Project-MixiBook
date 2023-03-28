<?php
    session_start();
    $id=$_GET['sachchon'];
    if(isset($_SESSION['giohang'][$id]))
    {
        $sl=$_SESSION['giohang'][$id]+1;

    }
    else{
        $sl=1;
    }
    $_SESSION['giohang'][$id]=$sl;
    header("location:giohang.php");
    exit();
?>