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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BankApp - Wallet & Banking HTML Mobile Template</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style type="text/css">
        input::-webkit-input-placeholder {
            font-size: 12px;
            line-height: 3;
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
                    <div class="page-name">Transactions</div>
                </div>
                
            </div>
        </div>
    </div>




    <!-- header end -->

    <!-- page-title stary -->
  
    <!-- page-title end -->

     <div class="add-balance-inner-wrap">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content"  id="modal_data">
                </div>
            </div>
        </div>
    </div>

    <!-- transaction start -->
  <div class="transaction-area" style="margin-top: 15%">
        <div class="container">

                <form class="searchbar" style="position: fixed;width: 93%;z-index: 999;padding-top: 10px;">
                    <div class="search_chat has-search">
                       
                        <input class="form-control chat_input" id="search_prod" type="text" placeholder="Search for  name / Mobile no or Amount">
                    </div>

                </form>
            <div class="" id="trans_list" style="padding-top: 18%">
                <?php 
                    $get_notifications = "SELECT * FROM selling inner join customer on customer.c_id = selling.c_id limit 1 ";
                    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
                    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
                   $res = $conn->query($get_notifications);
                   $numrows = mysqli_num_rows($res);
                   if($numrows > 0)
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
                           
                           

                echo '<div class="ba-bill-pay-inner trans pd-top-0px" style="padding: 10px" id="'.$data['trans_id'].'">
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
            
         </div>

         <?php 
            echo $loadmore;
         ?>
  </div>
    <!-- transaction End -->

<?php include "footer.php";?>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">


          $("#search_prod").on("keyup",function () 
        
       {
           
           var search_text = $("#search_prod").val();
           if(search_text == ''){
            window.location.href="transaction.php";
           }
           else
           {
            $.ajax({
                     url: 'get/search_prod_manage.php',
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

           

               var lastId = $(".trans:last").attr("id");

               $.ajax({

                           url: 'get/get_transaction.php?lastId=' + lastId,

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

       
        $(".view_trans_details").click(function () {

            var trans_id = $(this).data('userid');
            
            $.ajax({
                type: "POST",
                data: {
                    "trans_id": trans_id
                },
                url: "get/get_trans_data_modal.php",
                success: function(data) {
                    console.log(data);
                    $("#modal_data").html(data);

                }
            });
            
            
        })
            
      
    </script>

</body>

</html>