<?php include "dbconnect.php";?>

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
        <form class="search-form">
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
                    <a class="menu-back-page" href="index.php">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
                <div class="col-sm-4 col-6 text-center">
                    <div class="page-name">Edit Rate </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- page-title stary -->
    <div class="page-title mg-top-50" style="padding-top: 0px">
        <div class="container">
            <!-- <a class="float-left" href="home.html">Home</a>
            <span class="float-right">Contact</span> -->
        </div>
    </div>
    <!-- page-title end -->

    <!-- contact start -->
    <div class="cart-area pd-top-36">
        <div class="container">
            
            <div class="ba-cart-inner mb-3 " style="width: 48%;display: inline-block;margin: unset;background-image: url(assets/img/bg/4.png);">
              


                
                <div class="row" style="justify-content: center;">
                   <i class="fa fa-shopping-cart" style=" font-size: 4rem; color: #fff"></i>
                </div>
                <a href="edit_sale_rate.php"><p class="text-center" style="font-size: 1.2rem;font-weight: bold">Sale<br/>

                   <?php
                                 
                                   $query = "SELECT * FROM rates";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["minimum_sell_rate"];
                                   }}?>



                  </p></a>
            </div>

            <div class="ba-cart-inner mb-3 " style="width: 48%;display: inline-block;margin: unset;background-image: url(assets/img/bg/10.png);">
                <div class="row" style="justify-content: center;">
                   <i class="fa fa-credit-card"  style=" font-size: 4rem; color: #fff"></i>
                </div>
                <a href="edit_purchase_rate.php"><p class="text-center" style="font-size: 1.2rem;font-weight: bold">Purchase<br/>

                  <?php
                                 
                                   $query = "SELECT * FROM rates";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["min_purchase_price"];
                                   }}?>
                </p></a>


            </div>

            
        </div>
    </div>

    <?php include 'scripts.php';?>

    <!-- contact End -->

    <!-- Footer Area -->
    <?php include 'footer.php';?>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets\js\vendor.js"></script>
    <script src="assets\js\main.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</body>

<script type="text/javascript">
          
        
          
         $('#form_edit_rate').submit(function(){
              var formData = new FormData($("#form_edit_rate")[0]);
               $.ajax({
                    type:"POST",
                    url:"edit/edit_rate_submit.php",
                    data:formData,
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){
                        swal('Rates Updated!','','success').then((value) => {
                  window.location.href='index.php';
                });

                     //
                    }
                });
              return false;
          });
           
          // return false;   
        

      </script>
      </html>