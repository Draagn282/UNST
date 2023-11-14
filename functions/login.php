<?php
include("../includes/connect.php");
    // $qu = "SELECT * FROM users WHERE 'username' = $username"; 

    // Ophalen userID, password en admin 
    // password om daarna te controleren of die klopt met het ingevoerde wachtwoord (password_verify)
    // Als die kloppen, dan controleren of admin 0 of 1 is, zodat je weet of je de sessioN_admin op true moet zetten
    // dan sturen naar de juiste pagina, bij admin kan dat de backend zijn, bij user kan het de frontend zijn
    if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
        $sql = "SELECT user_id, admin, password FROM users WHERE username = :username";
        $usercheck = $conn->prepare($sql);
        $usercheck->bindParam(":username", $username, PDO::PARAM_STR);
        $usercheck->execute();

        $res = $usercheck->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $res['password'])){
            session_start();
            $_SESSION['user_id'] = $res['user_id'];
            if ($res['admin'] == 1) {
                $_SESSION['admin'] = true;
                // $firstplanet = "SELECT planet_id FROM journeys ORDER BY planet ASC LIMIT 1";
                header('location: ../admin/reviews.php');
                exit();
            } else {
                header('location: ../private/account.php');
                exit();
            }
        }
        header('location: ../public/login.php');
        exit();
    }
     else{
    header('location: ../index.php');
    exit();
    }
?>