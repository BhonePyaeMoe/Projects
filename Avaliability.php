<?php

session_start();
include('connection.php');

if (!isset($_SESSION['CID'])) 
{
    echo "<script>window.alert('Customer Login Please')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Camping</title>
</head>
<body>
    
    <header>

        <div class="Most-Head">

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
                <i class="fas fa-bars"></i>
            </div>  

        </div>

        </header>


    <div class="Ava">

        <form action="Avaliability.php" method="POST">

        <div class="Ava-Text">

            <h1> Search All The Pitches </h1>

        </div>

        <div class="Search">

            <input type="text" name="txtSearch" placeholder="Search Here..." class="search-input">

            <button type="submit" class="search-submit" name="btnSearch"> <i class="fa-solid fa-magnifying-glass"> </i> </button>

        </div>

        <div class="Ava-main">

        <?php




            if (isset($_POST['btnSearch'])) 
            {   
                $PitchName = $_POST['txtSearch'];
                $query = "SELECT * FROM Pitch WHERE Status = 'Avaliable' AND PitchName LIKE '%$PitchName%'";

                $result = mysqli_query($connect,$query);
                $count = mysqli_num_rows($result);
                
                if ($count > 0) 
                {

                    for ($i=0; $i < $count ; $i+=3) 
                    { 
                        $query1 = "SELECT * FROM Pitch WHERE Status = 'Avaliable' AND PitchName LIKE '%$PitchName%' LIMIT $i,3";
                        $result1 = mysqli_query($connect,$query1);
                        $count1 = mysqli_num_rows($result1);

                        echo "<div class='Ava-container'>";
                    
                    for ($j=0; $j < $count1 ; $j++) 
                    { 
                        $data = mysqli_fetch_array($result1);

                        echo "<div class='Ava-box'>";
                        
                            echo "<img src=' ".$data['PitchImg']."'>";

                            echo "<h1>".$data['PitchName']."</h1>";

                            echo "<div class='Ava-Info'>";

                                echo "<p> <b> Price : </b>  ".$data['Price']."</p>  </br>";

                                echo "<p> <b> Description : </b> ".$data['Description']." </p> </br>";

                                echo "<p> <b> Status : </b>  ".$data['Status']."</p>  </br>";


                            echo "</div>";

                            echo "<a href='Booking.php?PID=".$data['PitchID']."'> See More</a>";

                        echo "</div>";

                    }

                    }

                    echo "</div>";
                }
                else 
                {
                    echo "<h1><u>Searched Available Pitch is not found</u></h1>";
                }
                
            }

            else
             
            {
                // echo "<h1><u>Search Data didn't Match</u></h1>";
            }


        ?>

        </div>

    </div>



    </form>

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
                            <p>Information</p>
                            <p id="now">Avaliability</p>
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