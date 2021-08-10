<?php

@session_start();

$error=''; //Variable to Store error message;
//print_r($_POST);
if(isset($_POST['submit'])){



if(empty($_POST['username']) || empty($_POST['password'])){

	$error = "Username or Password is Invalid";

}

else

{

	$username = stripslashes($_POST['username']);



	$password = stripslashes($_POST['password']);

	require 'dbconnect.php';

	$username = mysqli_real_escape_string($conn,$username);

	$password = mysqli_real_escape_string($conn,$password);

	$password=md5($password);	

	//Selecting Database

	

	//sql query to fetch information of registerd user and finds user match.
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	//echo $sql;
	$query = mysqli_query($conn, $sql);

	$rows = mysqli_num_rows($query);

	$usertype=NULL;
    if($rows == 1)

	{
		while($row = mysqli_fetch_assoc($query))

		{

	       $usertype=$row["usertype"];

	       $user_id=$row["user_id"];



	    }

		if($usertype==1)

	    {

	   	//session_start();

	    $_SESSION["loggedin"] = true;

	    $_SESSION["user_id"] = $user_id;

	    $_SESSION["username"] = $username;

	    $_SESSION["usertype"] = $usertype; 

	   
	    $action ="login";

	    $ip = $_SERVER['REMOTE_ADDR'];

	    $insert_login = "insert into user_log (username,userid,usertype,action,ip) values ('$username','$user_id','$usertype','$action','$ip')";
	    //echo $insert_login;
	    $res = mysqli_query($conn, $insert_login);

                

	      header("location: index.php");



	    } 

	    elseif($usertype==2)

	    {

	      header("location: user/index.php");

	    }

	   

	    else

	    {

	    	echo "Not recognized";
	    	 session_destroy();
	    	 exit;

	    }

		

	}

	else

	{

	$error = "Username of Password is Invalid";

	}

	mysqli_close($conn); // Closing conection

}

}

?>