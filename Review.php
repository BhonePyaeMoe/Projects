<?php

include('connection.php');
session_start();

if (!isset($_SESSION['CID'])) 
{
    echo "<script>window.alert('Customer Login Please')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}
else
{
    $_GET['txtname'] = $_SESSION;

    $CID = $_SESSION['CID'];
    
    $check = "SELECT * From customer Where CustomerID = $CID";

    $query = mysqli_query($connect,$check);
    $data = mysqli_fetch_array($query);

    $CProfile = $data['Profile'];
    $CFName = $data['FirstName'];
    $CLName = $data['LastName'];

    $CName = "$CFName $CLName";
}
    




if (isset($_POST['btnsubmit']))
{
    $rate = $_POST['rdorate'];  
    $feedback = $_POST['txtfeedback'];
    $CustomerID = $_POST['txtCID'];

    $insert = "INSERT INTO review (CustomerID,Rating,Feedback) VALUES ('$CustomerID','$rate','$feedback')";
    $query = mysqli_query($connect,$insert);

}

    $Rating  = "SELECT AVG(Rating) From review";
    $Result6 = mysqli_query($connect,$Rating);
    $row = mysqli_num_rows($Result6);

    $Rate = mysqli_fetch_row($Result6);

    $AVGRATE = array_sum($Rate) / count($Rate);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Camping</title>
</head>
<body>
    <section class="info">

    <header>

        <div class="Most-Head">

            <div class="GWSC">

            <img id="GWSC" src="Image/image.png">

            </div>

            <div class="navbar">

                <ul class="nav-list">

                    <li> <a href="home.php">Home</a> </li>
                    <li> <a href="Contact.php">Contact</a> </li>
                    <li> <a href="Review.php">Review</a> </li>
                    <li> <a href="Feature.php">Feature</a> </li> 
                    <li> <a href="Local.php">Local</a> </li>
                    <li> <a href="Avaliability.php">Avaliable Pitch</a> </li>
                    <li> <a href="Information.php">Information</a> </li>

                </ul>

            </div>   
            
            <div class="icon" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div> 
        
        </div>

    </header>

    <div class="Review-main">

        <h1> Popular Reviews </h1>

        <legend> <?php echo $AVGRATE ?> ★ RATING of <?php echo $row ?> reviews </legend>

        <div class="review-container">

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile1.jpg" class="profile">

                        <br> <br>
                        <h3> Name : Sam Johnsan </h3>
                        <br> <br>

                    </div>

                    <p>I was really surprised that the views are identical to the pictures displayed on the website. It was worth every seconds I used on this camping trip. I am also looking forward for next time.</p> <br>

                    <div class="rate">★ ★ ★ ★ ★</div> 

                </div>
                
                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile2.jpg" class="profile">

                        <br><br>
                        <h3> Name : Ivy Rebecaa </h3> 
                        <br> <br>

                    </div>

                    <p>I am one of the person who likes to travel and camp. It makes me happy and become in love with the enviroment. Since I have booked with so many company for camping, among them, this is one of the company I really recommned. </p> <br>

                    <div class="rate">★ ★ ★ ★ ☆</div> 

                </div>

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile3.jpg" class="profile"> 

                        <br><br>
                        <h3>Name : Amelia Watson</h3>
                        <br> <br>
 
                    </div>

                    <p>I was usually a introvert and wants to stay at home all the time. But my friends forced me to go camping trip with them. We decided to book a pitch from this website. I enjoyed a view a lot and memorable moments. </p> <br>

                    <div class="rate">★ ★ ★ ★ ☆</div> 

                </div>

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile4.jpg" class="profile">

                        <br> <br>
                        <h3>Name : Jessica</h3>
                        <br> <br> 


                    </div>

                    <p>I once booked a campsite in London with my friends. The gear and equipment provided by this company is quite good. It is super useful when we go camping. The quaily of items provided are also good so that the camping went so smoothly.</p> <br>

                    <div class="rate">★ ★ ★ ★ ★</div>


                </div>

        </div>

        <div class="review-container">

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile5.jpg" class="profile">

                        <br> <br>
                        <h3>Name : Emily</h3> 
                        <br> <br>

                    </div>

                    <p>The reason why i like to recommend this website is that most of the pitches are avaliable and their view-points are so amazing. Sometimes, it is hard to choose which pitch to book and go camping.    </p> <br>

                    <div class="rate">★ ★ ★ ★ ☆</div> 

                </div>
                
                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile6.jpg" class="profile">

                        <br><br>
                        <h3> Name : Thomas Bobb </h3>
                        <br> <br>
         

                    </div>

                    <p>To be honest, I had a hard time dealing with the GPS provided. I am a regular customer of this website but there is a first time for me like this. I almost got lost in the dark wood and it was a terrible time for me to recall. </p> <br>

                    <div class="rate">★ ★ ★ ☆ ☆</div> 

                </div>

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile7.jpg" class="profile"> 

                        <br><br>
                        <h3>Name : Helen Eleanor</h3>
                        <br> <br>

 
                    </div>

                    <p>I once booked a campsite in London with my friends. The gear and equipment provided by this company is quite good. It is super useful when we go camping. The quaily of items provided are also good so that the camping went so smoothly.</p> <br>

                    <div class="rate">★ ★ ★ ★ ☆</div> 

                </div>

                <div class="review">

                    <div class="review-header">

                        <img src="Image/profile8.jpg" class="profile">

                        <br> <br>
                        <h3>Name : David Ken</h3>
                        <br> <br>

                    </div>

                    <p>I once booked a pitch and go camping alone. but other customers near my pitch are friendly and they  help me a lot. I also got some friends whose hobby is same as mine. The website make my social life lively.</p> <br>

                    <div class="rate">★ ★ ★ ★ ★ </div>


                </div>

        </div>



    </div>



    <div class="Review-Box">

        <div class="Review-Form">

            <form action="Review.php" method="POST" class="FormR">

                <h1>Create Your Own Review</h1>

                    <embed src=" <?php echo $CProfile ?> ">

                    <legend> Dear   <?php echo $CName ?> </legend>

                <p>Please Submit Review Form by using these fields below ;</p>

                

                 
                <div class="rating">

                    <span> Please select the rating ( 1★   to  5★ )</span>

                    <input type="radio" name="rdorate" value="5" id="star5">
                    <label for="star5"></label>

                    <input type="radio" name="rdorate" value="4" id="star4">
                    <label for="star4"></label>

                    <input type="radio" name="rdorate" value="3" id="star3">
                    <label for="star3"></label>
                    
                    <input type="radio" name="rdorate" value="2" id="star2">
                    <label for="star2"></label>
                    
                    <input type="radio" name="rdorate" value="1" id="star1">
                    <label for="star1"></label>

                </div>

                <input type="text" name="txtfeedback" required placeholder=" Write A Review"> <br>

                <input type="hidden" name="txtCID" value="<?php echo $_SESSION['CID']; ?>"> <br>

                <input type="submit" name="btnsubmit" value="SUBMIT">


            </form>

        </div>

    </div>

    </section>


    <footer>

            <div class="footer-start">

                <h2>Global Wild Swimming and Camping</h2>

            </div>

            <div class="footer1">

                <div class="footer1-1">

                    <div class="footer2-1">

                        <div class="footer3-1">

                            <h3>Our Company</h3>

                            <p>Home</p>
                            <p>Contact</p>
                            <p id="now">Review</p>

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

                    <p>Visit Customer Support -></p>

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


</body>
</html>