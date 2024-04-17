<?php

include('connection.php');
session_start();

$randomCode = rand(1000, 9999);

if (!isset($_SESSION['captcha_code'])) 
{
  $_SESSION['captcha_code'] = $randomCode;
}

    if (isset($_POST['btnRegister'])) 
    {
        $Firstname = $_POST['txtFName'];
        $Lastname = $_POST['txtLName'];
        $Email = $_POST['txtCEmail'];
        $Password= $_POST['txtCPassword'];
        $Phonenumber = $_POST['txtCPhone'];
        $Gender = $_POST['rdoGender'];

        $txtimage = $_FILES['Profile']['name'];
        $folder = "Image/";
        $filename = $folder."_".$txtimage;

        $copy = copy($_FILES['Profile']['tmp_name'],$filename);   

        if (!$copy) 
        {
            echo "<p>Cannot upload Image</p>";
            exit();
        }

        $userInput = $_POST['captcha'];
        $actualCode = $_SESSION['captcha_code'];
        
        if ($userInput == $actualCode) 
        {
            echo "<script>window.alert('Success')</script>";
            echo "<script>window.location='Home.php'</script>";
    
        } 

        else
        {
            echo "<script>window.alert('You are robot')</script>";
            echo "<script>window.location='CustomerRegister.php'</script>";
        }
      
        // Clear the CAPTCHA code from the session
        unset($_SESSION['captcha_code']);


        $checkEmail = "SELECT * From customer WHERE Email = '$Email'";

        $Result = mysqli_query($connect,$checkEmail);
        $count = mysqli_num_rows($Result);

        if ($count > 0) 
        {
            echo "<script>window.alert('This Email Address is already registered')</script>";
            echo "<script>window.location = 'Customer_Register.php'</script>";
        }
        else 
        {
            $insert = "Insert INTO customer(Firstname,Lastname,Profile,Email,Password,Phonenumber,Gender,Viewcount) VALUES ( '$Firstname','$Lastname','$filename','$Email','$Password','$Phonenumber','$Gender','1')";
            $finalresult = mysqli_query($connect,$insert);

            if ($finalresult) 
            {
                echo "<scrpit>window.alert('Registration is Successful')</scrpit>";
                echo "<script>window.location = 'CustomerRegister.php'</script>";
            }
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

    <section class="Register-wall">

        <header>
            <div class="navbar">
                <ul class="nav-list">   
                    <li> <a href="CustomerLogin.php">Login</a> </li>
                    <li> <a href="Home.php">Home</a> </li>
                </ul>
            </div>
            
            <div class="icon" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div> 

        </header>


        <div class="Cregister">

            <div class="Cregisterform">

                <h1> Register </h1> <br> <br>

                <form action="CustomerRegister.php" method="POST" enctype="multipart/form-data">

                <label>First Name</label> 
                <input type="text" name="txtFName" placeholder="Enter Your First Name" required> <br>

                <label>Last Name</label>
                <input type="text" name="txtLName" placeholder="Enter Your Last Name" required> <br>

                <label>Profile Picture</label> <br>
                <input type="file" name="Profile" required> <br>                   

                <label>Email</label>
                <input type="email" name="txtCEmail" placeholder="Enter Your Email Address" required> <br>

                <label>Password</label>
                <input type="password" name="txtCPassword" placeholder="Enter Your Password" required> <br>

                <label>Phonenumber</label>
                <input type="text" name="txtCPhone" placeholder="Enter Your Phone Number" required> <br>

                <label>Gender</label> <br>
                <input type="radio" name="rdoGender" value="M"> 
                <label> Male </label> 
                <input type="radio" name="rdoGender" value="F">
                <label> Female </label> <br> <br>

                <label>Here Your CAPTCHA code:</label>
                <h2> <?php echo $randomCode; ?> </h2>

                <label for="captcha">Enter CAPTCHA code :</label>
                <input type="text" id="captcha" name="captcha" required> <br> <br>


                <input type="checkbox" name="cbverify" required> <label> I agree to your <a href=""> terms and policy </a> </label> 

                <input type="submit" name="btnRegister" value="Register">

            </form>

            </div>
        </div>

    </section>    

    <script src="script.js"></script>

</body>
</html>