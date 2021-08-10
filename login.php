<?php
require 'dbconnect.php';
require 'auth.php';
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
                    <div class="page-name">Sign In</div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- page-title stary -->
    
  
    <!-- page-title end -->

    <!-- singin-area start -->
    <div class="signin-area  mg-top-50">
        <div class="container">
            <h4 class="text-center" style="color: red"><?php echo $error;?></h4>
            <form class="contact-form-inner" method="post" action="<?PHP echo $_SERVER['PHP_SELF'];?>">
                <label class="single-input-wrap">
                    <span>User name *</span>
                    <input type="text" required name="username" id="username">
                </label>
                <label class="single-input-wrap">
                    <span>Password*</span>
                    <input  type="password" required name="password" id="password">
                </label>
                <div class="row text-center">
                    <div class="col-6">
                        <a class="btn btn-dark " href="#">Cancel</a>
                    </div>
                    <div class="col-6">
                        
                        <button type="submit" name="submit" class="btn btn-success">Login</button>
                    </div>
                </div>
                <div class="row  text-center" style="width: 105%">
                    
                    <div class="col-6">
                       <a class="forgot-btn" href="#">Sign up</a>
                    </div>
                    <div class="col-6">
                       <a class="forgot-btn" href="#">Forgot password?</a>
                    </div>
                </div>
                
                
            </form>
        </div>
    </div>
    <!-- singin-area End -->

    <!-- Footer Area -->
    

    <!-- back to top area start -->
    
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets\js\vendor.js"></script>
    <script src="assets\js\main.js"></script>

</body>

</html>