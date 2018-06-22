<?php

include("includes/db.php");

if(isset($_GET['edit_cat']))
{
    $get_id = $_GET['edit_cat'];
    
    $get_cat = "select * from categories where cat_id='$get_id'";
    
    $run_get = mysqli_query($con, $get_cat);
    
    $row_cat = mysqli_fetch_array($run_get);
    
    
    $cat_id = $row_cat['cat_id'];    
    $cat_title = $row_cat['cat_title'];
}

?>

<div class="container">    
    
    <form action="" method="post" align="center" style="padding:40px;">
        <h2 class="text-center">Edit Category</h2>
        <b>Edit Category:</b>
        <input type="text" name="edit_cat" required value="<?php echo $cat_title; ?>"/>
        <input type="submit" class="btn btn-success" name="update_cat" value="Update Category"/>
    </form>

</div>

<?php

if(isset($_POST['update_cat']))
{
    $edit_cat = $_POST['edit_cat'];

    $update_cat = "update categories set cat_title='$edit_cat' where cat_id='$cat_id'";

    $run_cat = mysqli_query($con, $update_cat);

    if($run_cat)
    {
        echo "<script>alert('Category has been successfully updated!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>