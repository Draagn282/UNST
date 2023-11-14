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
    <a class="navbar_link" href="journey.php">
      <button class="navbar_butn">great journey</button>
    </a>
    <a class="navbar_link" href="contact.php">
      <button class="navbar_butn">Contact</button>
    </a>
    <?php
      include('../includes/connect.php');
      session_start();
      if(isset($_SESSION['user_id'])){
          $user_id = $_SESSION['user_id'];
          $blem = $conn->prepare("SELECT username FROM users WHERE user_id = :userid");
          $blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
          $blem->execute();
          $result = $blem->fetch(PDO::FETCH_ASSOC);
          echo "<a class='navbar_link' href='../private/account.php'>
          <button class='navbar_butn'>".$result['username']."</button></a>";
      } else {
          echo "<a class='navbar_link' href='../public/login.php'>
          <button class='navbar_butn'>Login</button></a>";
      }
      ?>
  </div>
</div>
<div class="navbar_space"></div>
