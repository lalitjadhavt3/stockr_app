<?php
	require '../dbconnect.php';
	extract($_POST);
	$query = "SELECT * FROM selling inner join customer on customer.c_id = selling.c_id where trans_id ='$trans_id' ";
	if ($result = $conn->query($query)) {
	 
	    while ($data = $result->fetch_assoc()) {
	echo '
            <div class="transaction-details">
                   
                        <ul class="transaction-details-inner">
                            <li class="transaction-details-title">
                               
                                <span class="float-left" style="margin-left:15px;">'.$data['transaction_date'].'-'.$data['transaction_time'].'</span>
                                <span class="float-right"><i class="fa fa-check-circle"></i></span>
                            </li>
                            <li>
                                <span class="float-left">To</span>
                                <span class="float-right">'.$data['cust_name'].'</span>
                            </li>
                            <li>
                                <span class="float-left">No Of Crates</span>
                                <span class="float-right">'.$data['no_of_crates'].'</span>
                            </li>
                            <li>
                                <span class="float-left">Rates</span>
                                <span class="float-right">₹ '.$data['current_rate'].'</span>
                            </li>
                            <li>
                                <span class="float-left">Total Amount</span>
                                <span class="float-right">₹ '.$data['total_amount'].'</span>
                            </li>
                            <li>
                                <span class="float-left">Paid Amount</span>
                                <span class="float-right">'.$data['paid_amount'].'</span>
                            </li>
                            <li>
                                <span class="float-left">Balance Amount</span>
                                <span class="float-right">₹ '.$data['balance_amount'].'</span>
                            </li>
                        </ul>
                    
                </div>
        ';
    }
}

?>