<?php
include("../includes/connect.php");
session_start();
if(!isset($_SESSION['user_id'])){
  header('location: ../public/login.php');
  exit();;
}
var_dump($_POST);
// $planet = $_POST['planet'];
$sql = "SELECT planet_id FROM journeys WHERE `planet` = '".$_POST['planet']."';";
$stm = $conn->prepare($sql);
var_dump($sql);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
$planet_id = (int) $result[0]['planet_id'];
?>
<br>
<?php
var_dump($planet_id);
?>
<br>
<?php

if (isset($_POST['insert_review'])){
    $user_id = (int) $_SESSION['user_id'];
    $text = $_POST['text'];
    $stars = $_POST['stars'];
    $sql = "INSERT INTO reviews (`stars` , `user_id`, `planet_id`, `text`) VALUES ('$stars', '$user_id', '$planet_id', '$text')";
    $conn->prepare($sql)->execute();
    header("Location: ./account.php");
    exit();
}
// ?>