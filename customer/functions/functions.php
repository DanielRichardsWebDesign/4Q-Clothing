<?php

    $con = mysqli_connect("localhost","root","","aidansonlineshop");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Gets the user IP Address
    function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

    //Creating the shopping cart
    function cart()
    {
        if (isset($_GET['add_cart']))
        {
            global $con;
            
            $ip = getIp();
            
            $pro_id = $_GET['add_cart'];
            
            $qty = $_POST['qty'];
            
            $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id' AND qty='$qty'";
            
            $run_check = mysqli_query($con, $check_pro);
            
            if(mysqli_num_rows($run_check)>0)
            {
                echo "";
            }
            
            else
            {
                $insert_pro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','$qty')";
                
                $run_pro = mysqli_query($con, $insert_pro);
                
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    
    //Getting total added items
    function total_items()
    {
        if(isset($_GET['add_cart']))
        {
            global $con;
            
            $ip = getIp();
            
            $get_items = "select * from cart where ip_add = '$ip'";
            
            $run_items = mysqli_query($con, $get_items);
            
            $count_items = mysqli_num_rows($run_items);
        }
            
            else
            {
                global $con;
                
                $ip = getIp();
            
                $get_items = "select * from cart where ip_add = '$ip'";
            
                $run_items = mysqli_query($con, $get_items);
            
                $count_items = mysqli_num_rows($run_items);
            }
            echo $count_items;
    }

    
    //Getting the total cost of items added to cart
    function total_price()
    {
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
                $product_price = array($pp_price['product_price'] * $pro_qty);
                
                $values = array_sum($product_price);
                
                $total += $values;
            }
        }
        echo "£" . $total;
    }

    
//    //Getting the total quantity of items added to cart
//    function getProQty()
//    {
//        global $con;
//        
//        $ip = getIp();
//        
//        $total = 0;
//        
//        if(isset($_GET['add_cart']))
//        {
//            $qty = $_GET['qty'];
//            
//            $update_qty = "update cart set qty='$qty'";
//            
//            $run_qty = mysqli_query($con, $update_qty);
//            
//            $_SESSION['qty'] = $qty;
//                                        
//            $total = $total * $qty;            
//        }
//    }
    

    //Get Categories
    function getCats()
    {
        global $con;
        
        $get_cats = "select * from categories";
        
        $run_cats = mysqli_query($con, $get_cats);
        
        while ($row_cats = mysqli_fetch_array($run_cats))
        {
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];
            
            echo "<a class='dropdown-item' href='../index.php?cat=$cat_id'>$cat_title</a>";
        }
    }

    function getPro()
    {
        if(!isset($_GET['cat']))
        {        
        
        global $con;
        
        $get_pro = "select * from products order by RAND() LIMIT 0,6";
        
        $run_pro = mysqli_query($con, $get_pro);
        
        while($row_pro = mysqli_fetch_array($run_pro))
        {
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];            
            $pro_image = $row_pro['product_image'];
            
            echo "
            
                <div class = 'col-md-6 col-lg-4'>
                    <div class = 'card my-3' id = 'single_product'>
                    <form method='post' action='index.php?add_cart=$pro_id''>
                        <img src = 'admin_area/product_images/$pro_image' width='180' height='180' class='card-img-top img-fluid'/>
                        <div class = 'card-block'>
                        <h3 class = 'card-title'>$pro_title</h3>
                        <p><b> Price: £ $pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-danger style='float:left'>Details<i class='fa fa-book ml-2'></i></a>                                             
                        
                        <input type='text' size='5' name='qty' value='1'/><input type='submit' class='btn btn-success' value='Add to Cart'/> 
                    </form>
                        </div>
                    </div>
                </div>
                        
            
            
            ";
        }
    }
    }

    function getCatPro()
    {
        if(isset($_GET['cat']))
        {
            
        $cat_id = $_GET['cat'];
        
        global $con;
        
        $get_cat_pro = "select * from products where product_cat='$cat_id'";
        
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
            
        $count_cats = mysqli_num_rows($run_cat_pro);
            
        
        if($count_cats == 0)
        {
            echo "<h2 style='padding:20px'>No products in this category at the moment. Please try again later.</h2>";
        }
            
        
        while($row_cat_pro = mysqli_fetch_array($run_cat_pro))
        {
            $pro_id = $row_cat_pro['product_id'];
            $pro_cat = $row_cat_pro['product_cat'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];            
            $pro_image = $row_cat_pro['product_image'];
           
            
                echo "

                    <div class = 'col-md-6 col-lg-4'>
                    <div class = 'card my-3' id = 'single_product'>
                    <form method='post' action='index.php?add_cart=$pro_id''>
                        <img src = 'admin_area/product_images/$pro_image' width='180' height='180' class='card-img-top img-fluid'/>
                        <div class = 'card-block'>
                        <h3 class = 'card-title'>$pro_title</h3>
                        <p><b> Price: £ $pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-danger style='float:left'>Details<i class='fa fa-book ml-2'></i></a>                                             
                        
                        <input type='text' size='5' name='qty' value='1'/><input type='submit' class='btn btn-success' value='Add to Cart'/> 
                    </form>
                        </div>
                    </div>
                </div>


                ";
            }
        }
    }

    
    



?>