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
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
   
    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->

    <!-- navbar end -->
    
    <!-- navbar end -->

    <!-- navbar end -->
    
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="balance-title text-center">
                    <h6>Welcome! <b><?php echo $_SESSION["username"];?></b></h6>
                </div>
                <div class="ba-balance-inner text-center">
                    
            </div>
        </div>
    </div>

     <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Analytics</h3>
                
            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one" style="background-image: url(assets/img/bg/3.png);">
                            <a href="edit_rate.php?id=1"><h6 style="text-align: center;">Todays Rate</h6></a>
                            <h5 style="text-align: center;">
                                <?php
                                 
                                   $query = "SELECT * FROM rates";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["item_rate"];
                                   }}?>
                                       
                                   
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-two" style="background-image: url(assets/img/bg/3.png);">
                            <a href="customer.php"><h6 style="text-align: center;">Send Create</h6></a>

                            <h5 style="text-align: center;">
                                <?php
                                 
                                  $query = "SELECT count(id) as total_ord FROM rates";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["total_ord"];
                                   }}?>
                                       
                                   </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-three" style="background-image: url(assets/img/bg/3.png);">
                            <a href="customer.php"><h6 style="text-align: center;">Receive Create</h6></a>
                            <h5 style="text-align: center;">
                                <?php
                                 
                                  $query = "SELECT * FROM rates";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["item_rate"];
                                   }}?>
                                       
                            </h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-four" style="background-image: url(assets/img/bg/3.png);">
                            <a href="customer.php"><h6 style="text-align: center;">Total Customer</h6></a>
                            <h5 style="text-align: center;">
                                <?php
                                 
                                  $query = "SELECT count(c_id) as total_ord FROM customer";
                                                           
                                  if ($result = $conn->query($query)) 
                                   {
                                  while ($data = $result->fetch_assoc()) 
                                   {
                                    echo $data["total_ord"];
                                   }}?>
                               </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- balance End -->

    <!-- add balance start -->
    <div class="add-balance-area">
        <div class="container">
            
            <div class="ba-add-balance-inner mg-top-40">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <a class="btn btn-blue ba-add-balance-btn" href="customer.php"><i class="fa fa-users"></i>  Customers </a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-red ba-add-balance-btn" href="customer.php"><i class="fa fa-upload"></i>  Send</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-purple ba-add-balance-btn" href="customer.php"> <i class="fa fa-download"></i> Receive</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-green ba-add-balance-btn" href="report.php"> <i class="fa fa-clipboard"></i> Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add balance End -->

    <!-- goal area Start -->
    
    <!-- goal area End -->

    <!-- history start -->
   
    <!-- history End -->

    <!-- cart start -->
    
    <!-- cart End -->

    <!-- transaction start -->
    <div class="transaction-area pd-top-40">
        <div class="container">
              <div class="section-title">
                <h3 class="title">Transactions</h3>
                <a href="#">View All</a>
            </div>
            <ul class="transaction-inner">
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets\img\icon\2.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets\img\icon\3.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets\img\icon\4.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
                <li class="ba-single-transaction">
                    <div class="thumb">
                        <img src="assets\img\icon\5.png" alt="img">
                    </div>
                    <div class="details">
                        <h5>Namecheap Inc.</h5>
                        <p>Domain Purchase</p>
                        <h5 class="amount">-$130</h5>
                    </div>
                </li>
            </ul>
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

</body>

</html>