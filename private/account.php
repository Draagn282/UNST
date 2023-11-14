<?php include('../includes/header.php');
include('../includes/connect.php');
?>
<title>UNST Account</title>
<link rel="icon" type="image/x-icon" href="../assets/img/logo2_small_WIP.png" />
<?php
session_start();
if(!isset($_SESSION['user_id'])){
  header('location: ../public/login.php');
  exit();;
  var_dump($_SESSION);
}
?>
<div class="navbar_main_div">
  <div class="navbar_logo">
    <a href="../index.php"
      ><img src="../assets/img/logo2_small_WIP.png" alt="logo"
    /></a>
  </div>
  <div class="navbar_middle_div">
    <a class="navbar_link" href="../index.php">
      <button class="navbar_butn">Home</button>
    </a>
    <a class="navbar_link" href="../public/journey.php">
      <button class="navbar_butn">great journey</button>
    </a>
    <a class="navbar_link" href="../public/contact.php">
      <button class="navbar_butn">Contact</button>
    </a>
    <?php
      // session_start();
      if(isset($_SESSION['user_id'])){
          $user_id = (int) $_SESSION['user_id'];
          $blem = $conn->prepare("SELECT username FROM users WHERE user_id =
    :userid"); $blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
    $blem->execute(); $result = $blem->fetchAll(PDO::FETCH_ASSOC); echo "<a
      class='navbar_link'
      href='../private/account.php'
    >
      <button class='navbar_butn'>
        ".$result[0]['username']."
      </button></a
    >"; } else { echo "<a class='navbar_link' href='../public/login.php'>
      <button class='navbar_butn'>Login</button></a
    >"; } ?>
  </div>
</div>
<div class="navbar_space"></div>

<div class="acc_main_div">
  <div class="acc_left_div">
    <div class="acc_info">
      <h1>
        Hello
        <?php 
      // session_start();
      if(isset($_SESSION['user_id'])){
          $user_id = (int) $_SESSION['user_id'];
          $blem = $conn->prepare("SELECT * FROM users WHERE user_id = :userid");
        $blem->bindParam(":userid", $user_id, PDO::PARAM_INT); $blem->execute();
        $result = $blem->fetchAll(PDO::FETCH_ASSOC); echo
        "".$result[0]['username']."
      </h1>
      <p>username:</p>
      <p>".$result[0]['username']."</p>
      <p>email:</p>
      <p>".$result[0]['email']."</p>
      "; }?>
      <form action="../functions/delete_account.php" method="POST">
        <input
          type="submit"
          name="delete_account"
          value="Request account deletion"
        />
      </form>
      <a href="../functions/logout.php">
        <button>Logout</button>
      </a>
    </div>
  </div>
  <div class="acc_middle_div">
    <div class="acc_booked">
      <h1>Planned bookings</h1>
      <!-- PHP start here -->
      <?php
      $blem = $conn->prepare('SELECT bookings.booking_id, users.username, journeys.planet, bookings.start, bookings.end, bookings.booking_id FROM bookings INNER JOIN users ON bookings.user_id=users.user_id INNER JOIN journeys ON bookings.planet_id=journeys.planet_id WHERE bookings.user_id = :userid;');
      $blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
      $blem->execute();
      $result = $blem->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $i){
        echo '
        <div class="book_card">
        <form action="./functions_private.php" method="POST" class="card_content">
          <p>'.$i["username"].'</p>
          <p>'.$i["planet"].'</p>
          <p>'.$i["start"].'</p>
          <p>'.$i["end"].'</p>
          <input type="text" class="invisible" name="booking_id" value="'.$i["booking_id"].'"/> 
          <input type="submit" name="delete_booking" value="Cancel journey"/>
        </form>
      </div>
      ';}?>
    </div>
  </div>
  <div class="acc_right_div">
    <div class="acc_rev">
      <h1>Written Reviews</h1>
      <?php 
      $blem = $conn->prepare('SELECT reviews.review_id, journeys.planet, reviews.text, reviews.stars FROM reviews INNER JOIN journeys ON reviews.planet_id=journeys.planet_id WHERE reviews.user_id = :userid;');
      $blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
      $blem->execute();
      $result = $blem->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $i)
      {echo '
        <div class="rev_card">
        <div class="rev_content">
          <p>'.$i["planet"].'</p>
          <p name="txt">'.$i['text'].'</p>
          <p>'.str_repeat('⭐',$i['stars']).'</p>
        </div>
      </div>
      ';}?>
    </div>
  </div>
</div>
