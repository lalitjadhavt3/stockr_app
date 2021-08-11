<?php 

@session_start();

 require '../dbconnect.php';


$lastid = $_GET['lastId'];

 $sql = "select * from  customer  where c_id >'".$lastid."' LIMIT 10";

 $result = $conn->query($sql);


 while($data = mysqli_fetch_assoc($result)) {  


              echo '<li class="ba-single-transaction well style-two" id="'.$data['c_id'].'">
                                              <div class="details">
                                                <a class="card-header collapsed align-items-center" data-toggle="collapse" href="#'.$data["c_id"].'">
                                                      <div class="card-title"><h4>'.$data["c_id"].'-'.$data["cust_name"].'</h4></div>
                                                  </a>
                                                    <div class="row card-body collapse pt-0 "  id="'.$data["c_id"].'" data-parent="#accordion-icon-right">

                                                   <table class="table table-responsive" style=" table-layout: fixed;margin-top: 3%;margin-bottom: 0px">
                                                        <tbody style="display: inline-table;width: 100%;">
                                                          <tr>
                                                             <td style="border: none"><a href="#" class="btn-small2 ba-send_crate btn-primary-light" style="color:#5b32f4;" data-userid="'.$data["c_id"].'" data-toggle="modal" data-target="#viewmodal" ><i  style="margin-right: 5px " class="fa fa-share"></i>Send Crate</i></a>
                                                            </td>
                                                             <td style="border: none"><a href="#" class="btn-small2 ba-send_crate_empty btn-primary-light" style="color:#5b32f4;"  data-userid="'.$data["c_id"].'" data-toggle="modal" data-target="#viewmodal" ><i  style="margin-right: 5px " class="fa fa-download"></i>Receive Empty Create</i></a>
                                                             </td>
                                                             <td style="border: none"><a href="transaction.php?'.$data["c_id"].'"" class="btn-small2  btn-primary-light"  style="color:#5b32f4;"><i  style="margin-right: 5px " class="fa fa-exchange"></i>History</i></a>
                                                             </td>
                                                                    

                                                            </tr>
                                                       </tbody>
                                                      </table>

                                                                 </div>

                                                                 </div>
                                                             </li>';



     

}

?>