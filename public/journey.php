<?php
include('../includes/header.php');
include('../includes/connect.php');
?>
<title>UNST Journey</title>
<link rel="icon" type="image/x-icon" href="../assets/img/logo2_small_WIP.png">
<button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>
<?php include("../includes/navbar.php");?>
<div class="journey_search_div" id="search">
  <h1>
      Search your journey!
  </h1>
  <p>
      We would like to take on a GREAT JOURNEY!
  </p>
  <form class="nav_form" method="get">
    <input type="text" placeholder="Find your great journey" name="search">
</form>
</div>
<div class="journey_main_div" id="journey">
<?php   
    if (isset($_GET['search'])){
    $search = '%'.$_GET['search'].'%';
    $sql = "SELECT * FROM journeys WHERE planet LIKE :search ORDER BY planet ASC";
    $stm = $conn->prepare($sql);
    $stm->bindParam(":search", $search);
  } else {
    $sql = "SELECT * FROM journeys ORDER BY planet ASC";
    $stm = $conn->prepare($sql);
  }
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $i){
        echo "
        <div class='journey_base_div' id='".$i['planet']."'>
        <div class='journey_div'>
        <div class='journey_img'>
        <div class='aspect_div'>
        <img class='journey_img_img' src='../assets/img/planets/".$i['planet'].".png'></div></div>
        <div class='journey_txt'>
        <h1>".$i['planet']."</h1>
        <p>".$i['shortdescription']."</p></div>
        <div class='journey_buttons'>
        <a class='journey_buttons_link' href=\"../private/book.php?journey=".$i['planet']."\"><button class='journey_buttons_butn'>Information</button></a>
        </div></div></div>";
      }
    if(empty($result)){
      echo "<div class='journey_fill_div'><h1> No results found!</h1><p>Try searching something else?</p></div>";}
?>
</div>
<?php
 include('../includes/footer.php');
?>



<script src="../assets/js/backtotop.js"></script>
</html>