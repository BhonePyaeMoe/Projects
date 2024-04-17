<?php

session_start();

//after 3 tries, kept entering wrong, Pause account login for 10 mins and try again.

//sent back to login after.

?>

<!DOCTYPE html>

<html>

<head>

<title>Login Timer</title>

<link rel="stylesheet" href="FinalCSS.css">

</head>

 

<body class="Black-Bg">

<div id="Timer"></div><h1> Please wait for few minutes until the timer ends. <h1> <br>

<script>

    var now = new Date().getTime();

    var ResetTime = new Date(now + 10 * 60 * 1000).getTime(); // Adding 10 minutes in milliseconds

 

    var x = setInterval(function () {

        var now = new Date().getTime();

        var distance = ResetTime - now;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

 

        document.getElementById("Timer").innerHTML = "<h1 class='White-text'>Please try again after:</h1>" + "<br> <br>" + "<h1 class='Yellow-text'>" + minutes + "m " + seconds + "s </h1>";

 

        if (distance <= 0) {

            clearInterval(x);

            document.getElementById("Timer").innerHTML = "";

            location = "CustomerLogin.php";

        }

    }, 1000);

</script>

 

</body>

</html>