<?php

include('connection.php');
session_start();

if (!isset($_SESSION['AID'])) 
{
    echo "<script>window.alert('Login Please')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}

if (isset($_GET['PID'])) 
{
    $PTID = $_GET['PID'];

    $delete = "DELETE From campsite where PitchID = '$PID'";

    $Result1 = mysqli_query($connect,$delete);

}

if (isset($_POST['btnsubmit'])) 
{
   $Pname = $_POST['txtPName'];
   $Map = $_POST['txtMap'];
   $Fac1 = $_POST['Facility1'];
   $Fac2 = $_POST['Facility2'];
   $Fac3 = $_POST['Facility3'];
   $Loc1 = $_POST['Local1'];
   $Loc2 = $_POST['Local2'];
   $Loc3 = $_POST['Local3'];
   $Price = $_POST['txtprice'];
   $Des = $_POST['txtdes'];
   $Status = $_POST['rdostatus'];
   $campsite = $_POST['cbocampsite'];
   $pitchtype = $_POST['cbopitchtype'];

   

    $txtimage1 = $_FILES['Pitchimage1']['name'];
    $folder = "Image/";
    $filename1 = $folder."_".$txtimage1;

    $copy = copy($_FILES['Pitchimage1']['tmp_name'],$filename1);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }



    $txtimage2 = $_FILES['fileimage1']['name'];
    $folder = "Image/";
    $filename2 = $folder."_".$txtimage2;

    $copy = copy($_FILES['fileimage1']['tmp_name'],$filename2);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }



    $txtimage3 = $_FILES['fileimage2']['name'];
    $folder = "Image/";
    $filename3 = $folder."_".$txtimage3;

    $copy = copy($_FILES['fileimage2']['tmp_name'],$filename3);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }

    $txtimage4 = $_FILES['fileimage3']['name'];
    $folder = "Image/";
    $filename4 = $folder."_".$txtimage4;

    $copy = copy($_FILES['fileimage3']['tmp_name'],$filename4);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }


    //  Local Image   //

    $txtimage5 = $_FILES['localimage1']['name'];
    $folder = "Image/";
    $filename5 = $folder."_".$txtimage5;

    $copy = copy($_FILES['localimage1']['tmp_name'],$filename5);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }

    $txtimage6 = $_FILES['localimage2']['name'];
    $folder = "Image/";
    $filename6 = $folder."_".$txtimage6;

    $copy = copy($_FILES['localimage2']['tmp_name'],$filename6);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }

    $txtimage7 = $_FILES['localimage3']['name'];
    $folder = "Image/";
    $filename7 = $folder."_".$txtimage7;

    $copy = copy($_FILES['localimage3']['tmp_name'],$filename7);

    if (!$copy) 
    {
        echo "<p>Cannot upload Image</p>";
        exit();
    }


    $checkpackagename = "SELECT * FROM pitch WHERE PitchName = '$Pname' ";
    $result = mysqli_query($connect,$checkpackagename);

    $count = mysqli_num_rows($result);

    if ($count > 0) 
    {
        echo "<script>window.alert('This Pitch is already registered')</script>";    
        echo "<script>window.location = 'Pitch.php'</script>";
    }
    else    
    {
        $insert = "Insert INTO pitch(PitchName,PitchImg,Map,Facilitiesname1,Facilitiesname2,Facilitiesname3,Facilitiesimg1,Facilitiesimg2,Facilitiesimg3,Localname1,Localname2,Localname3,Localimg1,Localimg2,Localimg3,Price,Description,Status,CampsiteID,PitchTypeID,Viewcount) VALUES ( '$Pname','$filename1','$Map','$Fac1','$Fac2','$Fac3','$filename2','$filename3','$filename4','$Loc1','$Loc2','$Loc3','$filename5','$filename6','$filename7','$Price','$Des','$Status','$campsite','$pitchtype','0')";
        $query = mysqli_query($connect,$insert);

        if ($query) 
        {
            echo "<script>window.alert('Pitch Registration is Successful')</script>";
            echo "<script>window.location = 'Pitch.php'</script>";
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
                <li> <a href="Contact.php">Contact</a> </li>
                <li> <a href="PitchType.php">PitchType</a> </li>
                <li> <a href="Campsite.php">Campsite</a> </li>
                
            </ul>

        </div>
    </header>

    <div class="Box">
        
        <div class="Pitch-box">

        <form action="Pitch.php" method="POST" enctype="multipart/form-data">

                <h1>Pitch</h1>

                <label>Pitch Name</label> <br>
                <input type="text" name="txtPName" placeholder="Enter Pitch Name" required>

                <label>Pitch Image</label> <br>
                <input type="file" name="Pitchimage1" required> <br>

                <label>Map</label> <br>
                <input type="text" name="txtMap" required> <br>

                <label>First Facility</label> <br>
                <input type="text" name="Facility1" required> <br>

                <label>Second Facility</label> <br>
                <input type="text" name="Facility2" required> <br>

                <label>Third Facility</label> <br>
                <input type="text" name="Facility3" required> <br>

                <label>First Facility Image</label> <br>
                <input type="file" name="fileimage1" required> <br>

                <label>Second Facility Image</label> <br>
                <input type="file" name="fileimage2" required> <br>

                <label>Third Facility Image</label> <br>
                <input type="file" name="fileimage3" required> <br>

                <label>First LocalName</label> <br>
                <input type="text" name="Local1" required> <br>

                <label>Second LocalName</label> <br>
                <input type="text" name="Local2" required> <br>

                <label>Third LocalName</label> <br>
                <input type="text" name="Local3" required> <br>  

                <label>First Local Image</label> <br>
                <input type="file" name="localimage1" required> <br>

                <label>Second Local Image</label> <br>
                <input type="file" name="localimage2" required> <br>

                <label>Third Local Image</label> <br>
                <input type="file" name="localimage3" required> <br>

                <label>Price</label> <br>
                <input type="number" name="txtprice" placeholder="Enter Price" required>

                <label>Description</label> <br>
                <input type="text" name="txtdes" placeholder="Enter Description" required> <br>

                <label>Status</label>
                <input type="radio" name="rdostatus" value="Avaliable"> 
                <label> Avaliable </label> 
                <input type="radio" name="rdostatus" value="Unavaliable">
                <label> Unavaliable </label> <br> 


                <label>Choose Campsite</label>
                <select name="cbocampsite">
            <?php
                $select = "SELECT * FROM campsite";
                $run = mysqli_query($connect,$select);

                $count = mysqli_num_rows($run);

                for ($i=0; $i < $count ; $i++) 
                { 
                    $row = mysqli_fetch_array($run);

                    $CID = $row['CampsiteID'];
                    $CNAME = $row['Campsitename'];

                    echo "<option value ='$CID'>$CNAME</option>";
                }
            ?>
                </select> <br>



                <label>Choose PitchType</label>
                <select name="cbopitchtype">
            <?php
                $select = "SELECT * FROM pitchtype";
                $run = mysqli_query($connect,$select);

                $count = mysqli_num_rows($run);

                for ($i=0; $i < $count ; $i++) 
                { 
                    $row = mysqli_fetch_array($run);

                    $PID = $row['PitchTypeID'];
                    $PNAME = $row['PitchTypeName'];

                    echo "<option value ='$PID'>$PNAME</option>";
                }
            ?>
                </select> <br>

            
                <input type="submit" name="btnsubmit" value="Submit">
        
        </form>

        </div>
    </div>

    <div class="Campsite-Table">
       
        <table>
            
            <h2>Pitch Info Listing</h2> <br>

<?php
                $SelectPitch = "SELECT * FROM pitch";
                $ret = mysqli_query($connect,$SelectPitch);
                $count = mysqli_num_rows($ret);

                if ($count == 0) 
                {
                    echo "<p>Pitch Data Not Found</p>";
                }
?>

        <table>
            <tr>
                <th>PitchID</th>
                <th>PitchName</th>
                <th>Price</th>
                <th>Status</th>
                <th>CampsiteID</th>
                <th>PitchTypeID</th>
                <th>Management</th>
            </tr>

<?php
            for ($i=0; $i < $count ; $i++) 
            { 
                $row = mysqli_fetch_array($ret);

                $PitchID = $row['PitchID'];
                $PitchName = $row['PitchName'];
                $Price = $row['Price'];
                $Status = $row['Status'];
                $CampsiteID = $row['CampsiteID'];
                $PitchTypeID = $row['PitchtypeID'];

                echo "<tr>";

                echo "<td>$PitchID</td>";
                echo "<td>$PitchName</td>";
                echo "<td>$Price</td>";
                echo "<td>$Status</td>";
                echo "<td>$CampsiteID</td>";
                echo "<td>$PitchTypeID</td>";
                
                echo "<td>

                <a href='Pitch.php?PID=$PitchID'>Delete</a>
                
                </td>";
                

                echo "<tr>";
                
            }
     
?>

        </table>

        </table>

    </div>




</body>
</html>