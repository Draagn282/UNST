<?php
include('../private/user_session.php');
include('../includes/connect.php');
if(isset($_POST['insert_booking'])){
    $user_id = $_SESSION['user_id'];
    $planet = $_POST['journey'];
    $stm = $conn->prepare("SELECT planet_id FROM journeys WHERE planet = :planet");
    $stm->bindParam(":planet", $planet, PDO::PARAM_STR);
    $stm->execute();
    $planet_id = (int) $stm->fetchAll(PDO::FETCH_ASSOC)[0]['planet_id'];

    $stm = $conn->prepare("SELECT price FROM journeys WHERE planet = :planet");
    $stm->bindParam(":planet", $planet, PDO::PARAM_STR);
    $stm->execute();
    $price = $stm->fetchAll(PDO::FETCH_ASSOC)[0]['price'];
    
    var_dump($planet_id); 
    var_dump(floatval($price));
    var_dump($planet);
    $travellers =   $_POST['travellers'];
    $start_date =   $_POST['start'];
    $end_date   =   $_POST['end'];
    $sql = "INSERT INTO `bookings`(`user_id`, `planet_id`, `price`, `travellers`, `start`, `end`) VALUES ('$user_id','$planet_id','$price','$travellers','$start_date','$end_date');";
    $conn->prepare($sql)->execute();
    header("Location: ../private/arrived.php?journey=".$planet."");
    exit();
}
?>