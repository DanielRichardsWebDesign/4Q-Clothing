<?php

include("includes/db.php");

?>
    
     
     <div class="container">
 
        <form action="insert_product.php" method="post" enctype="multipart/form-data">

            <table class="table" align="center" width="795">
                
                    <tr align="center">
                        <td colspan="8"><h2>Insert New Product Here</h2></td>
                    </tr>
                
                
                <tr>
                    <td align="right"><strong>Product Title:</strong></td>
                    <td><input type="text" name="product_title" size="60" required/></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Category:</strong></td>
                    <td>                    
                        <select name="product_cat" required>                                               
                            <option>Select a Category</option>
                            <?php
                                
                                $get_cats = "select * from categories";

                                $run_cats = mysqli_query($con, $get_cats);

                                while ($row_cats = mysqli_fetch_array($run_cats))
                                {
                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            
                            ?>
                        </select>
                    
                    </td>
                </tr>
 
                <tr>
                    <td align="right"><strong>Product Image:</strong></td>
                    <td><input type="file" name="product_image" required/></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Price:</strong></td>
                    <td><input type="text" name="product_price" required/></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Description:</strong></td>
                    <td><textarea name="product_desc" stylecols="30" rows="10"></textarea></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Keywords:</strong></td>
                    <td><input type="text" name="product_keywords" size="50" required/></td>
                </tr>
                
                <tr align="center">                    
                    <td colspan="8"><input type="submit" class="btn btn-success" name="insert_post" value="Create Product"/></td>
                </tr>
            
            </table>


         </form>
         
    </div>
 

<?php

    if (isset($_POST['insert_post']))
    {
        //Taking text data from the text fields
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        
        //Getting image from field
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
        
        //Move uploaded image into a dedicated product image folder        
        move_uploaded_file($product_image_tmp,"product_images/$product_image");
        
        $insert_product = "insert into products (product_cat, product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
        
        $insert_pro = mysqli_query($con, $insert_product);
        
        if($insert_pro)
        {
            echo "<script>alert('Successfully inserted new product to products table!')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
        
    }



?>