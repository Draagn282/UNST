<?php
include("../includes/header.php");
include("./user_session.php");
?>
<title>UNST Arrived</title>
<link rel="icon" type="image/x-icon" href="../assets/img/logo2_small_WIP.png">
<div class="arrived_div">
    <div class="arrvived_rev_div">
        <form class="arrived_form" method="POST" action="insert_review.php">
            <div class="arrived_txt">
                <h1>Do you want to write a review?</h1>
            </div>
            <div class="arrvived_rev_txt_div">
              <div class="arrvived_txt">
                <p>write your experience</p>
              </div>
                <textarea name="text" placeholder="        type something here"></textarea>
            </div>
            <div class="arrvived_rev_star_div">
            <div class="arrvived_txt">
                <p>rate out of 5</p>
                </div>
              <div class="arrvived_rev_star_input">
                <input type='range' name='rangeInput' onchange='updateTextInput(this.value);'min='1' max='5' step='1'value='5' id='slider_booking'>
                <input type='text' name='stars' value='5' readonly id='textInput'>..</p>
                <input class='invisible' type='text' name='user_id' value='<?php echo $_SESSION['user_id']?>'>
                <input class='invisible' type='text' name='planet' value='<?php echo $_GET['journey']?>'>
              </div>
            </div>
            <div class="arrived_rev_butn">
                <!-- <a href="../index.php"><button  class="arrived_butn1">no i do not want to leave a reveiuw</button></a> -->
                
                <input class="arrived_butn2" type="submit" value="send" name="insert_review">
                </form>
                <a href="../private/account.php" class="arrived_butn1">nosend</a>
             </div>
        
       
      </div>
</div>
<script src="../assets/js/slider.js"></script>
</body>
</html>
<!-- 
<form method="post" action="insert.php">
    <input type="text"   name="price"            placeholder="Price">
    <input type="text"   name="planet"           placeholder="Planet name">
    <input type="text"   name="img"              placeholder="Image">
    <input type="text"   name="shortdescription" placeholder="Short description">
    <input type="text"   name="longdescription"  placeholder="Long description">
    <input type="submit" name="bttn" value="send">
</form> -->