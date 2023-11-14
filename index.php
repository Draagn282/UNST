<?php
include("includes/header.php");
include("includes/connect.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="./assets/css/style.css">
<title>Uninted Nations Space Travels</title>
<link rel="icon" type="image/x-icon" href="../UNSCAirlines/assets/img/logo2_small_WIP.png">
<body>
    <div class="navbar_main_div">
        <div class="navbar_logo">
            <img src="./assets/img/Logo2_small_WIP.png" alt="logo" />
        </div>
        <div class="navbar_middle_div">
            <a class="navbar_link" href="index.php">
            <button class="navbar_butn">Home</button>
            </a>
            <a class="navbar_link" href="./public/journey.php ">
            <button class="navbar_butn">great journey</button>
            </a>
            <a class="navbar_link" href="./public/contact.php">
            <button class="navbar_butn">Contact</button>
            </a>
            
            <?php
            session_start();
            if(isset($_SESSION['user_id'])){
                $user_id = (int) $_SESSION['user_id'];
                $blem = $conn->prepare("SELECT username FROM users WHERE user_id = :userid");
                $blem->bindParam(":userid", $user_id, PDO::PARAM_INT);
                $blem->execute();
                $result = $blem->fetchAll(PDO::FETCH_ASSOC);
                echo "<a class='navbar_link' href='./private/account.php'>
                <button class='navbar_butn'>".$result[0]['username']."</button></a>";
            } else {
                echo "<a class='navbar_link' href='./public/login.php'>
                <button class='navbar_butn'>Login</button></a>";
            }?>
            </a>
        </button>
        </div>
    </div>
<div class="navbar_space"></div>
<div class="home_landing_title_div" id="landing">
    <div class="home_landing_title">
    </div>
   <div class="home_landing_txt">
    <p>
        We are very pleased for picking our space flight industry. We know that we are one of few
        so we try to give you the highest quality travels. Our transport is top of the line, the best of the best for the best from the best
        . Bring your friends and family, contribute to our great liniage. Whe have top of the line staff, Specificly chosen and [REDACTED] to suit our needs
        Many journeys await you along with great memmories, experiences and joy! 
    </p> 
   </div>
</div>
<div class="home_info_div" id="info">
    <div class="home_info_section">
        <h2>Why fly with us?</h2>
        <p>The galaxy is a dangerous space. Its cold, dark, very large and hostile. With us your needs will be provided and your dreams are ours to fulfill.</p>
    </div>
    <div class="home_info_section">
        <h2>Why we fly for you</h2>
        <p>We all at the UNST have been longing for a great space travel industry. So we all worked hard to get this company and industry going. Our blood, sweat and tears are all to thank.
        </p>   
        </div>
    <div class="home_info_section">
        <h2>Why Us and not the other companys?</h2>
        <p>The amount of choice for travel extends out of our company. But The UNSC last year had a child kidnapping accident, and the Covenant was accused of genocide. So the choice is obvious</p>
    </div>
</div>
<div class="home_journeys_div">

<div class="home_carrousel" id="top_location">
    <div class="home_slideshow_txt">
        <h1>Greates journeys</h1>
        <div class="slideshow_txt_div">
            <p>
                The amount of different, unique, special and great journeys are astounding. Every week we add a new location to our list. We keep exploring new and exiting places, planets and metal rings in space.
                But we also look back at the history of our own solar system. Mars, Jupiter, Saturn, Uranus and Pluto are great planets to visit.
                We also have some great new additions. Like a planet full of monkeys[CURRENTLY UNAVAILABLE], trolls, chickens, bugs and living flying robots. But our most precious journeys are the ring worlds.
                There are so many journeys to take part in. So many locals to meet. So many adventures to be had. Choose, plan and believe! In the greatest moments of your live. And start your GREAT JOURNEY!  
            </p> 
        </div>
    </div>
    <div class="slideshow">
        <div class="slideshow-container">
        <?php 
        $stm = $conn->query("SELECT * FROM journeys ORDER BY RAND()");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $i)
        {echo "
            <div class='mySlides fade'>
            <a href=\"private/book.php?journey=".$i['planet']."\"><img class='img_slideshow' src='assets/img/planets/".$i['planet'].".png'></a>
            <div class='txt_slideshow'><h1>".$i['planet']."</h1><br><p>".$i['shortdescription']."</p></div>
            </div>
        ";}?>
        </div>
        <br>
        <div class="dot_container">
        <?php foreach($result as $i)
        {echo "<span class='dot'></span>";}?>
        </div>
    </div>
    
</div>

<div class="home_recenties_div" id="recenties">
    <div class="recenties_txt_div">
        <h1>Reviews from customers</h1>
        <p>Read what our customers Think of us. Maybey be inspired to pick your next adventrure or to gain new insight!</p>
    </div>
</div>
<div class="home_recentie_div">
    <div class="recenties_div">
        <div class="recenties_div_1">
            <div class="recenties_div_2">
                <div class="recenties_div_3">
                <?php $blem = $conn->prepare("SELECT reviews.*,journeys.planet,users.username FROM reviews INNER JOIN journeys ON reviews.planet_id=journeys.planet_id INNER JOIN users ON reviews.user_id=users.user_id WHERE curated = 1 ORDER BY RAND(); ");
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
                    </div></div>";}?>
                </div>   
            </div>   
        </div>
    </div>
</div>
</div>
</div>
</div>     
</div>
<footer class="foot_div">
    <div class="footer_left">
    <img src="./assets/img/logo2_WIP.png" alt="Pelican" />
    </div>
    <div class="footer_right">
    <div class="footer_list">
        <a href="index.php"><p>Home</p></a>
        <hr class="footer_hr" />
        <a href="index.php#landing"><p>landing</p></a>
        <a href="index.php#info"><p>information</p></a>
        <a href="index.php#top_location"><p>top locatations</p></a>
        <a href="index.php#recenties"><p>reviews</p></a>
    </div>
    <div class="footer_list">
    <a href="./public/journey.php"><h1>journey</h1></a>
    <hr class="footer_hr" />
    <a href="./public/journey.php#search"><p>search journey</p></a>
    <a href="./public/journey.php#journey"><p>destinations</p></a>
    </div>
<div class="footer_list">
    <a href="./public/contact.php"><h1>Contact</h1></a>
    <hr class="footer_hr" />
    <a href="./public/contact.php#information"><p>information</p></a>
</div>

<div class="footer_list">
    <a href="./public/privacy_policy.php"><h1>privacy policy</h1></a>
</div>
</div>
</div>
</footer>
<script src="./assets/js/scrollfunciton.js"></script>
<script src="./assets/js/carousel.js"></script>
</body>
</html>