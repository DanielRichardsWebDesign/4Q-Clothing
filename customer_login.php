<?php

include("includes/db.php");

?>


<div class="table-responsive">

    <form method="post" action="">
    
        <table class="" width="550" align="center">
        
            <tr align="center">
                <td colspan="3"><strong><h2>Login or Register to Buy!</h2></strong></td>
            </tr>
            
            <tr>
                <td align="right"><b>Email:</b></td>
                <td><input type="text" class="form-control" name="email" placeholder="name@example-email.com" required></td>
            </tr>
            
            <tr>
                <td align="right"><b>Password:</b></td>
                <td><input type="password" class="form-control" name="pass" placeholder="Enter Password" required/></td>
            </tr>
            
            <tr align="center">
                <td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
            </tr>
            
            <tr align="center">
                <td colspan="3"><input type="submit" class="btn btn-secondary" name="login" value="Login"/></td>
            </tr>
            
        </table>
        
        <h2 style="padding-right:10px; text-align:center;"><a href="customer_register.php" style="text-decoration:none;">Not got an account? Register now!</a></h2>
    
    </form>

</div>

<?php
    if(isset($_POST['login']))
    {
       $c_email = $_POST['email'];
       $c_pass = $_POST['pass']; 
        
       $sel_c = "SELECT * FROM customers WHERE customer_email='$c_email'";
        
       $run_c = mysqli_query($con, $sel_c);
       
       $sel_cart = "select * from cart where ip_add='$ip'";
		
       $run_cart = mysqli_query($con, $sel_cart); 
		
       $check_cart = mysqli_num_rows($run_cart);      
           
       if($run_c->num_rows == 0)
       {
            $data = mysqli_fetch_array($run_c);
            
            if(!password_verify($c_pass, $data['customer_pass']))
            {
                echo "<script>alert('Your email or password is incorrect. Please try again!')</script>"; 
                exit();
            }
       }
               
       if($run_c->num_rows > 0)
       {
            $data = mysqli_fetch_array($run_c);
            
            if(password_verify($c_pass, $data['customer_pass']) AND $check_cart == 0)
            {
                $_SESSION['customer_email'] = $c_email;
                
                echo "<script>alert('You have logged in successfully!')</script>";
                echo "<script>window.open('customer/my_account.php','_self')</script>";
            }
            else
            {
                if(password_verify($c_pass, $data['customer_pass']) AND $check_cart > 0)
                {
                    $_SESSION['customer_email'] = $c_email;

                    echo "<script>alert('You have logged in successfully!')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
            }
       }
    }
     
     
     
     
?>