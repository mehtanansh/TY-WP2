<?php
session_start();
session_unset();
session_destroy();
setcookie("Cookies_Php","",time() - 3600);
echo "Session and Cookies Destroyed! Thankyou";
// header("Location: http://localhost/PHP%20College%20Medical%20website/Sign Up.php");
?><br><br>
<a href="Sign Up.php">Click here to Sign Up again</a>