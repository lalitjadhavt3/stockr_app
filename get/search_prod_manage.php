<?php 

@session_start();

 require '../dbconnect.php';
//print_r($_POST);

$search_text = $_POST['search_text'];

 // $sql = "select * from selling where c_id like '%$search_text%' or total_amount like '%$search_text%'";

$sql = "select * from selling INNER JOIN customer ON customer.c_id=selling.c_id where total_amount like '%$search_text%' or cust_name like '%$search_text%' or mobile_no like '%$search_text%'";
 

// echo $sql;
 if($result = $conn->query($sql))
 {
 

   while($data = mysqli_fetch_assoc($result)) {   

                                     echo '<div class="ba-bill-pay-inner trans pd-top-0px" style="padding: 10px"  id="'.$data['trans_id'].'">
                                     <div class="ba-single-bill-pay"  style="margin-bottom: 0px">
                                         <div class="thumb">
                                             <img src="assets/img/send-arrow.png" alt="img" style="width: 100%">
                                         </div>
                                         <div class="details" style="width: 100%">
                                            <div class="row">
                                                <div class="col-7">
                                                     <h5>'.$data["cust_name"].'</h5>
                                                </div>
                                                <div class="col-5">
                                                    <a href="tel:'.$data["mobile_no"].'" style="font-size:10px;color: #1E88E5;"><i class="fa fa-phone" aria-hidden="true"></i>'.$data["mobile_no"].'</a>

                                                </div>
                                            </div>
                                             <p style="font-size: 16px"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$data["transaction_date"].'-'.$data["transaction_time"].'</p>
                                             
                                         </div>
                                         </div>
                                         <hr style="margin-top: 2px;margin-bottom: 5px">
                                          <div class="amount-inner" style="padding: unset;border:unset;">
                                             <div class="row">
                                                 <div class="col-7">
                                                      <h5>₹ '.$data["total_amount"].'</h5>
                                                      
                                                 </div>
                                                 <div class="col-5">
                                                     <a data-userid="'.$data["trans_id"].'" class="btn btn-blue ba-add-balance-btn view_trans_details" style="line-height: 30px;height: 30px" href="#">View</a>
                                                 </div>
                                             </div>
                                        
                                         
                                          </div>
                                       </div>';
                                   }
                               }
                                 ?>