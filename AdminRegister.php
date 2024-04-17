<?php

include('connection.php');
session_start();

if (isset($_POST['btnsubmit'])) 
{
    if (!isset($_POST['cbbox'])) 
    {
        echo "<script>window.alert('Please Check Terms and Conditions First')</script>"; 
    }
    else 
    {

        $AName = $_POST['txtname'];
        $AEmail = $_POST['txtemail'];
        $APassword = $_POST['txtpassword'];
        $APhone = $_POST['txtphone'];
        $AAddress = $_POST['txtaddress'];
        $AAge = $_POST['txtage'];


        $txtimage = $_FILES['AdminProfile']['name'];
        $folder = "Image/";
        $Profile = $folder."_".$txtimage;

        $copy = copy($_FILES['AdminProfile']['tmp_name'],$Profile);   

        if (!$copy) 
        {
            echo "<p>Cannot upload Image</p>";
            exit();
        }



        $checkEmail = "SELECT * From admin Where Email = '$AEmail'";

        $Result = mysqli_query($connect,$checkEmail);
        $rowcount = mysqli_num_rows($Result);

        if ($rowcount > 0)
        {
            echo "<script>window.alert('This Email is already registered')</script>";    
            echo "<script>window.location = 'AdminRegister.php'</script>";
        }
        else 
         {
             $insert = "INSERT INTO admin(AdminName,AdminProfile,Email,Password,PhoneNumber,Age,Address) VALUES ('$AName','$Profile','$AEmail','$APassword','$APhone','$AAge','$AAddress')";
             $Result = mysqli_query($connect,$insert);

            if ($Result) 
            {
                echo "<scrpit>window.alert('Admin Registration is successful')</scrpit>"; 
                echo "<script>window.location = 'AdminLogin.php'</script>";  
            }
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
    <header>
        <div class="Admin-Head">
            
            <ul>
                <li> <a href="AdminLogin.php">Login</a> </li>           
            </ul>

        </div>
    </header>
  
    
    <div class="Aregister">
      
        <div class="Aregisterform">

            <h2>Register</h2>

            <form action="AdminRegister.php" method="POST" enctype="multipart/form-data">

                <div class="Aregister-File">

                    
                    <label> <i class="fa-regular fa-user"> </i> Profile Photo</label>

                    <div class="Aregister-block">

                        <input type="file" name="AdminProfile">                       
                        
                    </div>

                </div>

                <div class="Aregister-row">
                    
                    <div class="Aregister-block">

                        <i class="fa-solid fa-tag"></i>
                        <label>Name :</label>  <br>
                        <input type="text" name="txtname" placeholder="Enter Your Name" required> <br> <br>

                    </div>

                    <div class="Aregister-block">

                        <i class="fa-solid fa-envelope"></i> 
                        <label>Email Address :</label>  <br>
                        <input type="email" name="txtemail" placeholder="Enter Your Email" required> <br> <br> 

                    </div>

                </div>

                <div class="Aregister-row">

                    <div class="Aregister-block">

                        <i class="fa-solid fa-key"></i>                       
                        <label>Password :</label>  <br>
                        <input type="password" name="txtpassword" placeholder="Enter Your Password" required> <br> <br> 
                    
                    </div>

                    <div class="Aregister-block">    

                        <i class="fa-solid fa-phone"></i>
                        <label>PhoneNumber :</label>  <br>
                        <input type="text" name="txtphone" placeholder="Enter Your Phone Number" required> <br> <br> 

                    </div>

                </div>

                <div class="Aregister-row">

                    <div class="Aregister-block">

                        <i class="fa-solid fa-user"></i>
                        <label>Age :</label>  <br>
                        <input type="text" name="txtage" placeholder="Enter Your Age" min="15" max="60" required> <br> <br>

                    </div>

                    <div class="Aregister-block">

                        <i class="fa-solid fa-address-book"></i>
                        <label>Address :</label> <br>
                        <input type="text" name="txtaddress" placeholder="Enter Your Address" required></input> <br> <br> 

                    </div>

                </div>

                    <div class="Aregister-check">

                        <input type="checkbox" name="cbbox" required> 
                        <label>I agree Terms and Conditions</label> <br> <br> <br>

                        <label>Already Have An Account?</label>
                        <a href="AdminLogin.php">Login</a> <br> <br>

                        <input type="submit" name="btnsubmit" value="Register">

                    </div>
            
            </form>

        </div>

    </div>

    <footer>


    </footer>
    
    <script src="script.js"></script>

</body>
</html>