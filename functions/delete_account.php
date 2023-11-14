<?php
include("../includes/connect.php");
session_start();
if(isset($_POST['delete_account'])){
            $stm = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
            $stm->bindParam(":user_id", $_SESSION['user_id'], PDO::PARAM_INT);
            $stm->execute();
}
header("Location: ./logout.php");
exit();
?>