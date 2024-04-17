<?php

include('connection.php');
session_start();









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

            <div class="icon" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>  

        </div>       
        
    </div>

</header>

        <fieldset class="Info">

        <div class="Info-Topic">

            <h1>Local Attractions</h1>

        </div>
            
            <section class="Local-main">

                    <?php

                        $query = "SELECT * FROM Pitch";
                        $ret = mysqli_query($connect,$query);
                        $count = mysqli_num_rows($ret);

                        if ($count == 0) 
                        {
                            echo "<h4> Not Found </h4>";
                        }
                        else
                        {
                            for ($i=0; $i < $count ; $i+=2) 
                            { 
                                $query1 = "SELECT * FROM Pitch p, PitchType pt where p.PitchTypeID = pt.PitchTypeID ORDER BY PitchID LIMIT $i,2";
                                $ret1 = mysqli_query($connect,$query1);
                                $count1 = mysqli_num_rows($ret1);

                                echo "<div class = 'local-column'>";

                                for ($j=0; $j < $count1 ; $j++)  //column 
                                { 
                                    $data = mysqli_fetch_array($ret1);
                                    $PID = $data['PitchID'];
                                    $PName = $data['PitchName'];
                                    $localname1 = $data['Localname1'];
                                    $localname2 = $data['Localname2'];
                                    $localname3 = $data['Localname3'];
                                    $localimg1 = $data['Localimg1'];
                                    $localimg2 = $data['Localimg2'];
                                    $localimg3 = $data['Localimg3'];
                                    $desc = $data['Description'];
                    
                    ?>

                                    <div class="Local-box">
                                        
                                        <div class="Local-Info">

                                            <h1> <?php echo $PName ?> </h1>

                                            <p> <?php echo $desc ?> </p>

                                        </div>

                                        <div class="Local-img">

                                            <img src=" <?php echo $localimg1 ?> ">

                                            <img src=" <?php echo $localimg2 ?> ">

                                            <img src=" <?php echo $localimg3 ?> ">

                                        </div>

                                    </div>

                                    
                                    

                    <?php
                                }

                                echo "</div>";
                            }
                        }

                    ?>


                    </section>


        </fieldset>



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
                            <p>Review</p>

                        </div>

                        <div class="footer3-1">
                            
                            <h3>Explore</h3>

                            <p>Feature</p>
                            <p id="now">Local</p>
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



    <script src="script.js"></script>
</body>
</html>