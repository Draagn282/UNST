<?php $servername = "localhost";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=unst", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
        } catch(PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
        }
?>