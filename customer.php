<?php
    require 'dbconnect.php';
    @session_start();
    //print_r($_SESSION);
    // Check if the user is logged in, if not then redirect him to login page
    if((!empty($_SESSION["usertype"])) && (!empty($_SESSION['user_id'])))
      {
        if($_SESSION["usertype"]==1)
          {
          
          } 
         
          else
          {
            echo" you are not recognized"; 
            session_destroy();
            exit;
          }
      }
      else{
         header("location: login.php");exit;
       }

         $loadmore = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BankApp - Wallet & Banking HTML Mobile Template</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="assets\css\vendor.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\responsive.css">

    <style type="text/css">
        .row2 {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
                align-items: baseline;
            
        }


       


.float{
    position:fixed;
    width:45px;
    height:45px;
    bottom:60px;
    right:20px;
    background-color:#5d32f7;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
}

.my-float{
    margin-top:20%;
    font-size: 24px;
}
.accordion-icon .card-header
{
    padding: 1rem;  
}

    </style>
</head>

<body>

    <!-- preloader area start -->
    
    <!-- preloader area end -->

    
    <!-- //. search Popup -->

    <!-- header start -->
    <div class="header-area" style="background-image: url(assets/img/bg/1.png);">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <a class="menu-back-page" href="index.php">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
                <div class="col-sm-4 col-6 text-center">
                    <div class="page-name">Customers</div>
                </div>
                <div class="col-sm-4 col-3 text-right">
                    <div class="search header-search">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- page-title stary -->
   
    <!-- page-title end -->
    <div class="add-balance-inner-wrap" id="modal_inner_content">
            <div class="container">
                <div class="modal-dialog" role="document" id="modal_content_data">
                    
                </div>
            </div>
        </div>


               
    <!-- transaction start -->
    <div class="transaction-area pd-top-25p" id="div_parent_cust"> 
        <div class="container">

                <br/>

            <form class="searchbar" style="position: fixed;width: 93%;z-index: 999;margin-top: -45px;">
                <div class="search_chat has-search">
               
                    <input class="form-control chat_input" style="box-shadow: -3px 4px 16px 1px rgba(0,0,0,0.74);-webkit-box-shadow: -3px 4px 16px 1px rgba(0,0,0,0.74);-moz-box-shadow: -3px 4px 16px 1px rgba(0,0,0,0.74);" id="search_prod" type="text" placeholder="Search for  Name or ID">
                </div>

              </form>  

          <div id="accordion-icon-right" class="accordion-icon icon-01">
                <ul class="transaction-inner">
               
                   <div class="" id="trans_list" style="padding-top: 5%">


                    <?php 
                    $get_notifications = "SELECT * FROM customer limit 10";
                    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
                    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

                    $res = $conn->query($get_notifications);
                    $numrows = mysqli_num_rows($res);
                    if($numrows > 9)
                    {
                     $loadmore = '<div class="row loadmore_div">
                               <div class="col-12 text-center">
                                   <button type="button" class="loadmore btn btn-primary" style="font-size: 10px;height: 30px;line-height: 30px;">Load More</button>
                               </div>
                           </div>';
                    }
                   
                  
                    if($result = $conn->query($get_notifications))
                    {
                        while($data = $result->fetch_assoc())
                        {
                           
                           
 

                   
                                echo '<li class="ba-single-transaction well style-two" style="padding:6px 14px;" >
                                        <div class="details">
                                            <div class=" align-items-center">
                                                <div class="card-title"><h4>'.$data["c_id"].'-'.$data["cust_name"].'</h4>
                                                </div>
                                                <table class="table table-responsive" style=" table-layout: fixed;margin-top: 3%;margin-bottom: 0px">
                                                    <tbody style="display: inline-table;width: 100%;">
                                                         <tr>
                                                            <td style="border: none"><a href="#" class="btn-small2 ba-send_crate btn-primary-light" style="color:#5cb85c;" data-userid="'.$data["c_id"].'" data-toggle="modal" data-target="#viewmodal" ><i  style="margin-right: 5px " class="fa fa-share"></i>Send</i></a>
                                                           </td>
                                                            <td style="border: none"><a href="#" class="btn-small2 ba-send_crate_empty btn-primary-light" style="color:#dc3545;"  data-userid="'.$data["c_id"].'" data-toggle="modal" data-target="#viewmodal" ><i  style="margin-right: 5px " class="fa fa-download"></i>Receive</i></a>
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
                        }

                    ?>
 </div>
          <?php 
            echo $loadmore;
         ?>
                    
                
                    
                </ul>

                <br>

           </div>

        </div>

 
                 
    </div>
    



   
    <!-- transaction End -->

    <!-- transaction start -->
    
    <!-- transaction End -->

    
    <!-- transaction End -->
    <a href="add_cust.php" class="float">
    <i class="fa fa-plus my-float"></i>
    </a>
    <!-- <div class="btn-wrap " style="display: flex;justify-content: flex-end;">
        <div class="container">
            <a class="btn btn-blue" href="#"><i style="padding-left: 0px" class="fa fa-plus"></i></a>
        </div>
    </div> -->

    <!-- Footer Area -->
    <?php include 'footer.php'?>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets\js\vendor.js"></script>
    <script src="assets\js\main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        
            var item_rate =0;
            var total_crates = 0;
            var total_amt =0;
            var paid_amt = 0;
            var balance_amt = 0;
            var minimum_sell_rate = 0;
       
            $("#div_parent_cust").on("click", ".ba-send_crate", function(){
                var cust_id = $(this).data('userid');
               
                $.ajax({
                    type: "POST",
                    data: {
                        "cust_id": cust_id
                    },
                    url: "get/get_cust_data_send_crate_modal.php",
                    success: function(data, result) {

                        $('#modal_content_data').html(data);
                         item_rate =  $('#item_rate_input').val();
                         item_rate = parseFloat(item_rate);                    }
                });
                $(".add-balance-inner-wrap").toggleClass("add-balance-inner-wrap-show", "linear");
               
            });

            /*$('body').on('click', function(event) {
                if (!$(event.target).closest('.ba-send_crate').length && !$(event.target).closest('.add-balance-inner-wrap').length) {
                    $('.add-balance-inner-wrap').removeClass('add-balance-inner-wrap-show');
                }
            });*/
            $("#modal_inner_content").on("click", ".btn_close", function(){
           
                $('.add-balance-inner-wrap').removeClass('add-balance-inner-wrap-show');
                $('.add-balance-inner-wrap').find('.modal-content').remove();
            })


             $("#modal_inner_content").on("blur", "#item_rate_input", function(){

                current_val = parseFloat($(this).val());
                minimum_sell_rate = parseFloat($("#minimum_sell_rate").val());
                 if(current_val < minimum_sell_rate)
                {
                   
                    
                   swal('Enter Value more than Min Selling Rate',' MIn Selling rate is :'+minimum_sell_rate,'warning').then((value) => {

                    });


               

                 }
             });

          
            $("#modal_inner_content").on("keyup", "#crates_total", function(){
                if($(this).val() != "")
                {
                    crates_total = parseFloat($(this).val());
                    if(crates_total > 0)
                    {
                        total_amt = crates_total * parseFloat($('#item_rate_input').val());
                        $("#total_amt").val(total_amt);
                    }
                    else
                    {
                        total_amt = 0;
                        $("#total_amt").val(total_amt);
                    }
                }
                else
                {
                        total_amt = 0;
                        $("#total_amt").val(total_amt);
                }
                $("#paid_amt").val(0);
                balance_amt = total_amt;
                $("#balance_amt").val(balance_amt);
                
            });
            $("#modal_inner_content").on("keyup", "#item_rate_input", function(){
                if($(this).val() != "")
                {
                    item_rate = parseFloat($(this).val());
                    if(item_rate > 0)
                    {

                        total_amt = parseFloat($('#crates_total').val()) * item_rate;
                         $("#total_amt").val(total_amt);
                    }
                    else
                    {
                        total_amt = 0;
                        $("#total_amt").val(total_amt);
                    }
                }
                else
                {
                        total_amt = 0;
                        $("#total_amt").val(total_amt);
                }
                $("#paid_amt").val(0);
                balance_amt = total_amt;
                $("#balance_amt").val(balance_amt);
            });
            $("#modal_inner_content").on("keyup", "#paid_amt", function(){
                if($(this).val() != "")
                {
                    total_amt =  $("#total_amt").val();
                    paid_amt =  parseFloat($(this).val());
                    if(total_amt > 0)
                    {
                        
                        if(paid_amt <= total_amt)
                        {
                            balance_amt = total_amt - paid_amt;
                            $("#balance_amt").val(balance_amt);
                        }
                        else
                        {
                            swal('Enter Correct Paid Amount',' Paid amount must be less than total amount','warning').then((value) => {
                            
                        });
                        }
                        
                    }
                    else
                    {
                        swal('Total Amount is not Correct!',' Please Enter correct no of crates and rate','error').then((value) => 
                        {
                             window.location.reload();
                        });
                    }
                    
                    
                    
                }
                else
                {
                        balance_amt = 0;
                        $("#balance_amt").val(balance_amt);
                }
                
            });

            $("#modal_inner_content").on("submit", "#form_send_crate", function(){

                 var formData = new FormData();
                  item_rate_current = $("#item_rate_current").val();
                  item_rate_admin_given = $("#item_rate_input").val();
                  total_crates = $("#crates_total").val();
                  total_amt = total_amt;
                 
                  minimum_sell_rate = $("#minimum_sell_rate").val();
                  cid = $("#cid").val();
                  comment = $("#comment_txt").val();

                  /*console.log("item_rate_current:"+item_rate_current);
                  console.log("item_rate_admin_given:"+item_rate_admin_given);
                  console.log("total_crates:"+total_crates);
                  console.log("total_amt:"+total_amt);
                  console.log("paid_amt:"+paid_amt);
                  console.log("balance_amt:"+balance_amt);
                  console.log("minimum_sell_rate:"+minimum_sell_rate);
                  console.log("cid:"+cid);
                  console.log("comment:"+comment);*/
                  if((item_rate_current!=undefined)&&(item_rate_admin_given!=undefined)&&(total_crates!=undefined)&&(total_amt!=undefined)&&(paid_amt!=undefined)&&(balance_amt!=undefined))
                  {

                      formData.append("item_rate_current",item_rate_current);
                      formData.append("item_rate_admin_given",item_rate_admin_given);
                      formData.append("total_crates",total_crates);
                      formData.append("total_amt",total_amt);
                      formData.append("paid_amt",paid_amt);
                      formData.append("balance_amt",balance_amt);
                      formData.append("minimum_sell_rate",minimum_sell_rate);
                      formData.append("cid",cid);
                      formData.append("comment",comment);
                      

                    
                    $.ajax({
                            type:"POST",
                            url:"submit/cust_send_crate_data.php",
                            data:formData,
                            processData: false,
                            cache: false,
                            contentType: false,
                            success: function(data){
                              swal('Crates Send successfully!','','success').then((value) =>
                                {

                             window.location.href='customer.php';
                            });
                            }
                        });
                  }
                  else
                  {
                    swal("error",'','error');
                  }


                
                return false;
            });


               $("#search_prod").on("keyup",function () 
             
            {
                
                var search_text = $("#search_prod").val();
                if(search_text == ''){
                 window.location.href="customer.php";
                }
                else
                {
                 $.ajax({
                          url: 'get/search_cust.php',
                          type: "post",
                          data:{search_text:search_text},
                          beforeSend: function (){
                              $('#loader').css("display","block");

                          },
                          success: function (data) {
                              $('#loader').css("display","none");
                               $('.loadmore_div').css("display","none");
                                   $("#trans_list").html(data);
                          }
                     });
                }
                

             });



               $(".loadmore").click(function() {

                

                    var lastId = $(".well:last").attr("id");

                    $.ajax({

                                url: 'get/get_cust.php?lastId=' + lastId,

                                type: "get",

                                beforeSend: function (){

                                    $('#loader').css("display","block");
                                    
                                },

                                success: function (data) {
                                    $('#loader').css("display","none");
                                    
                                         $("#trans_list").append(data);

                                }

                    });

               

                });

             
           
    </script>


</body>

</html>