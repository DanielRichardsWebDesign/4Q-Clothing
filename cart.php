<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");

?>
<html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     
     <title>Pink Haven Clothing - Cart</title>
     
     <!--Stylesheets-->     
     <link rel="stylesheet" href="css/bootstrap.css">        
     <link rel="stylesheet" href="css/mdb.css">        
     <link rel="stylesheet" href="css/style.css">        
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
     <link rel="stylesheet" href="css/custom.css">
     
     <!--Scripts-->
     <!-- JQuery -->
     <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
     <!-- Bootstrap tooltips -->
     <script type="text/javascript" src="js/popper.min.js"></script>
     <!-- Bootstrap core JavaScript -->
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <!-- MDB core JavaScript -->
     <script type="text/javascript" src="js/mdb.min.js"></script>
     
     
 </head>

    <body>

        <header>
        
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar secondary-color">                
                
                    <a class="navbar-brand" href="index.php">
                        <img src="img/banner.jpg" height="30" class="d-inline-block align-top" alt="brand">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!--Navbar-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Page Links-->
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="index.php">Home</a>
                            </li>
                            <li>
                                <a class="nav-link text-white" href="all_products.php">Store</a>
                            </li>
                            
                            <!--Dropdown Links-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <!--Inserts categories from functions.php-->
                                    <?php getCats(); ?>
                                </div>
                            </li>                                                     
                            <!--Dropdown Links-->
                            
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Contact Us</a>
                            </li>
                            <!--Search-->
                            
                                <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
                                    <div class="md-form my-0">
                                        <input class="form-control mr-sm-2" type="text" name="user_query" placeholder="Search" aria-label="Search">
                                        <button type="submit" name="search" value="Search" class="btn btn-secondary mr-sm-2"><i class="fa fa-search fa-2x"></i></button>
                                    </div>
                                </form>                    
                        </ul>
                            <!--Page Links-->
                            
                                        
                            
                        
                            <!--Account-->
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="customer_register.php">Sign Up</a>
                                </li>
                                <li>
                                <?php
                                if(isset($_SESSION['customer_email']))
                                {
                                    $user = $_SESSION['customer_email'];
                          
                                    $get_img = "select * from customers where customer_email='$user'";

                                    $run_img = mysqli_query($con, $get_img);

                                    $row_img = mysqli_fetch_array($run_img);

                                    $c_image = $row_img['customer_image'];
                                    
                                    echo "<a href='customer/my_account.php' class='nav-link'><img src='customer/customer_images/$c_image' class='rounded-circle' width='30' height='30'/></a>";
                                }
                                else
                                {
                                    echo "<a href='checkout.php' class='nav-link'><i class='fa fa-user fa-2x' aria-hidden='true'></i></a>";
                                }
                                
                                        
                                ?>                                  
                                </li>
                                <li>
                                    
                                    <?php
                                    if(isset($_SESSION['customer_email']))
                                    {
                                        $c_email = $_SESSION['customer_email'];
                                        
                                        echo "<p class='navbar-text text-white'><b>$c_email</b></p>";
                                    }
                                       
                                    
                                    
                                    
                                    ?>
                                </li>
                                <li>
                                    <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <p class="navbar-text text-white">Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> </p>
                                </li>
                                <li>
                                    <?php 
                                        if(!isset($_SESSION['customer_email'])){

                                        echo "<a href='checkout.php' class='nav-link text-white'><b>Login</b></a>";

                                        }
                                        else {
                                        echo "<a href='logout.php' class='nav-link text-white'><b>Logout</b></a>";
                                        }
                                    ?>
                                </li>
                                
                                
                            </ul>                                                    
                    </div>
                    <!--Navbar-->
                           
            
            </nav>
            
            <!--Jumbotron Banner-->
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    
                </div>
            </div>
            <!--Jumbotron Banner--> 
            
        </header>
        
        <!--Main Content-->
        <main class="mt-5">
            
            <div id="shopping_cart">
                    
                    
                    
                </div>
            
            <div class="container">
            
            <?php cart(); ?>              
           
                                        
            <?php echo $ip = getIp(); ?>
            
                
            <section id="cart">
                
                <h2 class="mb-5 font-weight-bold text-center">Update Cart or Checkout</h2>
                
                <p class="mb-5">If you want to update the quantity of an item, remove it from the list and add it back to cart with the preferred amount.</p>
                
                
                                    
                
                    <form action="" method="post" enctype="multipart/form-data">
                    
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Remove</th>
                              <th scope="col">Product(s)</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total Price(£)</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                              <?php
                                
                                $total = 0;
                                
                                global $con;

                                $ip = getIp();

                                $sel_price = "select * from cart where ip_add='$ip'";

                                $run_price = mysqli_query($con, $sel_price);


                                while($p_price = mysqli_fetch_array($run_price))
                                {
                                    $pro_id = $p_price['p_id'];
                                    
                                    $pro_qty = $p_price['qty'];

                                    $pro_price = "select * from products where product_id='$pro_id'";

                                    $run_pro_price = mysqli_query($con, $pro_price);


                                    while($pp_price = mysqli_fetch_array($run_pro_price))
                                    {
                                                                                
                                        $product_price = array($pp_price['product_price']);
                                        
                                        $product_title = $pp_price['product_title'];
                                        
                                        $product_image = $pp_price['product_image'];
                                        
                                        $single_price = $pp_price['product_price'] * $pro_qty;

                                        $values = array_sum($product_price) * $pro_qty;
                                        
                                        $total += $values;
                                                             
                              ?>
                            <tr>
                                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
                                <td><?php echo $product_title; ?><br>
                                <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
                                </td>
                                <td><?php echo $pro_qty; ?></td>
                                
                                <?php
                                
//                                    if(isset($_POST['update_cart']))
//                                    {
//                                        $qty = $_POST['qty'];
//                                        
//                                        $ip = getIp();
//                                        
//                                        $update_qty = "update cart set qty='$qty' where ip_add='$ip'";
//                                        
//                                        $run_qty = mysqli_query($con, $update_qty);
//                                        
//                                        $_SESSION['qty'] = $qty;
//                                        
//                                        $total = $total * $qty;
//                                    }
                                
                                ?>                                
                                
                                <td><?php echo "£" . $single_price; ?></td>
                            </tr>
                              
                            
                          <?php }} ?>
                              
                            <tr align="">
                                <td colspan="3"><b>Sub Total:</b></td>
                                <td colspan="3"><b><?php echo "£" . $total; ?></b></td>
                            </tr>
                              
                            <tr align="">
                                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" class="btn btn-danger"/></td>
                                <td><input type="submit" name="continue" value="Continue Shopping" class="btn btn-primary"/></td>
                                <td><a href="checkout.php"><button type="button" class="btn btn-success">Checkout<i class='fa fa-shopping-cart ml-2'></i></button></a></td>
                            </tr>
                              
                          </tbody>
                        </table>
                    
                    </form>
                        
                    <?php
                
                        function updatecart()
                        {
                            
                            global $con;
                            
                            $ip = getIp();

                            if(isset($_POST['update_cart']))
                            {
                                foreach($_POST['remove'] as $remove_id)
                                {
                                    $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

                                    $run_delete = mysqli_query($con, $delete_product);

                                    if($run_delete)
                                    {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }                            
                            }                            
                        }
                        echo @$up_cart = updatecart();
                
                        if(isset($_POST['continue']))
                        {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        
                         
                
                    ?>
                
                
  
            </section>
                
            <hr class="my-5">
            
            </div>
        </main>
        <!--Main Content-->
        
        <!--Footer Content-->
        <footer>
            
            <!--Social Media Buttons-->
                <div class="secondary-color-dark">

                    <div class="container">
                        <!--Grid Row-->
                        <div class="row py-4 d-flex align-items-center">

                            <!--Grid Column-->
                            <div class="col-md-6 col-lg-5 text-center md-left mb-4 mb md-0">
                                <h6 class="mb-0 white-text" style="font-size: 20px">Follow us on social media!</h6>
                            </div>
                            <!--Grid Column-->

                            <!--Grid Column-->
                            <div class="col-md-6 col-lg-7 text-center text-md-right">

                                <!--Facebook-->
                                <a class="fb ic ml-0" href="https://www.facebook.com/malouphoenixcosplay/" target="_blank">
                                    <i class="fa fa-facebook white-text fa-2x mr-4"></i>
                                </a>

                                <!--Twitter-->
                                <a class="tw-ic" href="#" target="_blank">
                                    <i class="fa fa-twitter white-text fa-2x mr-4"></i>
                                </a>
                                
                                <!--Instagram-->
                                <a class="in-ic" href="https://www.instagram.com/malouphoenix/?hl=en" target="_blank">
                                    <i class="fa fa-instagram white-text fa-2x mr-4"></i>
                                </a>

                                <!--YouTube-->
                                <a class="yt-ic" href="https://www.youtube.com/channel/UCE2wyK6YEJ1Fl2WmNE0Sx1Q" target="_blank">
                                    <i class="fa fa-youtube-play white-text fa-2x mr-4"></i>
                                </a>

                            </div>
                            <!--Grid Column-->

                        </div>                    
                    </div>

                </div>
                <!--Social Media Buttons-->
            
            <footer class="page-footer font-small stylish-color pt-4 mt-0">                

                <!--Footer Links-->
                <div class="container mt-5 mb-4 text-center text-md-left">
                    <div class="row mt-3">

                        <!--First column-->
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Pink Haven Clothing</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>You can access cosplay photos, art projects and vlogs from here.</p>
                        </div>
                        <!--/.First column-->

                        <!--Second column-->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Links</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>
                                <a href="gallery.html">Cosplay</a>
                            </p>
                            <p>
                                <a href="#!">Art Projects</a>
                            </p>
                            <p>
                                <a href="#!">Vlogs</a>
                            </p>                        
                        </div>
                        <!--/.Second column-->                   

                        <!--Third column-->
                        <div class="col-md-4 col-lg-3 col-xl-3">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Contact</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">                       
                            <p>
                                <i class="fa fa-envelope mr-3"></i>Meforts7@gmail.com</p>                            
                        </div>
                        <!--/.Third column-->

                    </div>
                </div>
                <!--/.Footer Links-->


                <!--Copyright-->
                <div class="footer-copyright py-3 text-center">            
                    @2018 Copyright:
                    <a href="index.html">Malou-Phoenix-Cosplay.com</a><br>
                    This website was created by:
                    <a href="https://www.facebook.com/pg/DanielRichardsWebDesign">Daniel Richards Web Design</a>
                </div>
                <!--Copyright-->

            </footer>
        </footer>
        <!--Footer Content-->



    </body>
    
</html