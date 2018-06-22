<!DOCTYPE>
<html>
    
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>4Q Clothing - Admin Panel</title>
        
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
     <!--TinyMCE-->
     <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
     <script>tinymce.init({ selector:'textarea' });</script>
        
    </head>
    
    <body>
    
        <header>
            
            <!--Jumbotron Header-->
            <div class="jumbotron jumbotron-fluid mb-0" style="background-color: #A000E8">

                <!--Jumbotron Header Content-->    
                <div class="container">  
                    <h1 class="display-4 text-white">Admin Panel</h1>
                    <p class="lead text-white">Insert, edit & view products & categories...</p>
                </div>  
                <!--Jumbotron Header Content--> 

            </div>               
            <!--Jumbotron Header-->
            
        </header>
        
        <main>
            
            <div class="container-fluid">
                
                <!--Sidebar-->
                <div class="row d-flex" style="height:150%">
                    <div class="col-sm-2 primary-color text-white my-0">
                        <nav class="nav flex-column">
                            <h4 class="text-center  py-3">Manage Content</h4>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?home_page">Home</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?insert_product">Insert New Product</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?view_products">View All Products</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?insert_cat">Insert New Category</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?view_cats">View All Categories</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?view_customers">View Customers</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?view_orders">View Orders</a>
                            <a class="p-1 nav-link text-white  py-3" href="index.php?view_payments">View Payments</a>
                            <a class="p-1 nav-link text-white  py-3" href="logout.php">Admin Logout</a>
                        </nav>
                    </div>
                    <div class="col-sm-10">
                    <?php
                    if(isset($_GET['home_page']))
                    {
                        include("home_page.php");    
                    }
                        
                    if(isset($_GET['insert_product']))
                    {
                        include("insert_product.php");    
                    }
                    
                    if(isset($_GET['view_products']))
                    {
                        include("view_products.php");    
                    }
                        
                    if(isset($_GET['edit_pro']))
                    {
                        include("edit_pro.php");    
                    }
                        
                    if(isset($_GET['insert_cat']))
                    {
                        include("insert_cat.php");    
                    }
                        
                    if(isset($_GET['view_cats']))
                    {
                        include("view_cats.php");    
                    }
                        
                    if(isset($_GET['edit_cat']))
                    {
                        include("edit_cat.php");    
                    }
                        
                    if(isset($_GET['view_customers']))
                    {
                        include("view_customers.php");    
                    }
                        
                        
                    ?>                        
                    </div>
                </div>
                
            </div>
        
        
        </main>
 
    </body>
    
</html>