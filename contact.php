  <?php include "dbconnect.php";?>
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
                    <div class="page-name">Add Customer</div>
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
    <div class="page-title mg-top-50" style="padding-top: 0px">
        <div class="container">
            <!-- <a class="float-left" href="home.html">Home</a>
            <span class="float-right">Contact</span> -->
        </div>
    </div>
    <!-- page-title end -->

    <!-- contact start -->
    <div class="transaction-area pd-top-36">
        <div class="container">
            <form method="post" id="form_add_customer">
            <div class="signin-area">
                <div class="container">
                    <form class="contact-form-inner">
                        <label class="single-input-wrap">
                            <span>User name*</span>
                            <input type="text" id="cust_name" name="cust_name" placeholder="Customer Name" required>
                        </label>
                        <label class="single-input-wrap">
                            <span>Email Address*</span>
                            <input type="number" id="mobile_no"  name="mobile_no" placeholder="Mobile Number" required>
                        </label>
                        <label class="single-input-wrap">
                            <span>Password*</span>
                            <input type="text" id="address" name="address" placeholder="Address" required>
                        </label>
                        
                                    
                                        <div class="row text-center">
                                            <div class="col-6">
                                        <button type="submit" id="submit" class="btn btn-success" style="margin-left: 2rem;">Save</button>
                        <!--                 <a class="btn-large btn-red" href="#">Cancel</a>
                         -->  </div>
                                    
                                       
                                       <div class="col-6">
                                       <button type="button" class="btn btn-danger">Cancel</button>
                                   </div>
                                          </div>
                    </form>
                </div>
            </div>
            </form>
           
            
               



            
        </div>
    </div>

    <?php include 'scripts.php';?>

    <!-- contact End -->

    <!-- Footer Area -->
    <div class="footer-area mg-top-40">
        
        <div class="container">
            <div class="footer-bottom text-center">
                <ul>
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="all-page.html">
                            <i class="fa fa-file-text"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li>
                        <a href="component.html">
                            <i class="fa fa-plus"></i>
                            <p>Components</p>
                        </a>
                    </li>
                    <li>
                        <a class="menu-bar" href="#">
                            <i class="fa fa-bars"></i>
                            <p>Menu</p>
                        </a>
                    </li>
                    <li>
                        <a href="carts.html">
                            <i class="fa fa-home"></i>
                            <p>My Card</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="assets\js\vendor.js"></script>
    <script src="assets\js\main.js"></script>

</body>

<script type="text/javascript">
          
        
          
         $('#form_add_customer').submit(function(){
            var formData = new FormData($("#form_add_customer")[0]);
            
              $.ajax({
                    type:"POST",
                    url:"submit/add_customer_submit.php",
                    data:formData,
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){

                        if(data == "error")
                        {
                            alert("Customer Not Added !");
                          
                        //window.location.href="contact.php";
                        }
                        else
                        {
                             alert("Customer Added !");
                            //window.location.href="contact.php";
                        }
                    }
                });
           
          return false;   
        }); 

      </script>



        


</html>