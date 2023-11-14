<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
      header('location: ../public/login.php');
      exit();;
      var_dump($_SESSION);
    }
?>