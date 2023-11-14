<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location: ../../public/login.php');
        exit();
    }
?>