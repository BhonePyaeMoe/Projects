<?php

session_start();
include('connection.php');

if (isset($_SESSION['CID'])) 
{
    $CuID = $_SESSION['CID'];

    $check = "SELECT * From customer Where CustomerID = $CuID";

    $query = mysqli_query($connect,$check);
    $data = mysqli_fetch_array($query);

    $CProfile = $data['Profile'];
}
        



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    

    <title>Camping</title>
</head>
<body>

    <div class="Home1">

        <header>

            <div class="GWSC">

                <img id="GWSC" src="Image/image.png">

            </div>

            <div class="navbar">
                <ul class="nav-list">
                    <li> <a href="Home.php">Home</a> </li>
                    <li> <a href="Contact.php">Contact</a> </li>
                    <li> <a href="Review.php">Review</a> </li>
                    <li> <a href="Feature.php">Feature</a> </li> 
                    <li> <a href="Local.php">Local</a> </li>
                    <li> <a href="Avaliability.php">Avaliable Pitch</a> </li>
                    <li> <a href="Information.php">Information</a> </li>
                </ul>
            </div>   

            

            
            <div class="icon" onclick="toggleMenu()">

                <i class='fas fa-bars'></i>
                
            </div>  

        </header>

        <a href="#" id="toggle-popup" class="Popup-link"> <i class="fa-regular fa-user" id="icon"></i> </a>

        <div id="popup" class="popup">

            <div class="popup-content">

                <a href="CustomerLogin.php">Login</a>

                <a href="CustomerRegister.php">Register</a>

            </div>            

        </div>

        

        <div class="Home-Pad">

            <div class="Home-box">

                <div class="Home-Info1">

                    <h1> Camping Paradise</h1>

                    <p> Join our community of outdoor enthusiasts and start your camping adventure today. <br> <br> Discover the beauty of the great outdoors with us together. </p>

                </div>

            
                <div class="Btn">

                    <a href="Information.php">Explore</a>

                </div>   

            </div>

        </div>

    </div>

    <div id="google_translate_element"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() 
        {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <div class="Home-context">

        <div class="Home-sub">

            <h1>About Us</h1> <br> <br>
            <p> Welcome to Camping Paradise, your ultimate resource for all things camping in the United Kingdom! <br> Our mission is to inspire and assist fellow adventurers in planning unforgettable camping experiences. <br>
            We're here to share our knowledge, promote responsible outdoor recreation, and help you create lasting memories in the breathtaking British outdoors.
            </p>

        </div>

        <div class="Home-img">

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18956216.182681162!2d-4.473772!3d54.55128!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2smm!4v1695964695986!5m2!1sen!2smm"></iframe>

        </div>          

    </div>

    <div class="des">

        <div class="des-intro">

            <h1> What does we offer?</h1>

        </div>

        <div class="Home-main">

            <div class="Home-img">

                <img src="Image/Home1.jpg">
                
            </div>

            <div class="Home-sub">

                <h1>Tent Camping</h1> <br> <br>
                <p> Traditional tent camping involves setting up a tent in the wilderness or at a campsite. <br>
                        It's a classic way to experience the great outdoors, sleep under the stars, and immerse yourself in nature. </p>

            </div>
 
        </div>


        <d  
        iv class="Home-main">

            <div class="Home-sub">

                <h1>Campfire Event  </h1> <br> <br>
                <p> Step into the warmth of our campfire nights, where the crackling flames illuminate stories, and a sense of togetherness. <br>
                    Join us for a moment when the magic of the fire ignites unforgettable memories in the heart of the wilderness.
                </p>

            </div>

            <div class="Home-img">

                <img src="Image/Activity.jpg">

            </div>          

        </d>

        <div class="Home-main">

            <div class="Home-img">

                <img src="Image/Home4.png">
                
            </div>

            <div class="Home-sub">

                <h1>Gear and Equipment</h1> <br> <br>
                <p> Explore our handpicked selection of top-quality camping gear and equipment designed to enhance your outdoor adventures. <br>
                    From rugged tents to high-performance cookware, we've got you covered for a memorable camping experience. </p>

            </div>
 
        </div>

    </div>
    
        <div class="slideshow-container">
            
            <div class="slide fade">

                <img src="Image/Slide1.jpg" alt="Image 1">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="slide fade">

                <img src="Image/Slide2.jpg" alt="Image 2">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="slide fade">

                <img src="Image/Slide3.jpg" alt="Image 3">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="slide fade">

                <img src="Image/Slide4.jpg" alt="Image 4">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="slide fade">

                <img src="Image/Slide5.jpg" alt="Image 5">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="slide fade">

                <img src="Image/Slide6.jpg" alt="Image 6">
                <div class="text"> 

                    <h1>Enjoy your adventure together with us!!</h1>
            
                </div>

            </div>

            <div class="dots">

                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                
            </div>
        </div>






        

        <footer>

            <div class="footer-start">  

                <h2>Global Wild Swimming and Camping</h2>

            </div>

            <div class="footer1">

                <div class="footer1-1">

                    <div class="footer2-1">

                        <div class="footer3-1">

                            <h3>Our Company</h3>

                            <p id="now">Home</p>
                            <p>Contact</p>
                            <p>Review</p>

                        </div>

                        <div class="footer3-1">
                            
                            <h3>Explore</h3>

                            <p>Feature</p>
                            <p>Local</p>
                            <p>Information</p>
                            <p>Avaliability</p>
                            <p>Booking</p>

                        </div>

                    </div>

                </div>

                <div class="footer1-2">
            
                    <h1>Need Help?</h1> <br> <br>

                    <p>©Copyright : GWSC Camping Website</p>

                    <div class="footer-img">

                        <i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i>

                        <i class="fa-brands fa-instagram" style="color: #ffffff;"></i>

                        <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>

                        <i class="fa-brands fa-pinterest" style="color: #ffffff;"></i>

                        <i class="fa-brands fa-youtube" style="color: #ffffff;"></i>

                    </div>

                </div>



                

            </div>

        </footer>

        <script src="script.js"></script>
</body>
</html>