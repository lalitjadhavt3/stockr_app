<?php 
		extract($_POST);
	
	    require '../dbconnect.php';
		$insert_query= "INSERT INTO customer(`cust_name`, `mobile_no`, `address`) VALUES ('$cust_name','$mobile_no','$address')";

		//echo $insert_query."<br>";	
		$fire_query= mysqli_query($conn,$insert_query);
		//print_r($update_query_teacher);
		if($fire_query)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	
?>