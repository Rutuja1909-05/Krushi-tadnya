<?php
require 'connection1.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
           
        }

        header {
            background-color: #68a73c;
            color: white;
            padding: 8px 0;
            text-align: center;
        }

        nav {
            background-color: #0005;
            color: white;
            text-align: center;
            padding: 25px 0;
            transition: background-color 0.3s ease;
            max-height: 100px;
        }

        .nav-icon {
            display: inline-block;
            position: relative;
            margin: 0 10px;
            padding-left: 40px;
            margin-left: 20px;
        }

        .nav-icon img {
           
            transition: opacity 0.3s ease;
            width: 30px; /* Adjust the size of the icons */
            height: auto;
        }

        .nav-icon:hover img {
            opacity: 1;
        }

        .nav-text {
            display: none;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            white-space: nowrap;
        }

        .nav-icon:hover .nav-text {
            display: block;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            
        }

        .content {
            text-align: justify;
            line-height: 1.6;
           
        }

        footer {
            background-color: #0005;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .hero-slider {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            border-radius: 10px;
            max-height: 500px;
        }

        .slide {
            display: none;
        }

        .slide img {
            width: 100%;
            height: auto;
        }

        .slide .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            font-size: 36px;
        }

        .slide .text p {
            font-size: 18px;
            margin-top: 10px;
        }

        .controls {
            text-align: center;
            margin-top: 10px;
        }

        .controls button {
            background-color: #92bf58;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .controls button:hover {
            background-color: #76ad32;
        }

        .features {
            margin-top: 30px;
            text-align: center;
        }

        .feature {
            display: inline-block;
            margin: 10px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature img {
            width: 50px;
            height: auto;
            margin-bottom: 10px;
        }

        .feature h3 {
            margin-top: 0;
        }
        .logo{
            margin-top: -20px;
        }
    </style>
    <div id="google_element"></div>
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

</head>
<body>



<nav>
<img class="logo"src="coollogo_com-128613146.png" width="150px" height="80px" style="float: left; padding-top=10px ;padding-left: 30px;">    
<a href="#" class="nav-icon">
        <img src="navicons/icons8-home-50.png" alt="Home">
        <span class="nav-text">Home</span>
    </a>
    <a href="home_buyer.php" class="nav-icon">
        <img src="navicons/group.png" alt="About">
        <span class="nav-text">About Us</span>
    </a>
    
    
    <a href="displayproducts1.php" class="nav-icon">
        <img src="navicons/icons8-products-48.png" alt="Products">
        <span class="nav-text">Products</span>
    </a>

    <a href="pricebot.php" class="nav-icon">
        <img src="navicons/chatbot.png" alt="Contact">
        <span class="nav-text">PriceBot</span>
        
    <a href="gallery.php" class="nav-icon">
        <img src="navicons/picture.png" alt="Contact">
        <span class="nav-text">Gallery</span>

    <a href="feedback.php" class="nav-icon">
        <img src="navicons/feedback.png" alt="Contact">
        <span class="nav-text">Feedback</span>

    <a href="contact.php" class="nav-icon">
        <img src="navicons/phone.png" alt="Contact">
        <span class="nav-text">Contact</span>
    </a>
    <a href="profile(buyer).php" class="nav-icon">
        <img src="profile_farmer.png" alt="About">
        <span class="nav-text">Profile</span>
    </a>
</nav>

<div class="container">
    <div class="hero-slider">
        <div class="slide">
            <img src="Natural-farming-.jpg" alt="Slide 1">
            <div class="text">
               <h2>Quality Products</h2>
                <p>We offer a wide range of high-quality agricultural products.</p>
            </div>
        </div>
        <div class="slide">
            <img src="3.jpg" alt="Slide 2">
            <div class="text">
                <h2>Sustainable Practices</h2>
                <p>Our farming practices prioritize sustainability and environmental conservation.</p>
            </div>
        </div>
        <div class="slide">
            <img src="slide2.avif" alt="Slide 3">
            <div class="text">
                <h2>Sustainable Practices</h2>
                <p>Our farming practices prioritize sustainability and environmental conservation.</p>
            </div>
        </div>
        <div class="slide">
            <img src="slide3.jpg" alt="Slide 4">
            <div class="text">
                <h2>Farm to Table</h2>
                <p>Experience the freshest produce directly from our farm to your table.</p>
            </div>
        </div>
        <div class="slide">
            <img src="slide2.jpg" alt="Slide 5">
            <div class="text">
                <h2>Farm to Table</h2>
                <p>Experience the freshest produce directly from our farm to your table.</p>
            </div>
        </div>
        <div class="controls">
            <button onclick="prevSlide()">Prev</button>
            <button onclick="nextSlide()">Next</button>
        </div>
    </div>

    <div class="features">
        <div class="feature">
            <img src="features/nature-product.png" alt="Icon 1">
            <h3>Organic</h3>
            <p>Organic farming practices</p>
        </div>
        <div class="feature">
            <img src="features/planet-earth.png" alt="Icon 2">
            <h3>Sustainability</h3>
            <p>Environmentally sustainable</p>
        </div>
        <div class="feature">
            <img src="features/planting.png" alt="Icon 3">
            <h3>Quality</h3>
            <p>High-quality products</p>
        </div>
        <div class="feature">
            <img src="features/fresh.png" alt="Icon 4">
            <h3>Fresh products</h3>
            <p>Supporting local communities</p>
        </div>
    </div>

    <div class="content">
        <h2>About us</h2>
        <p> Crops Analysis is a web application as well as an android application that helps the 
farmer and businessman to interact with each other without any mediator. This system 
will help the farmer to get the actual price for his inputs (crops). With the help of this 
system, the farmer will be able to know the best value for his product (crops) and will 
not be fooled by the marketers. In fraudster’s cases the user will be able to 
block the fraud user.
</p>

        <h2>Objective</h2>
        <p>The main objective of this system is to help the farmer’s, businessman’s and the 
customer’s to get the best price from his inputs. In this system the farmer will upload 
crops and the businessman will then bid for the crop and then among the best five 
bidders one will be chosen. This system is also having a special feature of blocking 
the fraud user’s. In the existing system, the farmers were unable to get best price as 
were also fooled by the mediators or retailer. In this system the farmer will get to 
know the actual price of the particular product and thus there will be no possibilities 
of getting fooled. The major benefit of this system will be that, it is time saving and 
feasible. The farmer’s does not need to travel long distance to sell their products 
(crops).</p>
    </div>
</div>

<footer>
    <p>&copy; 2024 Agriculture Website. All rights reserved.</p>
</footer>

<script>
    function loadGoogleTranslate()
   {
    new google.translate.TranslateElement("google_element")
   }
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("slide");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 2000); // Change slide every 5 seconds
    }

    function prevSlide() {
        if (slideIndex === 1) {
            slideIndex = document.getElementsByClassName("slide").length;
        } else {
            slideIndex--;
        }
        showSlides();
    }

    function nextSlide() {
        if (slideIndex === document.getElementsByClassName("slide").length) {
            slideIndex = 1;
        } else {
            slideIndex++;
        }
        showSlides();
    }
</script>

</body>
</html>

