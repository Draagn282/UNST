<?php include('../includes/connect.php');
$username   =   $_POST['username'];
$email      =   $_POST['email'];
$password   =   $_POST['password'];

if (empty($username || $password)) {
    echo "All fields must be filled!";
} else if (isset($_POST['Register'])) {
    $usernamecheck = $conn->prepare( "SELECT * FROM users where username = :username");
    $usernamecheck->bindParam(":username", $_POST['username'], PDO::PARAM_STR);
    $usernamecheck->execute();
    $res = $usernamecheck->fetch(PDO::FETCH_ASSOC);
    if ($username != $res[0]){
        $sql = "INSERT INTO users ('username', 'email', 'password', 'admin') VALUES ('$username', '$email', '$password', 0)";
        $conn->prepare($sql)->execute();
        session_start();
        echo "successfull!";
        // if(!isset($_SESSION['userid'])){
        // header('location: ../index.php');
        // exit();
        // }
    }
} else {
    echo 'idk what happened';
    var_dump($test);
}
// header("Location: ../admin/admin.php");
// exit();
?>