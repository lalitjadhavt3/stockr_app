<?php
	@session_start();
	include "../dbconnect.php";
	extract($_POST);
	$admin_id = $_SESSION['user_id'];
	$transaction_date = date('d-m-Y');
	$transaction_time = date('h:i a');
	$comment = "";
	$insert = "insert into selling(c_id,admin_id,current_rate,admin_rate,minimum_sell_rate,no_of_crates,total_amount,paid_amount,balance_amount,transaction_date,transaction_time,comment) values ('$cid','$admin_id','$item_rate_current','$item_rate_admin_given','$minimum_sell_rate','$total_crates','$total_amt','$paid_amt','$balance_amt','$transaction_date','$transaction_time','$comment');";
	//echo $insert;
	$fire = mysqli_query($conn,$insert);
	if($fire)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
?>