<?php 
include("../includes/header.php");
include('../includes/connect.php');
include("../includes/navbar.php") ?>
<body>
<title>UNST Login</title>
<link rel="icon" type="image/x-icon" href="../assets/img/logo2_small_WIP.png">
    <div class="login_div">
      <div class="loggin_main">
        <div class="loggin_txt">
          <p>Log in</p>
        </div>
        <div class="loggin_form">
          <form action="../functions/login.php" method="POST"> 
            <label for="name">Username:</label>
            <input type="text" id="name" name="username" autocomplete="off" placeholder="username here">
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="password" autocomplete="off">
            <input type="submit" id="formlog" name="login" value="Login">
          </form>
      </div>
    </div>
    <div class="loggin_main">
      <div class="loggin_txt">
        <p>Register</p>
      </div>
      <div class="loggin_form">       
      <form action="../functions/register.php" method="POST"> 
            <label>Username:</label>
            <input type="text" id="newname" name="username" autocomplete="off">
            <label for="name">Email:</label>
            <input type="text" id="newemail" name="email" autocomplete="off">
            <label for="pass">Password:</label>
            <input type="password" id="newpass" name="password" autocomplete="off">
            <input type="submit" id="buttonreg" name="Register" value="Register">
      </form> 
      </div>

    </div>
 
</div>
<script src="../assets/js/checkbox.js"></script>
</body>
</html>