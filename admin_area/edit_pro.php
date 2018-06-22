<?php

include("includes/db.php");

if(isset($_GET['edit_pro']))
{
    $get_id = $_GET['edit_pro'];
    
    $get_product = "select * from products where product_id='$get_id'";
    
    $run_product = mysqli_query($con, $get_product);
    
    $i = 0;
        
    $row_pro = mysqli_fetch_array($run_product);
    
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_image = $row_pro['product_image']; 
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc'];
    $pro_keywords = $row_pro['product_keywords'];
    $pro_cat = $row_pro['product_cat'];
    
    $get_cat = "select * from categories where cat_id='$pro_cat'";
    
    $run_cat = mysqli_query($con, $get_cat);
    
    $row_cat = mysqli_fetch_array($run_cat);
    
    $category_title = $row_cat['cat_title'];
}

?>
    
     
     <div class="container">
 
        <form action="" method="post" enctype="multipart/form-data">

            <table class="table" align="center" width="795">
                
                    <tr align="center">
                        <td colspan="8"><h2>Edit & Update Product</h2></td>
                    </tr>
                
                
                <tr>
                    <td align="right"><strong>Product Title:</strong></td>
                    <td><input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>"/></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Category:</strong></td>
                    <td>                    
                        <select name="product_cat">                                               
                            <option><?php echo $category_title; ?></option>
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
                    <td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Price:</strong></td>
                    <td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Description:</strong></td>
                    <td><textarea name="product_desc" stylecols="30" rows="10"><?php echo $pro_desc; ?></textarea></td>
                </tr>
                
                <tr>
                    <td align="right"><strong>Product Keywords:</strong></td>
                    <td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_keywords; ?>"/></td>
                </tr>
                
                <tr align="center">                    
                    <td colspan="8"><input type="submit" class="btn btn-success" name="update_product" value="Update Product"/></td>
                </tr>
            
            </table>


         </form>
         
    </div>
 

<?php

    if (isset($_POST['update_product']))
    {
        //Taking text data from the text fields
        $update_id = $pro_id;
        
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
        
        $update_product = "update products set product_cat='$product_cat', product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_image='$product_image', product_keywords='$product_keywords' where product_id='$update_id'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if($run_product)
        {
            echo "<script>alert('Product has been successfully updated!')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
        
    }



?>