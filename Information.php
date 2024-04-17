<?php

session_start();
include('connection.php');

if (!isset($_SESSION['CID'])) 
{
    echo "<script>window.alert('Customer Login Please')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}
else
{
    $CID = $_SESSION['CID'];
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

            <h1> INFORMATION </h1>

        </div>
            
            <section class="Info-table">

                    <?php

                        $query = "SELECT * FROM Pitch";
                        $ret = mysqli_query($connect,$query);
                        $count = mysqli_num_rows($ret);

                        if ($count == 0) 
                        {
                            echo "<h4>Cannot found Pitch Information</h4>";
                        }
                        else
                        {
                            for ($i=0; $i < $count ; $i+=2) 
                            { 
                                $query1 = "SELECT * FROM Pitch p, PitchType pt where p.PitchTypeID = pt.PitchTypeID ORDER BY PitchID LIMIT $i,2";
                                $ret1 = mysqli_query($connect,$query1);
                                $count1 = mysqli_num_rows($ret1);

                                echo "<div class = 'info-column'>";

                                for ($j=0; $j < $count1 ; $j++)  //column 
                                { 
                                    $data = mysqli_fetch_array($ret1);
                                    $PID = $data['PitchID'];
                                    $PName = $data['PitchName'];
                                    $PImg = $data['PitchImg'];
                                    $Price = $data['Price'];
                                    $Map = $data['Map'];
                                    $FName1 = $data['Facilitiesname1'];
                                    $FName2 = $data['Facilitiesname2'];
                                    $FName3 = $data['Facilitiesname3'];
                                    $localname1 = $data['Localname1'];
                                    $localname2 = $data['Localname2'];
                                    $localname3 = $data['Localname3'];
                                    $localimg1 = $data['Localimg1'];
                                    $localimg2 = $data['Localimg2'];
                                    $desc = $data['Description'];
                                    $viewcount = $data['Viewcount'];
                    
                    ?>
                                <div class="Info-Item">

                                    <div class = "Info-SRow">

                                        <embed src="<?php echo $PImg ?>" class="PImg"> <br>

                                        <div class="FRow-Topic">

                                            <h1> <?php echo $PName ?></h1>

                                            <h3> COUNTRY : United Kingdom</h3>

                                            <p> ViewCount : <?php echo $viewcount ?> </p>

                                        </div>

                                    </div>

                                    <div class = "Info-SRow">

                                        <div class="SRow-Location">

                                            <h2> Location </h2>
                                            
                                            <iframe src="<?php echo $Map ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> <br>
                                        
                                        </div>

                                        <div class="SRow-Context">

                                            <h2> Description </h2>
                                            
                                            <legend> <?php echo $desc ?> </legend>

                                            

                                            <div class="More">
                                            
                                                <a href="Booking.php?PID=<?php echo $PID ?>">See More</a>

                                            </div>

                                        </div>

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
                            <p>Local</p>
                            <p id="now">Information</p>
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