<h2 style='mb-15 font-weight-bold' style='padding:20px'>Change Your Password</h2>

<form action="" method="post">
    <div class="form-group">
        <label>Enter Current Password:</label>
        <input type="password" name="current_pass" class="form-control col-7" required/>
    </div>
    
    <div class="form-group">
        <label>Enter New Password:</label>
        <input type="password" name="new_pass" class="form-control col-7" required/>
    </div>
    
    <div class="form-group">
        <label>Confirm New Password:</label>
        <input type="password" name="new_pass_again" class="form-control col-7" required/>
    </div>
    
    <div class="form-group">                        
        <input type="submit" name="change_pass"  value="Change Password" class="btn btn-secondary"/>
    </div>
</form>

<?php
include("includes/db.php");

if(isset($_POST['change_pass']))
{
    $user = $_SESSION['customer_email'];
    
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];
    
    $sel_pass = "select * from customers where customer_email='$user'";
    
    $run_pass = mysqli_query($con, $sel_pass);
    
    $check_pass = mysqli_num_rows($run_pass);
    
    if($check_pass == 0)
    {
        $data = mysqli_fetch_array($run_pass);
        
        if(!password_verify($current_pass, $data['customer_pass']))
        {
            echo "<script>alert('Your input does not match your current password. Please try again!')</script>";
        }        
    }
    
    if($check_pass > 0)
    {
        $data = mysqli_fetch_array($run_pass);
        
        $customer_id = $data['customer_id'];
        
        if(password_verify($current_pass, $data['customer_pass']))
        {
            if($new_pass != $new_again)
            {
                echo "<script>alert('Your new password inputs don't match. Please try again!)</script>";
                exit();
            }            
            if($new_pass == $new_again)
            {
                $hash_update = password_hash($new_pass, PASSWORD_DEFAULT);
                
                $sel_update = "UPDATE customers SET customer_pass='$hash_update' where customer_id='$customer_id'";
                
                $run_update = mysqli_query($con, $sel_update);
            }            
            if($run_update)
            {
                echo "<script>alert('You have updated your password successfully!')</script>";
                echo "<script>window.open('my_account.php','_self')</script>";
            }
        }
    }
}

    



?>