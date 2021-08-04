  <?php 
		if(isset($_POST["id"]))
		{


		extract($_POST);
	
	    require '../dbconnect.php';

        // $item_name = $_POST['item_name'];
        // $item_rate = $_POST['item_rate'];
        // $new_rate = $_POST['new_rate'];

		$query = "update rates set  item_rate ='$new_rate' where id = '$id'";

		//echo $insert_query."<br>";	
		$fire_query= mysqli_query($conn,$query);
		//print_r($update_query_teacher);
		if($fire_query)
		{
			echo "success";
			$insert = "insert into item_rate_history (item_id,item_name,current_rate,changed_rate)values ('$id','$item_name','$item_rate','$new_rate')";
			echo $insert;
			$fire_query= mysqli_query($conn,$insert);
		}
		else
		{
			echo "error";
		}
	}
	
?>