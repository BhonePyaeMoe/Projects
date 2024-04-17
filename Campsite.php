<?php

include('connection.php');
session_start();


if (!isset($_SESSION['AID'])) 
{
    echo "<script>window.alert('Login Please')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}

if (isset($_GET['CID'])) 
{
    $PTID = $_GET['CID'];

    $delete = "DELETE From campsite where CampsiteID = '$CID'";

    $Result1 = mysqli_query($connect,$delete);

}

if (isset($_POST['btnsubmit'])) 
    {
        $name = $_POST['txtname'];
        $location = $_POST['txtlocation'];

        $checkcampsite = "SELECT * From campsite where 'Campsitename' = '$name'";

            $Result = mysqli_query($connect,$checkcampsite);
            $rowcount = mysqli_num_rows($Result);

            if ($rowcount > 0)
            {
                echo "<script>window.alert('This Campsite is already registered')</script>";    
                echo "<script>window.location = 'Campsite.php'</script>";
            }
            else 
            {
                $insert = "INSERT INTO campsite(Campsitename,Location) VALUES ('$name','$location')";
                $Result = mysqli_query($connect,$insert);

                if ($Result) 
                {
                    echo "<script>window.alert('Campsite Registration is successful')</script>"; 
                    echo "<script>window.location = 'Campsite.php'</script>";  
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
    <title>Camping</title>
</head>
<body>

    <header>
        <div class="Admin-Head">
            
            <ul>
                <li> <a href="AdminDashBoard.php">DashBoard</a> </li>
                <li> <a href="AdminBooking.php">Booking</a> </li> 
                <li> <a href="Pitch.php">Pitch</a> </li>     
                <li> <a href="PitchType.php">PitchType</a> </li>
                
            </ul>

        </div>
    </header>

    <div class="Box">
        <div class="CAMP-Pitch">
            <form action="Campsite.php" method="post">

            <h2>Campsite</h2>

            <label>Campsite Name</label>
            <input type="text" name="txtname" placeholder="Enter Campsite Name"  required> <br>

            <label>Location</label>
            <input type="text" name="txtlocation" placeholder="Enter Location"  required> <br> <br> <br>

            <input type="submit" name="btnsubmit" value="Submit">

            </form>
        </div>
    </div>

    <div class="Campsite-Table">
       
    <table>
        
        <h2>Campsite Info Listing</h2> <br>

<?php
            $SelectCamp = "SELECT * FROM campsite";
            $ret = mysqli_query($connect,$SelectCamp);
            $count = mysqli_num_rows($ret);

            if ($count == 0) 
            {
                echo "<p>Admin Data Not Found</p>";
            }
?>

        <table>
            <tr>
                <th>CampsiteID</th>
                <th>CampsiteName</th>
                <th>Location</th>
                <th>Management</th>
            </tr>

<?php
            for ($i=0; $i < $count ; $i++) 
            { 
                $row = mysqli_fetch_array($ret);

                $CampsiteID = $row['CampsiteID'];
                $Campsitename = $row['Campsitename'];
                $Location = $row['Location'];

                echo "<tr>";

                echo "<td>$CampsiteID</td>";
                echo "<td>$Campsitename</td>";
                echo "<td>$Location</td>";
                
                echo "<td>

                <a href='Campsite.php?CID='$CampsiteID'>Delete</a>
                
                </td>";
                

                echo "<tr>";
                
            }

           
?>


        </table>


    </table>

    </div>


</body>
</html>