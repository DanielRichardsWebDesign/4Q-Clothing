<div class="container">    
    
    <form action="" method="post" align="center" style="padding:40px;">
        <h2 class="text-center">Insert New Category</h2>
        <b>Insert New Category:</b>
        <input type="text" name="new_cat" required/>
        <input type="submit" class="btn btn-success" name="add_cat" value="Insert Category"/>
    </form>

</div>

<?php

include("includes/db.php");

if(isset($_POST['add_cat']))
{
    $new_cat = $_POST['new_cat'];

    $insert_cat = "insert into categories (cat_title) values ('$new_cat')";

    $run_cat = mysqli_query($con, $insert_cat);

    if($run_cat)
    {
        echo "<script>alert('New category has been inserted successfully!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>