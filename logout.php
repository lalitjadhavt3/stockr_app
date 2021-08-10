<?php
// Initialize the session
@session_start();
 // Initialize the session
	require 'dbconnect.php';

	    $action ="logout";

	    $ip = $_SERVER['REMOTE_ADDR'];
	    $username = $_SESSION["username"];
	    $user_id = $_SESSION["user_id"];
	    $usertype = $_SESSION["usertype"];

	    $insert_login = "insert into user_log (username,userid,usertype,action,ip) values ('$username','$user_id','$usertype','$action','$ip')"; 
	   
	    $res = mysqli_query($conn, $insert_login);
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
//exit;

exit;
?>