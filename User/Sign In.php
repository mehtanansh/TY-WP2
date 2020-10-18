<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
body
{
background-image:url("BackFin2.jpg");
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-position: 50% 50%;
font-family: sans-serif;
color: yellow;
margin:0;
padding: 0;
}

label {
  margin-bottom: 10px;
  display: inline-block;
  font-weight: bold;
}

input[type=text]{
  margin-right: 20px;
  margin-bottom: 20px;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 2px;
  display: inline-block;
}

input[type=password] {
  margin-right: 20px;
  margin-bottom: 20px;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 2px;
  display: inline-block;
}
</style>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>
		Sign In
	</title>
</head>	
<body>
<?php

$EmailErr="";
$PasswErr="";
$Emails="";
$passwords1="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  
  if (empty($_POST["mail"])) {
    $EmailErr = "Email is required for contacting you";
  } 
  else
  {
    $Emails=test_input($_POST["mail"]);
  }
  

  if (empty($_POST["password"])) {
    $PasswErr = "Password Required in Correct Format";
  }
  else
  {
    $passwords1=test_input($_POST["password"]);
    $uppercase = preg_match('@[A-Z]@', $passwords1);
    $lowercase = preg_match('@[a-z]@', $passwords1);
    $number    = preg_match('@[0-9]@', $passwords1);
    $specialChars = preg_match('@[^\w]@', $passwords1);
    $lengths = strlen($passwords1) >= 8;
    if(!$uppercase or !$lowercase or !$number or !$specialChars or !$lengths){
      $PasswErr = "Password don't match the correct format or are not the same!";
    }
    else{
      $db = mysqli_connect('localhost','root','','carefull_db') or die('Error connecting to MySQL server.');
      $order = "SELECT Email FROM user WHERE Email='$Emails'";
      $result = mysqli_query($db,$order);
      $order2 = "SELECT Password FROM user WHERE Email='$Emails'";
      if (mysqli_num_rows($result) == 0)
      {
          $EmailErr="Email not Found!";
      }
      else
      {
        $result2 = mysqli_query($db,$order2);
        $row = mysqli_fetch_array($result2);
        if ($passwords1==$row['Password']){
          mysqli_close($db);
          header("Location: http://localhost/PHP%20College%20Medical%20website/Profile.php");
        }
        else{
          $PasswErr = "Password doesn't match!";
        }
      }

    }
  }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<center>
<div class="container" style="color: yellow;">
<form method="POST"  enctype="multipart/form-data" style="padding-top: 3vw;max-width: 600px;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<fieldset style="background: rgba(0,0,0,0.5);padding: 2vw;border-radius: 1vw;" class="form-group">
    <strong style="font-size: 22px;"> Sign In </strong>
      <div class="form-group col-md-8 mb-0">
        <label for="mail">E-mail </label>
        <input type="email" maxlength="25" class="form-control" id="mail" name="mail" required><br><span class="error" style="color:red;"><?php echo $EmailErr;?></span>
      </div>
      <small id="emailHelp" class="form-text" style="opacity: 0.6">Enter the registered Email.</small>
      
      <div class="form-group">
      <div  class="col-md-8">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" required name="password"><br> <span class="error" style="color:red;"><?php echo $PasswErr;?></span>
      </div>
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1" style="size:1vw;">Remember me</label>
      </div>
      <button type="submit" class="btn btn btn-outline-dark" style="color: #D7FF33;">Sign Up</button>
      <big class="form-text" style="opacity: 0.8;padding-top:2vw;">
        <a style="color: white;" href="Sign Up.php">
        <big>New User? Sign Up Here</big>
      </a></big>
  </fieldset>
  </form>
  </div>
</center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>