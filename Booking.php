<?php

session_start();
include('connection.php');

if (isset($_SESSION['CID'])) 
{
    $CID = $_SESSION['CID'];
}

if (isset($_GET['PID'])) 
{
    $PID = $_GET['PID'];
    $query =  "SELECT p.*,pt.*,c.* FROM Pitch p, PitchType pt, Campsite c WHERE p.PitchTypeID = pt.PitchTypeID AND p.CampsiteID = c.CampsiteID AND p.PitchID = '$PID' " ;
    $query2 = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($query2);

    $PName = $data['PitchName'];
    $PPhoto = $data['PitchImg'];
    $map = $data['Map'];
    $Price = $data['Price'];
    $Campsite = $data['Campsitename'];
    $PitchType = $data['PitchTypeName'];
    $facilityname1 = $data['Facilitiesname1'];
    $facilityname2 = $data['Facilitiesname2'];
    $facilityname3 = $data['Facilitiesname3'];
    $facility1 = $data['Facilitiesimg1'];
    $facility2 = $data['Facilitiesimg2'];
    $facility3 = $data['Facilitiesimg3'];
    $local1 = $data['Localimg1'];
    $local2 = $data['Localimg2'];
    $local3 = $data['Localimg3'];
    $localname1 = $data['Localname1'];
    $localname2 = $data['Localname2'];
    $localname3 = $data['Localname3'];
    $Status = $data['Status'];
    $des = $data['Description'];
    $Location = $data['Location'];


    $update = "UPDATE pitch set viewcount = viewcount+1 where PitchID = '$PID' ";
    $update = mysqli_query($connect,$update);    

    $book = "SELECT * From booking WHERE PitchID = '$PID'";
    $Result2 = mysqli_query($connect,$book);
    $BookingCount = mysqli_num_rows($Result2);
}
else 
{
    echo "<p>This Pitch Data is not found</p>";
}

if (isset($_POST['btnBook']))
{
    $Date = $_POST['txtDate'];

    $parts = explode('/', $Date);
    if (count($parts) === 3) 
    {
        $yyyy = $parts[2];
        $mm = $parts[1];
        $dd = $parts[0];
        return $yyyy . '/' . $mm . '/' . $dd;
    }

    $Quantity = $_POST['quantity'];

    $multiple = $Price * $Quantity;

    $Tax = $multiple/10;

    $total = $multiple - $Tax;


    $insert = "INSERT INTO booking(Date,Quantity,Tax,TotalCost,PitchID,CustomerID)VALUES('$Date','$Quantity','$Tax','$total','$PID','$CID')";
    $result = mysqli_query($connect,$insert);

    echo "<script>window.alert('Tax Amount = $Tax AND Total Cost = $total')</script> ";

    
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

    <div class="Booking-Main">

        <img src=" <?php echo $PPhoto ?> ">
    
    </div>

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
                    <li> <a href="Avaliability.php">Avaliability</a> </li>
                    <li> <a href="Information.php">Information</a> </li>
                </ul>
            </div>      

            <div class="icon" onclick="toggleMenu()">

                <i class='fas fa-bars'></i>
                    
            </div>               

        </header>



    <div class="Booking-context">

        <h1>Overview</h1>

        <div class="Booking-flex">

            <div class="book-Info">

                <div class="booking-org">

                    <div class="booking-topic1">

                        <legend> <?php echo $PName ?> </legend>

                        <div class="bk-main">

                            <div class="bk-1">

                                <p> <i class="fa-solid fa-star"></i>   Campsite Name : <?php echo $Campsite ?> </p> 
                                <p> <i class="fa-solid fa-star"></i>   PitchType : <?php echo $PitchType ?> </p> 
                                <p> <i class="fa-solid fa-star"></i>   Status : <?php echo $Status ?> </p> 

                            </div>

                            <div class="bk-1">

                                <p> <i class="fa-solid fa-star"></i>   Location : <?php echo $Location ?></p> 
                                <p> <i class="fa-solid fa-star"></i>   Booking Count : <?php echo $BookingCount ?> </p> 
                                <p> <i class="fa-solid fa-star"></i>   Price : $<?php echo $Price ?> per day </p>

                            </div>

                        </div>

                            <div class="book-des">

                            <b> Description </b>
                            <p> <?php echo $des ?> </p>

                            </div>


                    </div>

                    <div class="booking-topic2">

                        <iframe src="<?php echo $map ?>"></iframe>

                    </div>

                </div>

                    <div class="De-Info">

                        <h2> <i class="fa-solid fa-bookmark"> </i> Features <i class="fa-solid fa-bookmark"> </i> </h2> <br>

                        <div class="De-Info2">

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-1"></i>. <?php echo $facilityname1 ?> </p> <br>
                                <img src="<?php echo $facility1 ?>">
                        
                            </div>

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-2"></i>. <?php echo $facilityname2 ?> </p> <br>
                                <img src="<?php echo $facility2 ?>">

                            </div>

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-3"></i>. <?php echo $facilityname3 ?> </p> <br>
                                <img src="<?php echo $facility3 ?>">

                            </div>

                        </div>

                    </div>
                        

                    <div class="De-Info">

                        <h2> <i class="fa-solid fa-tag"> </i> Local Attractions <i class="fa-solid fa-tag"> </i> </h2> <br>

                        <div class="De-Info2">

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-1"></i>. <?php echo $localname1 ?> </p> <br>
                                <img src="<?php echo $local1 ?>">

                            </div>

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-2"></i>. <?php echo $localname2 ?> </p> <br>
                                <img src="<?php echo $local2 ?>">

                            </div>

                            <div class="De-Dis">

                                <p> <i class="fa-solid fa-3"></i>. <?php echo $localname3 ?> </p> <br>
                                <img src="<?php echo $local3 ?>">

                            </div>

                        </div>
                    
                    </div>

            </div>
     
        </div>

    </div>        

        
            

            <form action="Booking.php?PID=<?php echo $PID ?>" method="POST">

            

            <div class="Booking-action">

                <div class="Booking-date">

                    <label>Booking Date : </label>
                    <input type="date" name="txtDate">

                </div>
                
                    <form class="quantity-selector" action="Booking.php?PID=<?php echo $PID ?>" method="POST">

                        <label for="quantity" class="quantity-label">Quantity:</label>

                        <button type="button" class="quantity-button" onclick="decreaseQuantity()">-</button>

                        <input type="text" id="quantity" class="quantity-input" name="quantity" value="1">
                        
                        <button type="button" class="quantity-button" onclick="increaseQuantity()">+</button>

                    </form>

                <div class="Booking-cal">

                    <label>Tax : </label>
                    <input type="text" name="Tax" value="<?php if (isset($Tax)) echo $Tax; ?>"readonly>

                </div>

                <div class="Booking-cal">

                    <label> Total Cost : </label>
                    <input type="text" name="TotalCost" value=" <?php if (isset($total)) echo $total; ?>" readonly>

                </div>

                <div class="book-btn">

                    <input type="submit" name="btnBook" value="Book Now">

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
                <p>Avaliability</p>
                <p>Booking</p>

            </div>

        </div>

    </div>

    <div class="footer1-2">

        <h1>Need Help?</h1>

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