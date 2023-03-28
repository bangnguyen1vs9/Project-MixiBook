<?php
    session_start();
    if(isset($_SESSION['tendangnhap']))
    {
        unset($_SESSION['tendangnhap']);
    }
    header('Location: index.php');
?>