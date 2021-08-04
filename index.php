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
    <div class="header-area" style="background-image: url(assets/img/bg/1.png);">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <div class="menu-bar">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-sm-4 col-4 text-center">
                    <a href="home.html" class="logo">
                        <img src="assets\img\logo.png" alt="logo">
                    </a>
                </div>
                <div class="col-sm-4 col-5 text-right">
                    <ul class="header-right">
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="badge">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="notification.html">
                                <i class="fa fa-bell animated infinite swing"></i>
                                <span class="badge">6</span>
                            </a>
                        </li>
                        <li>
                            <a class="header-user" href="user-setting.html"><img src="assets\img\user.png" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- navbar end -->
    <div class="ba-navbar">
        <div class="ba-navbar-user">
            <div class="menu-close">
                <i class="la la-times"></i>
            </div>
            <div class="thumb">
                <img src="assets\img\user.png" alt="user">
            </div>
            <div class="details">
                <h5>Raduronto kelax</h5>
                <p>ID: 99883323</p>
            </div>
        </div>
        <div class="ba-add-balance-title">
            <h5>Add Balance</h5>
            <p>$458786.00</p>
        </div>
        <div class="ba-add-balance-title style-two">
            <h5>Deposit</h5>
            <i class="fa fa-plus"></i>
        </div>
        <div class="ba-main-menu">
            <h5>Menu</h5>
            <ul>
                <li><a href="index.php">Bankapp Display</a></li>
                <li><a href="all-page.html">Pages</a></li>
                <li><a href="component.html">Components</a></li>
                <li><a href="carts.html">My Cart</a></li>
                <li><a href="user-setting.html">Setting</a></li>
                <li><a href="notification.html">Notification</a></li>
                <li><a href="signup.html">Logout</a></li>
            </ul>
            <a class="btn btn-purple" href="#">View Profile</a>
        </div>
    </div>
    <!-- navbar end -->

    <!-- navbar end -->
    <div class="add-balance-inner-wrap">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="index.html">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Investment (*** 7284)</option>
                                            <option value="1">Savings (*** 5078)</option>
                                            <option value="2">Deposit (*** 2349)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">$</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" value="768">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn-c btn-primary btn-block btn-lg" data-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar end -->

    <!-- balance start -->
    <div class="balance-area pd-top-40 mg-top-50">
        <div class="container">
            <div class="balance-area-bg balance-area-bg-home">
                <div class="balance-title text-center">
                    <h6>Welcome! <br> Dear Mr Suvro - Bankapp Wallet</h6>
                </div>
                <div class="ba-balance-inner text-center">
                    
            </div>
        </div>
    </div>

     <div class="history-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">History</h3>
                <a href="#">View All</a>
            </div>
            <div class="ba-history-inner">
                <div class="row custom-gutters-20">
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-one" style="background-image: url(assets/img/bg/3.png);">
                            <a href="edit_rate.php"><h6>Todays Rate</h6></a>
                            <h5>$58,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-two" style="background-image: url(assets/img/bg/3.png);">
                            <a href="customer.php"><h6>Send Create</h6></a>

                            <h5>
                                <?php
                                  require 'dbconnect.php';
                                  $query = "SELECT count(id) as total_ord FROM rates where id ='$id'";
                                                           
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
                            <a href="customer.php"><h6>Receive Create</h6></a>
                            <h5>$50,968.00</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="ba-single-history ba-single-history-four" style="background-image: url(assets/img/bg/3.png);">
                            <a href="customer.php"><h6>Total Customer</h6></a>
                            <h5>$58.00</h5>
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
                        <a class="btn btn-blue ba-add-balance-btn" href="customer.php">Customer <i class="fa fa-arrow-down"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-red ba-add-balance-btn" href="#">Send <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-purple ba-add-balance-btn" href="#">Receive <i class="fa fa-arrow-down"></i></a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-green ba-add-balance-btn" href="#">Report <i class="fa fa-credit-card-alt "></i></a>
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