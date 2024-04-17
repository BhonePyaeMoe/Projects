<?php
session_start();

 $randomCode = rand(1000, 9999);

if (!isset($_SESSION['captcha_code'])) 
{
  $_SESSION['captcha_code'] = $randomCode;
}

 

if (isset($_POST['btnsubmit']))
 {
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
        echo "<script>window.location='Capcha.php'</script>";
    }
    // Clear the CAPTCHA code from the session
    unset($_SESSION['captcha_code']);
}



?>

<!-- Display the generated CAPTCHA code -->
<h2>CAPTCHA Code: <?php echo $randomCode; ?></h2>

<!-- HTML form to input CAPTCHA code -->
<form method="post" action="Capcha.php">
  <label for="captcha">Enter CAPTCHA code:</label>
  <input type="text" id="captcha" name="captcha" required>
  <input type="submit" value="Submit" name="btnsubmit">
</form>