<?php

session_start();
include('connection.php');

if (isset($_POST['btnsubmit'])) 
{
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $check = "SELECT * FROM customer WHERE Email = '$email' AND Password = '$password' "; 

    $query = mysqli_query($connect,$check);

    $count = mysqli_num_rows($query);


    if ($count > 0)
    {

        $update = "UPDATE customer set viewcount=viewcount+1 where Email = '$email'";
        mysqli_query($connect,$update);

        $data = mysqli_fetch_array($query);
        $cid = $data['CustomerID'];
        $cname = $data['CustomerName'];
        $aemail = $data['Email'];
        $profile = $data['Profile'];

            $_SESSION['CID'] = $cid;    
            $_SESSION['CNAME'] = $cname;
            $_SESSION['CEMAIL'] = $email;
            $_SESSION['CProfile'] = $profile;

        

        echo "<script>window.alert('Customer Login Successfully')</script>";
        echo "<script>window.location = 'home.php'</script>";
    }
    else
    {
        $logincount = 0;

        for ($i=0; $i < 4; $i++) 
        { 
            $logincount = $logincount + 1;

            echo "<script>window.alert('Please Try Again.    Attempt : $logincount')</script>";
            echo "<script>window.location = 'CustomerLogin.php'</script>";

            if($logincount > 3)
            {
                echo "<script>window.alert('No More Attempts left')</script>";
                echo "<script>window.location = 'LoginTimer.php'</script>";
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
    <script src="script.js"></script>
    <title>Camping</title>
</head>
<body class="Login-wall">

    <header>
            
        <div class="navbar">
                <ul class="nav-list">
                    <li> <a href="CustomerRegister.php">Register</a> </li>
                    <li> <a href="Home.php">Home</a> </li>
                </ul>
            </div>
            
            <div class="icon" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div> 

        </div>
    </header>

    <div class="CLogin">

        <div class="CLoginform">

            <h1> Login </h1> <br> <br> <br>

            <form action="CustomerLogin.php" method="POST">

                <i class="fa-solid fa-envelope"></i>
                <label>Email</label>
                <input type="email" name="txtemail" placeholder="Enter Your Email" required> <br> <br>

                <i class="fa-solid fa-key"></i>
                <label>Password</label> <br> 
                <input type="password" name="txtpassword" placeholder="Enter Your Password" required> <br> <br> <br>
                

                <input type="submit" name="btnsubmit" value="Log in">

                <p>Not a member?</p> <a href="CustomerRegister.php">Sign Up</a>
            
            </form>
                

        </div>

    </div>

    <footer>
    </footer>


</body>
</html>