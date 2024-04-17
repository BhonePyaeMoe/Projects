<?php

include('connection.php');

session_start();

if (!isset($_SESSION['AID'])) 
{
    echo "<script>window.alert('Login Please')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}
else
{ 
    $AID = $_SESSION['AID'];
    $AName = $_SESSION['ANAME'];
    $AEmail = $_SESSION['AEMAIL'];
    $AAge = $_SESSION['AAGE'];
    
    $check = "SELECT AdminProfile From admin Where AdminID = $AID";

    $query = mysqli_query($connect,$check);
    $data = mysqli_fetch_array($query);

    $AProfile = $data['AdminProfile'];



    $PitchType = "SELECT * FROM PitchType";

    $Result1 = mysqli_query($connect,$PitchType);
    $PitchTypecount = mysqli_num_rows($Result1);



    $Campsite = "SELECT * FROM campsite";

    $Result2 = mysqli_query($connect,$Campsite);
    $Campsitecount = mysqli_num_rows($Result2);


    $Pitch = "SELECT * FROM pitch";

    $Result3 = mysqli_query($connect,$Pitch);
    $Pitchcount = mysqli_num_rows($Result3);



    $CustomerCount  = "SELECT SUM(Viewcount) From customer";
    $Result4 = mysqli_query($connect,$CustomerCount);

    $Cus = mysqli_fetch_row($Result4);

    $CusCount = array_sum($Cus);



    $Rating  = "SELECT AVG(Rating) From review";
    $Result6 = mysqli_query($connect,$Rating);

    $Rate = mysqli_fetch_row($Result6);

    $AVGRATE = array_sum($Rate) / count($Rate);



    $Booking = "SELECT * FROM booking";

    $Result5 = mysqli_query($connect,$Booking);
    $BookingCount = mysqli_num_rows($Result5);

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
        <div class="Admin-Head">
            
            <ul>
                <li> <a href="AdminDashBoard.php">DashBoard</a> </li>     
                <li> <a href="AdminBooking.php">Booking</a> </li>    
                <li> <a href="AdminLogin.php">Login</a> </li>
                <li> <a href="AdminRegister.php">Register</a> </li>       
            </ul>

        </div>
    </header>


    <div class="Dash">


        <div class="nManage">

            <div class="Manage-List">

                <div class="AMan">

                    <img src="Image/Icon1.png">

                    <p> <?php echo $CusCount ?> </p>

                    <legend> Total Visit </legend>

                </div>
                    
                <div class="AMan">

                    <img src="Image/Icon2.png">

                    <p> <?php echo $AVGRATE ?> Out of 5</p>

                    <legend> Average Rating </legend>

                </div>
                    
                <div class="AMan">

                    <img src="Image/Icon3.png">

                    <p> <?php echo $BookingCount ?> </p>

                    <legend> Total Booking </legend>

                </div>

            </div>

        </div>

        <div class="AProfile-box">    

            <img src="<?php echo $AProfile ?>" frameborder="0"></img>

            <p> Name : <?php echo $AName ?> </p>

            <p> <?php echo $AEmail ?> </p>

            <span class="AP-Dot"></span> <b>Online</b>

        </div>      

    </div>      

        
    <div class="Dash">

        <div class="Admin-Table">

            <table>

<?php
                $Select = "SELECT * FROM admin";
                $ret = mysqli_query($connect,$Select);
                $count = mysqli_num_rows($ret);

                if ($count == 0) 
                {
                    echo "<p>Admin Data Not Found</p>";
                }
?>

                <table>
                    <tr>
                        <th>AdminID</th>
                        <th>AdminName</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                        <th>Address</th>
                    </tr>

<?php
                    for ($i=0; $i < $count ; $i++) 
                    { 
                        $row = mysqli_fetch_array($ret);

                        $AID = $row['AdminID'];
                        $AName = $row['AdminName'];
                        $AEmail = $row['Email'];
                        $APhone = $row['PhoneNumber'];
                        $AAddress = $row['Address'];

                        echo "<tr>";

                        echo "<td>$AID</td>";
                        echo "<td>$AName</td>";
                        echo "<td>$AEmail</td>";
                        echo "<td>$APhone</td>";
                        echo "<td>$AAddress</td>";

                        echo "<tr>";
                        
                    }

            
?>


                </table>


            </table>

        </div>

        <div class="Management-box">    

            <table>
                <tr>
                    <th>Management</th>
                </tr>

                <tr>
                     <td><a href="Campsite.php">Campsite</a></td>
                </tr>

                <tr>
                    <td><a href="PitchType.php">PitchType</a></td>
                </tr>

                <tr>
                    <td><a href="Pitch.php">Pitch</a></td>
                </tr>

            </table>

        </div> 

    </div>

</body>
</html>