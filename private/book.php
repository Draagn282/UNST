<?php
include("../includes/connect.php");
include("../includes/header.php");
include("./user_session.php");
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
      if(isset($_SESSION['user_id'])){
          $user_id = (int) $_SESSION['user_id'];
          $blem = $conn->prepare("SELECT username FROM users WHERE user_id = :user_id");
          $blem->bindParam(":user_id", $user_id, PDO::PARAM_INT);
          $blem->execute();
          $result = $blem->fetchAll(PDO::FETCH_ASSOC);
          echo "<a class='navbar_link' href='../private/account.php'>
          <button class='navbar_butn'>".$result[0]['username']."</button></a>";
      } else {
          echo "<a class='navbar_link' href='../public/login.php'>
          <button class='navbar_butn'>Login</button></a>";
      }
      ?>
  </div>
</div>
<div style="background-color: black;" class="navbar_space"></div>

<title>UNST Book</title>
<link rel="icon" type="image/x-icon" href="../assets/img/logo2_small_WIP.png">
<?php
$stm = $conn->prepare("SELECT * FROM journeys WHERE planet = :journey");
$stm->bindParam(":journey", $_GET['journey'], PDO::PARAM_STR);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $i)
{echo "
    <div class='journey_base_div'>
    <div class='booking_div'>
    <div class='booking_img'>
    <img class='booking_img_img' src='../assets/img/planets/".$i['planet'].".png'></div>
    <div class='booking_txt'>
    <h1>".$i['planet']."</h1>
    <p>".$i['longdescription']."</p></div>
    <div class='booking_buttons'>
    <div class='booking_section'>
    <h1>
        Price    
    </h1>
    <br>
    <div class='credits'>
        <svg height='22px' viewBox='0 0 52 45' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M38.5 1h-7.87l-3.241 5.136h-9.722L1 35.083h19.907l6.945-10.271h11.574l-2.315 3.735H30.63L19.982 44.42h7.87l6.018-9.805h7.408L51 18.275H24.148l-6.481 10.272h-4.63l9.26-15.875h8.333L38.5 1z' fill='#C4C4C4' stroke='#000'></path>
    <p> 
    ".$i['price']."</p>
    <br>
    </div>
    
    </div>
    <div class='booking_section'>
    <h1>
        How many travellers?    
    </h1>
    <br>
    <form class='form_date'  method='POST' action='../functions/book.php'>
    <div class='booking_slider_person'>
        <input type='range' name='rangeInput' onchange='updateTextInput(this.value);'min='1' max='10' step='1'value='1' id='slider_booking'>
        <input type='text' value='1' name='travellers' readonly id='textInput'>
    </div>
    </div>
    <div class='booking_section'>
    <h1>
        Date?    
    </h1>
    <br>
    <div class='booking_date'>
        <p>From</p>    
        <input type='date' name='start' id='currentDate' value='2022-05-25' min='2022-05-25' max='3000-12-31' >
    </div>
    <div class='booking_date'>
        <p>to</p>
        <input type='date' name='end' id='currentDate2' value='2022-05-25' min='2022-05-25' max='3000-12-31'>
    </div>
    </div>
    <div class='booking_section'>
    <h1>
        Go on a great journey!    
    </h1>
    <br>
    <input type='text' class='invisible' name='journey' value='".$_GET['journey']."'/>
    <input type='submit' name='insert_booking' class='booking_buttons_butn' value='order!'/>
    </div></form>

</div></div></div>
";}

?>

<div class="booking_recenties_div">
    <div class='recenties_txt_div'>
        <h1>Recenties van onze klanten</h1>
        <p>onze klanten houden van de ruimte. want de ruimte is mooi met al die sterren enzovoort. je moet een weeten waar noble six zit lekker in mijn achtertuin.</p>
    </div>
    <div class='home_recentie_div'>
        <div class='recenties_div'>
            <div class='recenties_div_1'>
                <div class='recenties_div_2'>
                    <div class='recenties_div_3'>

<?php
$blem = $conn->prepare("SELECT users.username, journeys.planet, reviews.text, reviews.stars FROM reviews INNER JOIN journeys ON reviews.planet_id=journeys.planet_id INNER JOIN users ON reviews.user_id=users.user_id WHERE planet = :planetname;");
// $blem = $conn->prepare("SELECT * FROM reviews WHERE planet = :planetname");
$blem->bindParam(":planetname", $_GET['journey'], PDO::PARAM_STR);
$blem->execute();
$result = $blem->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $i)
{echo "
<div class='recentie_content'>
<div class='recentie_content_naam'>
<p>".$i['username']."</p></div>
<div class='recentie_content_plaats'><p>".$i['planet']."</p></div>
<div class='recentie_content_txt'>
<p>".$i['text']."</p></div>
<div class='recentie_content_ster'>
<p>".str_repeat('⭐', $i['stars'])."</p>
</div>
</div>
";}
?>
</div></div></div></div></div>
</div>

<script src="../assets/js/slider.js"></script>
<script src="../assets/js/date.js"></script>

</body>

</html>     

