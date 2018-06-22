<h2 style='mb-15 font-weight-bold' style='padding:20px'>Are you sure you want to DELETE your account?</h2>
<br>
<form action="" method="post">
    <input type="submit" name="no"  value="No, I've made a mistake" class="btn btn-danger"/>
    <input type="submit" name="yes"  value="Yes, I would like to delete" class="btn btn-success"/>
</form>

<?php 
include("includes/db.php"); 

	$user = $_SESSION['customer_email']; 
	
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	
	echo "<script>alert('Your account has now been deleted. We hope you have enjoyed your time with us')</script>";
	echo "<script>window.open('logout.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('Sorry for the mistake. Your account won't be deleted!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>