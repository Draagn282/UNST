<?php
include("../includes/connect.php");
include("./user_session.php");
if (isset($_POST['book'])){
    $travellers = $_POST['travellers'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];

    $sql = "INSERT INTO journeys (planet, shortdescription, longdescription, price) VALUES ('$planet', '$shortdescription', '$longdescrtiption', $price)";
    if (empty($planet || $shortdescription || $longdescription || $price)) {
        echo "All fields must be filled in!";
    } else if (isset($_POST['bttn'])) {
        echo 'Complete!';
        $conn->prepare($sql)->execute();
        header('Location: ../admin/admin.php');
	    exit();
    } else {
        echo 'idk what happened';
    }
} else {
    echo "<br>";}
var_dump($_POST['booking_id']);
if (isset($_POST['delete_booking'])){
    $stm = $conn->prepare("DELETE FROM bookings WHERE `booking_id` = ".(int) $_POST['booking_id']."");
    $stm->execute();
    header("Location: ./account.php");
    exit();
}


?>