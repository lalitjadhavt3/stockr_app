<?php require "dbconnect.php"?>
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
    </style>
</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form action="home.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- //. search Popup -->

    <!-- header start -->
    <div class="header-area" style="background-image: url(assets/img/bg/1.png);">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <a class="menu-back-page" href="home.html">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
                <div class="col-sm-4 col-6 text-center">
                    <div class="page-name">Transactions</div>
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
    <div class="page-title mg-top-50">
        
    </div>
    <div id="cust_send_crate_data" style="display: none;">
        
    </div>
    <!-- page-title end -->
    <div class="add-balance-inner-wrap" id="modal_inner_content">
            <div class="container">
                <div class="modal-dialog" role="document" id="modal_content_data">
                    
                </div>
            </div>
        </div>




           

    <!-- transaction start -->
    <div class="transaction-area pd-top-36" id="div_parent_cust"> 
        <div class="container">
            
            <ul class="transaction-inner">
                <?php
                    $query = "SELECT * FROM customer";
                    if ($result = $conn->query($query)) {
                     
                        while ($data = $result->fetch_assoc()) {
                            echo '<li class="ba-single-transaction style-two">
                                    <div class="details">
                                        <h5>'.$data["c_id"].'-'.$data["cust_name"].'</h5>
                                         <div class="row">
                                            <div class="col-6">

                                                   <button data-userid="'.$data["c_id"].'" class="ba-send_crate" style="border-radius: 10px;background: green;color:white;font-weight: 500;padding: 5px;padding-top: 2px" class=""><i class="fa fa-upload"  aria-hidden="true" ></i><br>Send Crate</button>
                                           </div>
                                           <div class="col-6">
                                               <button data-userid="'.$data["c_id"].'" class="ba-send_crate_empty" style="border-radius: 10px;background: cornflowerblue;color:white;font-weight: 500;padding: 5px;padding-top: 2px" class=""><i class="fa fa-download" aria-hidden="true"></i>Receive Empty Create</button>
                                           </div>
                                        </div>
                                    </div>
                                </li>';
                        }
                    }

                ?>
                
                
               
                
            </ul>
        </div>
    </div>
    <!-- transaction End -->

    <!-- transaction start -->
    
    <!-- transaction End -->

    
    <!-- transaction End -->

    <div class="btn-wrap mg-top-40">
        <div class="container">
            <a class="btn-large btn-blue w-100" href="#">More Transctios <i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>

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
        
            var item_rate;
            var total_crates;
            var total_amt;
            var paid_amt;
            var balance_amt;
       
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
            })
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
                $("#balance_amt").val(0);
                
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
                $("#balance_amt").val(0);
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
       
    </script>

     
</body>

</html>