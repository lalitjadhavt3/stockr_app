<?php
	extract($_POST);
	require '../dbconnect.php';
	$query = "SELECT * FROM rates";
	//echo $query;
	if ($result = $conn->query($query)) {
	 
	    while ($data = $result->fetch_assoc()) {
	    	extract($data);
	    }
	}
	$query = "SELECT * FROM customer where  c_id = '$cust_id'";
	//echo $query;
	if ($result = $conn->query($query)) {
	 
	    while ($data = $result->fetch_assoc()) {
	    	echo '<div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cust_name_head">'.$data["cust_name"].'</h5>
                        </div>
                        <div class="modal-body">
                            <div class="action-sheet-content">
                                <form action="" method="post" id="form_send_crate">
                                   
                                    <div class="row" >
                                        <div class="form-group basic col-6">
                                            <label class="label">Todays Rates</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="input1">₹</span>
                                                </div>
                                                <input type="number" id ="item_rate_input" class=" form-control form-control-lg" value="'.$item_rate.'">
                                            </div>
                                        </div>
                                        <div class="form-group basic col-6">
                                            <label class="label">No. of Crates</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="number" class="form-control form-control-lg"  id ="crates_total" >
                                            </div>
                                        </div>
                                        <div class="form-group basic ">
                                            <div class="row2" >
                                                <div class="col-6">
                                                    <label class="label">Total Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input type="number" style="text-align:end"  readonly class="form-control form-control-lg" id ="total_amt" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row2">
                                                <div class="col-6">
                                                    <label class="label">Paid Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input type="number" style="text-align:end" class="form-control form-control-lg" id ="paid_amt">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row2">
                                                <div class="col-6">
                                                    <label class="label">Pending Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input type="number" style="text-align:end"  readonly class="form-control form-control-lg" id ="balance_amt">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                    <div class="form-group basic row">
                                            <div class="col-6">
                                                <button type="button"  class="btn_close btn-c btn-dark btn-block btn-lg">Cancel</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn-c btn-success btn-block btn-lg">Send</button>
                                            </div>

                                            
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>';
	    }
	}
?>