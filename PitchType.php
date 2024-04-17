<?php

include('connection.php');
session_start();

if (!isset($_SESSION['AID'])) 
{
    echo "<script>window.alert('Login Please')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}
if (isset($_GET['PTID'])) 
{
    $PTID = $_GET['PTID'];

    $delete = "DELETE From pitchtype where PitchTypeID = '$PTID'";

    $Result1 = mysqli_query($connect,$delete);

}

if (isset($_POST['btnsubmit'])) 
{
    $name = $_POST['txtname'];

    $checkPitchType = "SELECT * From pitchtype where 'PitchTypeName' = '$name'";

        $Result = mysqli_query($connect,$checkPitchType);
        $rowcount = mysqli_num_rows($Result);

        if ($rowcount > 0)
        {
            echo "<script>window.alert('This PitchType is already registered')</script>";    
            echo "<script>window.location = 'PitchType.php'</script>";
        }
        else 
         {
             $insert = "INSERT INTO pitchtype(PitchTypeName) VALUES ('$name')";
             $Result = mysqli_query($connect,$insert);

            if ($Result) 
            {
                echo "<script>window.alert('PitchType Registration is successful')</script>"; 
                echo "<script>window.location = 'PitchType.php'</script>";  
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
                <li> <a href="AdminDashBoard.php">DashBoard</a> </li>
                <li> <a href="Contact.php">Contact</a> </li>
                <li> <a href="Campsite.php">Campsite</a> </li>
                <li> <a href="Pitch.php">Pitch</a> </li>              
            </ul>

        </div>
    </header>

    <div class="Box">
        <div class="CAMP-Pitch">
            <form action="PitchType.php" method="post">

            <h2>PitchType</h2>

            <label>PitchType Name</label>
            <input type="text" name="txtname" placeholder="Enter PitchType Name"  required> <br> <br> <br>

            <input type="submit" name="btnsubmit" value="Submit">

            </form>
        </div>
    </div>



    <div class="Campsite-Table">
       
        <table>
            
            <h2>PitchType Info Listing</h2> <br>

<?php
                $SelectPitchType = "SELECT * FROM pitchtype";
                $ret = mysqli_query($connect,$SelectPitchType);
                $count = mysqli_num_rows($ret);

                if ($count == 0) 
                {
                    echo "<p>PitchType Data Not Found</p>";
                }
?>

        <table>
            <tr>
                <th>PitchType ID</th>
                <th>PitchType Name</th>
                <th>Management</th>
            </tr>

<?php
            for ($i=0; $i < $count ; $i++) 
            { 
                $row = mysqli_fetch_array($ret);

                $PitchTypeID = $row['PitchTypeID'];
                $PitchTypeName = $row['PitchTypeName'];

                echo "<tr>";

                echo "<td>$PitchTypeID</td>";
                echo "<td>$PitchTypeName</td>";
                
                echo "<td>

                    <a href='PitchType.php?PTID=$PitchTypeID'>Delete</a>
                
                </td>"; 
                

                echo "<tr>";
                
            }
     
?>

        </table>

        </table>

    </div>





    
</body>
</html>