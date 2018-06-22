<div class="container">

    <table class="table" align="center" width="795">
        
        <tr align="center">
            <td colspan="10"><h2>View All Customers</h2></td>
        </tr>
        
        <tr align="center">
            <th>Customer ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>            
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th>Contact</th>            
        </tr>
        
        <?php
        include("includes/db.php");
        
        $get_c = "select * from customers";
        
        $run_c = mysqli_query($con, $get_c);
        
        $i = 0;
        
        while($row_c = mysqli_fetch_array($run_c))
        {
            $customer_id = $row_c['customer_id'];
            $customer_name = $row_c['customer_name'];
            $customer_image = $row_c['customer_image']; 
            $customer_email = $row_c['customer_email'];
            $customer_pass = $row_c['customer_pass'];   
            $customer_country = $row_c['customer_country'];
            $customer_city = $row_c['customer_city'];
            $customer_address = $row_c['customer_address'];
            $customer_contact = $row_c['customer_contact'];
            $i++;
        
        ?>
        
        <tr align="center">
            <td><?php echo $i; ?></td>
            <td><?php echo $customer_name; ?></td>
            <td><img src="../customer/customer_images/<?php echo $customer_image; ?>" width="60" height="60"></td>
            <td><?php echo $customer_email; ?></td>            
            <td><?php echo $customer_country; ?></td>
            <td><?php echo $customer_city; ?></td>
            <td><?php echo $customer_address; ?></td>
            <td><?php echo $customer_contact; ?></td>            
        </tr>
        <?php } ?> 
        
    </table>

</div>