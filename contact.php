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

        $CID = $_SESSION['CID'];
        
        $check = "SELECT * From customer Where CustomerID = $CID";

        $query = mysqli_query($connect,$check);
        $data = mysqli_fetch_array($query);

        $CFName = $data['FirstName'];
        $CLName = $data['LastName'];
        $Email = $data['Email'];
        $Phonenumber = $data['PhoneNumber'];

        $CName = "$CFName $CLName";
    }

    if (isset($_POST['btnRegister'])) 
    {

        $Message = $_POST['txtCMessage'];


        $insert = "INSERT INTO contact(CustomerID,Phonenumber,EmailAddress,Message)VALUES('$CID','$Phonenumber','$Email','$Message')";
        $finalresult = mysqli_query($connect,$insert);

        if ($finalresult) 
        {
            echo "<scrpit>window.alert('Registration is Successful')</scrpit>";
            echo "<script>window.location = 'contact.php'</script>";
        }
        else
        {
            echo "<scrpit>window.alert('Something went wrong')</scrpit>";
        }
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

                <i class='fas fa-bars'></i>
                
            </div>  

        </div>

        </header>

    <div class="Contact-main">

        <div class="Contact-block">

            <div class="Contact-1">

                <img src="Image/Contact.jpg">

                <div class="FL-contact">

                    <div class="FL-1">

                        <i class="fa-solid fa-envelope"></i>
                        <p>GWCamping@gmail.com </p>

                    </div>

                    <div class="FL-1">

                        <i class="fa-solid fa-phone"></i>
                        <p> +44 563891005 </p>

                    </div>

                    <div class="FL-1">

                        <i class="fa-solid fa-location-dot"></i>
                        <p> North Warnborough, United Kingdom </p>

                    </div>

                </div>
            </div>

            <div class="Contact-2">

                <div class="Contact-form">

                    <h1> Contact Us </h1> <br> <br> <br>

                    <form action="contact.php" method="POST" enctype="multipart/form-data">                

                    <label>Customer Name</label>
                    <input type="text" name="txtCName" value="<?php echo $CName ?>" readonly> <br>

                    <label>Email</label>
                        <input type="email" name="txtCEmail" value="<?php echo $Email ?>" readonly> <br>

                    <label>Phonenumber</label>
                    <input type="text" name="txtCPhone" value="<?php echo $Phonenumber ?>" readonly> <br>

                    <label>Your Message:</label>
                    <textarea name="txtCMessage" required></textarea>

                    <input type="submit" id="btnRegister" name="btnRegister" value="Register">

                </form>

                </div>
                
            </div>

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
                            <p id="now">Contact</p>
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