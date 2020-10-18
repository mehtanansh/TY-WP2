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
		Sign Up
	</title>
</head>	
<body>
<?php

$AgeErr = "";
$GenderErr = "";
$NameErr="";
$SurnameErr="";
$PhoneErr="";
$EmailErr="";
$UsrErr="";
$PasswErr="";
$PCErr="";
$Number_match="/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/";
$Matcher="/^[A-Za-z]{2,15}$/";
$x1="";
$x2="";
$Emails="";
$Ages="";
$users="";
$Phone="";
$Addrs="";
$Pinc="";
$AddrErr="";
$passwords1="";
$passwords2="";
$FilesErr1="";
$FilesErr2="";
$FilesErr3="";
$FilesErr4="";
$FilesErr5="";
$FI1="";
$FI2="";
$FI3="";
$FI4="";
$FI5="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$target_dir="C:/xampp/htdocs/PHP College Medical Website/Database for images/";
  if (empty($_POST["FN"]))
  {
    $NameErr = "The First Name is required";
  }
  else {
    $x1=test_input($_POST["FN"]);
    if (!preg_match($Matcher,$x1)){
      $NameErr = "Only Charcters allowed";
    }
  }
  if (empty($_POST["LN"])) 
  {
    $SurnameErr = "The Last Name is required";
  }
  else {
    $x2=test_input($_POST["LN"]);
    if (!preg_match($Matcher,$x2)){
      $SurnameErr = "Only Charcters allowed";
    }
  }

  if (empty($_POST["gender"])) {
    $GenderErr = "Gender is required";
  } 
  else
  {
    $selected_radio = test_input($_POST['gender']);
  }

  if (empty($_POST["mail"])) {
    $EmailErr = "Email is required for contacting you";
  }
  else
  {
    $Emails=test_input($_POST["mail"]);
  }
  if (empty($_POST["Age"])) {
    $AgeErr = "Age is required for the doctor to examine and prescribe medicines.";
  } 
  else
  {
    $Ages=test_input($_POST["Age"]);
  }
  if (empty($_POST["username"])) {
    $UsrErr = "Username should be unique and in the correct format";
  } 
  else
  {
    $users=test_input($_POST["username"]);
    if (!preg_match("/^[A-Za-z]{1}[A-Za-z0-9]{4,18}$/", $users)){
      $UsrErr = "Username is not in the correct format";
    }
  }
  if (empty($_POST["password"])) {
    $PasswErr = "Password Required in Correct Format";
  }
  else
  {
    $passwords1=test_input($_POST["password"]);
    $passwords2=test_input($_POST["Conf_password"]);
    $uppercase = preg_match('@[A-Z]@', $passwords1);
    $lowercase = preg_match('@[a-z]@', $passwords1);
    $number    = preg_match('@[0-9]@', $passwords1);
    $specialChars = preg_match('@[^\w]@', $passwords1);
    $lengths    = strlen($passwords1) >= 8;
    if(!$uppercase or !$lowercase or !$number or !$specialChars or !$lengths or abs(strcmp($passwords1,$passwords2))){
      $PasswErr = "Password don't match the correct format or are not the same!";
    }
  }
  if (empty($_POST["CN"])) {
    $PhoneErr = "Contact Number is required for contacting you";
  }
  else
  {
    $Phone=test_input($_POST["CN"]);
    if (!preg_match($Number_match,$Phone)){
      $PhoneErr = "Invalid Contact Number";
    }
  }
  if (empty($_POST["FA"])) {
    $AddrErr = "Please Enter the Address Correctly, we will not share it with anyone";
  }
  else
  {
    $Addrs=test_input($_POST["FA"]);
  }

  if (empty($_POST["Pin"])) {
    $PCErr = "Pincode is required";
  }
  else
  {
    $Pinc=test_input($_POST["Pin"]);
    if (strlen($Pinc)!=6){
      $PCErr = "Invalid Pincode";
  }
  }
    $uploadOk = 1;
    $target_paths="C:/xampp/htdocs/PHP College Medical Website/Database for images/";

    $file_type=$_FILES['File1']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpg" || $file_type=="image/jpeg"){
    $target_path = $target_paths.basename( $_FILES['File1']['name']);
    $FI1 = $_FILES['File1']['name'];
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["File1"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $FilesErr1="The uploaded file should be an image.";
        $uploadOk = 0;
      }
    }
    if(!move_uploaded_file($_FILES['File1']['tmp_name'], $target_path)) {
        $FilesErr1 = "Sorry, file not uploaded, please try again!";
    }
  }
  else{
    $FilesErr1 = "Sorry, Only .pdf, .jpg and .png Files Accepted!";
  }

    if(file_exists($_FILES['File2']['tmp_name']) || is_uploaded_file($_FILES['File2']['tmp_name'])) {
    $file_type=$_FILES['File2']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpg" || $file_type=="image/jpeg"){
    $target_path = $target_paths.basename( $_FILES['File2']['name']);
    $uploadOk = 1;
    $FI2=$_FILES['File2']['name'];
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["File2"]["tmp_name"]);

      if($check !== false) {
        $uploadOk = 1;
      } else {
        $FilesErr2="The uploaded file should be an image.";
        $uploadOk = 0;
      }
    }
    if(!move_uploaded_file($_FILES['File2']['tmp_name'], $target_path)) {
        $FilesErr2 = "Sorry, file not uploaded, please try again!";
      }
    }
    else{
    $FilesErr2 = "Sorry, Only .pdf, .jpg and .png Files Accepted!";
  }
  }


    if(file_exists($_FILES['File3']['tmp_name']) || is_uploaded_file($_FILES['File3']['tmp_name'])) {
    $file_type=$_FILES['File3']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpg" || $file_type=="image/jpeg"){
    $target_path = $target_paths.basename( $_FILES['File3']['name']);
    $uploadOk = 1;
    $FI3=$_FILES['File3']['name'];
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["File3"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $FilesErr3="The uploaded file should be an image.";
        $uploadOk = 0;
      }
    }
    if(!move_uploaded_file($_FILES['File3']['tmp_name'], $target_path)) {
        $FilesErr3 = "Sorry, file not uploaded, please try again!";
      }
    }
   else{
    $FilesErr3 = "Sorry, Only .pdf, .jpg and .png Files Accepted!";
  }
  }


    if(file_exists($_FILES['File4']['tmp_name']) || is_uploaded_file($_FILES['File4']['tmp_name'])) {
    $file_type=$_FILES['File4']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpg" || $file_type=="image/jpeg"){
      $target_path = $target_paths.basename( $_FILES['File4']['name']);
      $uploadOk = 1;
      $FI4=$_FILES['File4']['name'];
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["File4"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $FilesErr4="The uploaded file should be an image.";
        $uploadOk = 0;
      }
    }
    if(!move_uploaded_file($_FILES['File4']['tmp_name'], $target_path)) {
        $FilesErr4 = "Sorry, file not uploaded, please try again!";
    }
  }
  else{
    $FilesErr4 = "Sorry, Only .pdf, .jpg and .png Files Accepted!";
  }
  }

    if(file_exists($_FILES['File5']['tmp_name']) || is_uploaded_file($_FILES['File5']['tmp_name'])) {
    $file_type=$_FILES['File5']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpg" || $file_type=="image/jpeg"){
      $target_path = $target_paths.basename( $_FILES['File5']['name']);
      $FI5=$_FILES['File5']['name'];
    $uploadOk = 1;

    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["File5"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $FilesErr5="The uploaded file should be an image.";
        $uploadOk = 0;
      }
    }
    if(!move_uploaded_file($_FILES['File5']['tmp_name'], $target_path)) {
        $FilesErr5 = "Sorry, file not uploaded, please try again!";
    }
  }
     else{
    $FilesErr5 = "Sorry, Only PDF, JPEG and PNG Files Accepted!"; 
  }
  }

  if($AgeErr == "" and $Phone!="" and $GenderErr == "" and $NameErr=="" and $SurnameErr=="" and $PhoneErr=="" and $EmailErr=="" and $UsrErr=="" and $PasswErr=="" and $PCErr=="" and $AddrErr=="" and $FilesErr1=="" and $FilesErr2=="" and $FilesErr3=="" and $FilesErr4=="" and $FilesErr5=="")    
    {
    session_start();
    $_SESSION["Phone"] = $Phone;
    $_SESSION["Email"] = $Emails;
    $_SESSION["Pass"] = $passwords1;
    $_SESSION["Fname"] = $x1;
    $_SESSION["Lname"] = $x2;
    $_SESSION["Age"] = $Ages;
    $_SESSION["Username1"] =  $users;
    $_SESSION["Address"] =  $Addrs;
    $_SESSION["Pincode"] =  $Pinc;
    $_SESSION["Genders"] =  $selected_radio;
    }
    if (isset($_POST['exampleCheck1'])){
        $cookie_name = "Cookies_Php";
        $cookie_value =$Emails;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 90), "/"); // 86400 = 1 day
      }

    $db = mysqli_connect('localhost','root','','carefull_db') or die('Error connecting to MySQL server.');
    $order = "INSERT INTO user
        (Phone,Email,Password, First_Name, Last_Name, Age, Username, Address, Pincode, Gender, File1, File2, File3, File4, File5)
        VALUES
        ('$Phone',
        '$Emails',
        '$passwords1',
        '$x1',
        '$x2',
        '$Ages',
        '$users',
        '$Addrs',
        '$Pinc',
        '$selected_radio',
        '$FI1',
        '$FI2',
        '$FI3',
        '$FI4',
        '$FI5')";

  $result = mysqli_query($db,$order); //order executes
  if($result){
    echo("<br>Input data is succeed");
  } else{
    echo("<br>Input data is fail");
  }

    mysqli_close($db);
    header("Location: http://localhost/PHP%20College%20Medical%20website/Sign In.php");
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
    <strong style="font-size: 22px;"> Sign Up </strong>
      <div class="form-row">
        <div class="form-group col-md-6 mb-0">
          <label for="FN">First Name: </label>
          <input type="text" maxlength="15" class="form-control" id="FN" name="FN" required><br><span class="error" style="color:red;"><?php echo $NameErr;?></span>
        </div>
        <div class="form-group col-md-6 mb-0">
          <label for="LN">Last Name: </label>
          <input type="text" maxlength="15" class="form-control" id="LN" name="LN" required><br><span class="error" style="color:red;"><?php echo $SurnameErr;?></span>
        </div>
      </div>
          <div class="form-group col-md-8 mb-0">
            <label for="mail">E-mail: </label>
            <input type="email" maxlength="25" class="form-control" id="mail" name="mail" required><br><span class="error" style="color:red;"><?php echo $EmailErr;?></span>
          </div>
        <small id="emailHelp" class="form-text" style="opacity: 0.6">We'll never share your email with anyone else.</small>
      <div class="form-group">
            <strong><p>Please select your gender:</p></strong>
              <input type="radio" id="gender1" name="gender" value="Male" required="required"><strong>Male</strong>
              <input type="radio" id="gender2" name="gender" value="Female" required="required"><strong>Female</strong>
            </p>
          <span class="error" style="color:red;"><?php echo $GenderErr;?></span>
      </div>
      <div  class="col-sm-6">
        <label for="Age">Age</label>
        <input type="number" class="form-control" id="Age" name="Age" required max="100" min="15"><br><span class="error" style="color:red;"><?php echo $AgeErr;?></span>
      </div>
      <div class="col-sm-6">
        <label for="CN">Contact Number</label>
        <input type="text" maxlength="10" class="form-control" id="CN" name="CN" required><br><span class="error" style="color:red;"><?php echo $PhoneErr;?></span>
      </div>
      <div class="col-sm-12">
        <label for="FA">Full Address: </label>
        <input type="text" class="form-control" id="FA" name="FA" required><br><span class="error" style="color:red;"><?php echo $AddrErr;?></span>
      </div>
      <div  class="col-sm-6">
        <label for="Pin">Pincode</label>
        <input type="text" maxlength="6" class="form-control" id="Pin" name="Pin" required><br><span class="error" style="color:red;"><?php echo $PCErr;?></span>
      </div><br>
      <p>Please upload the files regarding any health issues in the past 6 months (Eg: any reports or any prescription by any doctor)<br><small>Maximum 5 Files allowed. Minimum 1 (Birth Certificate). Plaese fill the files in correct order.</small></p>
      <div class="col-sm-6">
      <div class="form-group">
          <label for="File1">File 1</label>
          <input type="file" class="form-control-file" name="File1" id="File1" required="required">
          <span class="error" style="color:red;"><?php echo $FilesErr1;?></span>
      </div>
      <div class="form-group">
          <label for="File2">File 2</label>
          <input type="file" class="form-control-file" name="File2" id="File2">
          <span class="error" style="color:red;"><?php echo $FilesErr2;?></span>
      </div>
      <div class="form-group">
          <label for="File3">File 3</label>
          <input type="file" class="form-control-file" name="File3" id="File3">
          <span class="error" style="color:red;"><?php echo $FilesErr3;?></span>
      </div>
      <div class="form-group">
          <label for="File3">File 4</label>
          <input type="file" class="form-control-file" name="File4" id="File4">
          <span class="error" style="color:red;"><?php echo $FilesErr4;?></span>
      </div>
      <div class="form-group">
          <label for="File3">File 5</label>
          <input type="file" class="form-control-file" name="File5" id="File5">
          <span class="error" style="color:red;"><?php echo $FilesErr5;?></span>
      </div></div><br>
      <div class="form-group">
        <div class="col-sm-6">
        <label for="username" >Username</label>
        <input type="text" class="form-control" id="username" required name="username"><br><span class="error" style="color:red;"><?php echo $UsrErr ;?></span>
      </div>
      <div  class="col-sm-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" required name="password">
      </div>
      <div  class="col-sm-6">
        <label for="Conf_password">Confirm Password</label>
        <input type="password" class="form-control" id="Conf_password" required name="Conf_password"><br><span class="error" style="color:red;"><?php echo $PasswErr;?></span>
      </div>
        <input type="checkbox" class="form-check-input" name="exampleCheck1" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1" style="size:1vw;">Remember me</label>
      </div>
      <button type="submit" class="btn btn btn-outline-dark" style="color: #D7FF33;">Sign Up</button>
      <big class="form-text" style="opacity: 0.8;padding-top:2vw;">
        <a style="color: white;" href="Sign In.php">
        <big>Already A User? Login Here</big>
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