<footer>
<?php
$user_id = (int) $_SESSION['user_id'];
$blem = $conn->prepare("SELECT username FROM users WHERE user_id = :userid");
$blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
$blem->execute();
$result = $blem->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $i){echo "<h2>Logged in as ".$i['username']." | <a href='../functions/logout.php'>logout</a></h2>";}?>
</footer>
</body>
</html>