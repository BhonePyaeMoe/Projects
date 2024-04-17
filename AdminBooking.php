<?php

include('connection.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <header>
        <div class="Admin-Head">
            
            <ul>
                <li> <a href="AdminDashBoard.php">DashBoard</a> </li>
                <li> <a href="AdminBooking.php">Booking</a> </li>              
            </ul>

        </div>
    </header>

    <div class="Check-Booking">

            <div class="Check-Book">

                <h1>List of Booking</h1>

            </div>

            <table>
<?php
                $Select = "SELECT * FROM booking b,customer c,pitch p WHERE b.CustomerID = c.CustomerID AND b.PitchID = p.PitchID";
                $ret = mysqli_query($connect,$Select);
                $count = mysqli_num_rows($ret);

                if ($count == 0) 
                {
                    echo "<p>Admin Data Not Found</p>";
                }
?>
                <table>
                    <tr>
                        <th>BookingID</th>
                        <th>CustomerName</th>
                        <th>BookingDate</th>
                        <th>PitchName</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>TotalCost</th>

                    </tr>
<?php
                    for ($i=0; $i < $count ; $i++) 
                    { 
                        $row = mysqli_fetch_array($ret);

                        $BID = $row['BookingID'];
                        $BName = $row['Date'];
                        $BQuantity = $row['Quantity'];
                        $Price = $row['Price'];
                        $PName = $row['PitchName'];
                        $Total = $row['TotalCost'];
                        
                        $CFName = $row['FirstName'];
                        $CLName = $row['LastName'];
                        $CName = "$CFName $CLName";

                        echo "<tr>";

                        echo "<td>$BID</td>";
                        echo "<td>$CName</td>";
                        echo "<td>$BName</td>";
                        echo "<td>$PName</td>";
                        echo "<td>$BQuantity</td>";
                        echo "<td>$Price</td>";
                        echo "<td>$Total</td>";


                        echo "<tr>";                     
                    }        
?>
                </table>
            </table>
        </div>

</body>
</html>