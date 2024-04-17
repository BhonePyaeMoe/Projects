<?php

session_start();

include('connection.php');

if (isset($_POST['btnsubmit'])) 
{
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $check = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password' "; 

    $query = mysqli_query($connect,$check);

    $count = mysqli_num_rows($query);

    if ($count > 0) 
    {
        $data = mysqli_fetch_array($query);
        $aid = $data['AdminID'];
        $aname = $data['AdminName'];
        $aemail = $data['Email'];
        $aprofile = $data['AdminProfile'];
        $age = $data['Age'];

            $_SESSION['AID'] = $aid;    
            $_SESSION['ANAME'] = $aname;
            $_SESSION['AEMAIL'] = $email;
            $_SESSION['AProfile'] = $aprofile;
            $_SESSION['AAGE'] = $age;

        

        echo "<script>window.alert('Admin Login Successfully')</script>";
        echo "<script>window.location = 'AdminDashboard.php'</script>";
    }
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
<body class="test">

    <header>
        <div class="Admin-Head">
            
            <ul>
                <li> <a href="AdminRegister.php">Register</a> </li>                      
            </ul>

        </div>
    </header>

    <div class="Alogin">

        <div class="Aloginform">

            <h1> Login </h1> <br> <br> <br>

            <form action="AdminLogin.php" method="POST">
   
                <label> <i class="fa-solid fa-envelope"></i> Email :</label>
                <input type="email" name="txtemail" placeholder="Enter Your Email" required>
             
                <label> <i class="fa-solid fa-key"></i> Password :</label> 
                <input type="password" name="txtpassword" placeholder="Enter Your Password" required>

                <div class="ALogin-last">

                    <label>Don't have an account? <br> <br> <a href="AdminRegister.php"> Register </a> </label>
                    <input type="submit" name="btnsubmit" value="Log in"> 

                </div>

            </form>
                

        </div>

    </div>

    <footer>
    </footer>


</body>
</html>
