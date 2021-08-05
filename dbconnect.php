<?php

 $dbhost = "localhost";
 $dbuser = "kaikotec_banana_admin";
 $dbpass = "SA@admin123";
 $db = "kaikotec_banana";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);


}


?>
