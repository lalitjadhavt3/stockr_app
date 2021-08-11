<?php

	// example use from browser
	// http://localhost/companydirectory/libs/php/insertDepartment.php?name=New%20Department&locationID=1

	// remove next two lines for production
	//extract($_POST);
	$row = array();
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$executionStartTime = microtime(true);

	include("../db.php");

	header('Content-Type: application/json; charset=UTF-8');


	if (mysqli_connect_errno()) {
		
		$output['status']['code'] = "300";
		$output['status']['name'] = "failure";
		$output['status']['description'] = "database unavailable";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	}	

	// $_REQUEST used for development / debugging. Remember to cange to $_POST for production
	$query = "select * from prod_master  ";
	mysqli_query($con,"SET CHARACTER SET 'utf8'");
	mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
	$sn=1; 
	 

	$result = $con->query($query);
	
	if (!$result) {


		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] =[];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}
	while($data = $result->fetch_assoc())
		{
			//print_r($data);
			$output['data'][] = $data;
		}
	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	
	
	mysqli_close($con);

	echo json_encode($output); 

?>