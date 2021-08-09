<?php
<<<<<<< HEAD
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "dairy";
/* $dbhost = "localhost";
 $dbuser = "kaikotec_banana_admin";
 $dbpass = "SA@admin123";
 $db = "kaikotec_banana";*/
=======

 $dbhost = "localhost";

 $dbuser = "root";
 $dbpass = "";
 $db = "stockr_app";

/* $dbuser = "kaikotec_banana_admin";
 $dbpass = "SA@admin123";
 $db = "kaikotec_banana";
*/
>>>>>>> deb28728b1cb56bf7cb2586ff9ef03b237a17a14
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);


}


?>
