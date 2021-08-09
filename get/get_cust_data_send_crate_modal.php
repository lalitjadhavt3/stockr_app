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
                                <form method="post" id="form_send_crate">
                                   
                                    <div class="row" >
                                        <div class="form-group basic col-6">
                                            <label class="label">Todays Rates</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="input1">₹</span>
                                                </div>
                                                <input type="number" id ="item_rate_input" class=" form-control form-control-lg" required value="'.$item_rate.'">
                                                <input type="hidden" id ="minimum_sell_rate" class=" form-control form-control-lg" value="'.$minimum_sell_rate.'" required>
                                                <input type="hidden" id ="cid" class=" form-control form-control-lg" value="'.$data["c_id"].'" >
                                                <input type="hidden" id ="item_rate_current" class=" form-control form-control-lg" value="'.$item_rate.'" required>
                                            </div>
                                        </div>
                                        <div class="form-group basic col-6">
                                            <label class="label">No. of Crates</label>
                                            <div class="input-group mb-3">
                                                
                                                <input type="number" class="form-control form-control-lg" required id ="crates_total">
                                            </div>
                                        </div>
                                        <div class="form-group basic">
                                            <div class="row2">
                                                <div class="col-6">
                                                    <label class="label">Total Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input required type="number" style="text-align:end"  readonly class="form-control form-control-lg" id ="total_amt">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row2">
                                                <div class="col-6">
                                                    <label class="label">Paid Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input type="number" style="text-align:end" class="form-control form-control-lg" id ="paid_amt" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row2">
                                                <div class="col-6">
                                                    <label class="label">Pending Amount</label>
                                           
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input type="number" style="text-align:end"  readonly class="form-control form-control-lg" id ="balance_amt" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                             <div id="accordion-icon-left" class="accordion-icon icon-01">
                       
                        <div class="widget has-shadow">
                            
                            <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconLeftCollapseOne">
                                <div class="card-title" style="font-weight:800;font-size:15px;">Add Comment</div>
                            </a>
                            <div id="IconLeftCollapseOne" class="card-body collapse pt-0" data-parent="#accordion-icon-left">



                            <textarea class="form-control" id="comment_txt" ></textarea>
                               
                            </div>
                            
                           
                            
                            
                           
                           
                        </div>
                        <!-- End Widget -->
                    </div>

                                            


                                        </div>
                                          
                                    </div>
                                    <div class="form-group basic row">
                                            <div class="col-6">
                                                <button type="button"  class="btn_close btn-c btn-dark btn-block btn-lg">Cancel</button>
                                            </div>
                                            <div class="col-6">
                                                <button id="send_btn" type="submit" class="btn-c btn-success btn-block btn-lg">Send</button>
                                            </div>

                                            
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>';
	    }
	}
?>