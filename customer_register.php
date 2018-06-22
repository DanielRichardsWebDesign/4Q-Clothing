<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");
include("includes/db.php");

?>
<html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     
     <title>Pink Haven Clothing - Register</title>
     
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
     
     
 </head>

    <body>

        <header>
        
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar secondary-color">                
                
                    <a class="navbar-brand" href="index.php">
                        <img src="img/banner.jpg" height="30" class="d-inline-block align-top" alt="brand">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <!--Navbar-->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Page Links-->
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="index.php">Home</a>
                            </li>
                            <li>
                                <a class="nav-link text-white" href="all_products.php">Store</a>
                            </li>
                            
                            <!--Dropdown Links-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <!--Inserts categories from functions.php-->
                                    <?php getCats(); ?>
                                </div>
                            </li>                                                     
                            <!--Dropdown Links-->
                            
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Contact Us</a>
                            </li>
                            <!--Search-->
                            
                                <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
                                    <div class="md-form my-0">
                                        <input class="form-control mr-sm-2" type="text" name="user_query" placeholder="Search" aria-label="Search">
                                        <button type="submit" name="search" value="Search" class="btn btn-secondary mr-sm-2"><i class="fa fa-search fa-2x"></i></button>
                                    </div>
                                </form>                    
                        </ul>
                            <!--Page Links-->
                            
                                        
                            
                        
                            <!--Account-->
                            <ul class="nav navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="customer_register.php">Sign Up</a>
                                </li>
                                <li>
                                <?php
                                if(isset($_SESSION['customer_email']))
                                {
                                    $user = $_SESSION['customer_email'];
                          
                                    $get_img = "select * from customers where customer_email='$user'";

                                    $run_img = mysqli_query($con, $get_img);

                                    $row_img = mysqli_fetch_array($run_img);

                                    $c_image = $row_img['customer_image'];
                                    
                                    echo "<a href='customer/my_account.php' class='nav-link'><img src='customer/customer_images/$c_image' class='rounded-circle' width='30' height='30'/></a>";
                                }
                                else
                                {
                                    echo "<a href='checkout.php' class='nav-link'><i class='fa fa-user fa-2x' aria-hidden='true'></i></a>";
                                }
                                
                                        
                                ?>
                                </li>
                                <li>
                                    
                                    <?php
                                    if(isset($_SESSION['customer_email']))
                                    {
                                        $c_email = $_SESSION['customer_email'];
                                        
                                        echo "<p class='navbar-text text-white'><b>$c_email</b></p>";
                                    }
                                       
                                    
                                    
                                    
                                    ?>
                                </li>
                                <li>
                                    <a href="cart.php" class="nav-link"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <p class="navbar-text text-white">Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> </p>
                                </li>
                                <li>
                                    <?php 
                                        if(!isset($_SESSION['customer_email'])){

                                        echo "<a href='checkout.php' class='nav-link text-white'><b>Login</b></a>";

                                        }
                                        else {
                                        echo "<a href='logout.php' class='nav-link text-white'><b>Logout</b></a>";
                                        }
                                    ?>
                                </li>
                                
                                
                            </ul>                                                    
                    </div>
                    <!--Navbar-->
                           
            
            </nav>
            
            <!--Jumbotron Banner-->
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    
                </div>
            </div>
            <!--Jumbotron Banner--> 
            
        </header>
        
        <!--Main Content-->
        <main class="mt-5">
            
            <div id="shopping_cart">
                    
                    
                    
                </div>
            
            <div class="container">
            
            <?php cart(); ?>              
           
            
            <!--Product Carousel-->
            <section id="carousel" class="">
                
                <div class="container">
            
                    
                
                </div>
                
            </section>
            <!--Product Carousel-->
                
            <?php echo $ip = getIp(); ?>
            
                
            <section id="register">
                
                <h2 class="mb-5 font-weight-bold text-center">Register for an Account</h2>               
                
                <form class="customer_register.php" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="c_name" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" name="c_email" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="c_pass" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="c_image" class="form-control-file col-3" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Country:</label>
                        <select name="c_country" class="form-control col-3">
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                            <option>American Samoa</option>
                            <option>Andorra</option>
                            <option>Angola</option>
                            <option>Anguilla</option>
                            <option>Antigua &amp; Barbuda</option>
                            <option>Argentina</option>
                            <option>Armenia</option>
                            <option>Aruba</option>
                            <option>Australia</option>
                            <option>Austria</option>
                            <option>Azerbaijan</option>
                            <option>Bahamas</option>
                            <option>Bahrain</option>
                            <option>Bangladesh</option>
                            <option>Barbados</option>
                            <option>Belarus</option>
                            <option>Belgium</option>
                            <option>Belize</option>
                            <option>Benin</option>
                            <option>Bermuda</option>
                            <option>Bhutan</option>
                            <option>Bolivia</option>
                            <option>Bonaire</option>
                            <option>Bosnia &amp; Herzegovina</option>
                            <option>Botswana</option>
                            <option>Brazil</option>
                            <option>British Indian Ocean Ter</option>
                            <option>Brunei</option>
                            <option>Bulgaria</option>
                            <option>Burkina Faso</option>
                            <option>Burundi</option>
                            <option>Cambodia</option>
                            <option>Cameroon</option>
                            <option>Canada</option>
                            <option>Canary Islands</option>
                            <option>Cape Verde</option>
                            <option>Cayman Islands</option>
                            <option>Central African Republic</option>
                            <option>Chad</option>
                            <option>Channel Islands</option>
                            <option>Chile</option>
                            <option>China</option>
                            <option>Christmas Island</option>
                            <option>Cocos Island</option>
                            <option>Colombia</option>
                            <option>Comoros</option>
                            <option>Congo</option>
                            <option>Cook Islands</option>
                            <option>Costa Rica</option>
                            <option>Cote D'Ivoire</option>
                            <option>Croatia</option>
                            <option>Cuba</option>
                            <option>Curacao</option>
                            <option>Cyprus</option>
                            <option>Czech Republic</option>
                            <option>Denmark</option>
                            <option>Djibouti</option>
                            <option>Dominica</option>
                            <option>Dominican Republic</option>
                            <option>East Timor</option>
                            <option>Ecuador</option>
                            <option>Egypt</option>
                            <option>El Salvador</option>
                            <option>Equatorial Guinea</option>
                            <option>Eritrea</option>
                            <option>Estonia</option>
                            <option>Ethiopia</option>
                            <option>Falkland Islands</option>
                            <option>Faroe Islands</option>
                            <option>Fiji</option>
                            <option>Finland</option>
                            <option>France</option>
                            <option>French Guiana</option>
                            <option>French Polynesia</option>
                            <option>French Southern Ter</option>
                            <option>Gabon</option>
                            <option>Gambia</option>
                            <option>Georgia</option>
                            <option>Germany</option>
                            <option>Ghana</option>
                            <option>Gibraltar</option>                            
                            <option>Greece</option>
                            <option>Greenland</option>
                            <option>Grenada</option>
                            <option>Guadeloupe</option>
                            <option>Guam</option>
                            <option>Guatemala</option>
                            <option>Guinea</option>
                            <option>Guyana</option>
                            <option>Haiti</option>
                            <option>Hawaii</option>
                            <option>Honduras</option>
                            <option>Hong Kong</option>
                            <option>Hungary</option>
                            <option>Iceland</option>
                            <option>India</option>
                            <option>Indonesia</option>
                            <option>Iran</option>
                            <option>Iraq</option>
                            <option>Ireland</option>
                            <option>Isle of Man</option>
                            <option>Israel</option>
                            <option>Italy</option>
                            <option>Jamaica</option>
                            <option>Japan</option>
                            <option>Jordan</option>
                            <option>Kazakhstan</option>
                            <option>Kenya</option>
                            <option>iribati</option>
                            <option>Korea North</option>
                            <option>Korea South</option>
                            <option>Kuwait</option>
                            <option>Kyrgyzstan</option>
                            <option>Laos</option>
                            <option>Latvia</option>
                            <option>Lebanon</option>
                            <option>Lesotho</option>
                            <option>Liberia</option>
                            <option>Libya</option>
                            <option>Liechtenstein</option>
                            <option>Lithuania</option>
                            <option>Luxembourg</option>
                            <option>Macau</option>
                            <option>Macedonia</option>
                            <option>Madagascar</option>
                            <option>Malaysia</option>
                            <option>Malawi</option>
                            <option>Maldives</option>
                            <option>Mali</option>
                            <option>Malta</option>
                            <option>Marshall Islands</option>
                            <option>Martinique</option>
                            <option>Mauritania</option>
                            <option>Mauritius</option>
                            <option>Mayotte</option>
                            <option>Mexico</option>
                            <option>Midway Islands</option>
                            <option>Moldova</option>
                            <option>Monaco</option>
                            <option>Mongolia</option>
                            <option>Montserrat</option>
                            <option>Morocco</option>
                            <option>Mozambique</option>
                            <option>Myanmar</option>
                            <option>Nambia</option>
                            <option>Nauru</option>
                            <option>Nepal</option>
                            <option>Netherland Antilles</option>
                            <option>Netherlands (Holland, Europe)</option>
                            <option>Nevis</option>
                            <option>New Caledonia</option>
                            <option>New Zealand</option>
                            <option>Nicaragua</option>
                            <option>Niger</option>
                            <option>Nigeria</option>
                            <option>Niue</option>
                            <option>Norfolk Island</option>
                            <option>Norway</option>
                            <option>Oman</option>
                            <option>Pakistan</option>
                            <option>Palau Island</option>
                            <option>Palestine</option>
                            <option>Panama</option>
                            <option>Papua New Guinea</option>
                            <option>Paraguay</option>
                            <option>Peru</option>
                            <option>Philippines</option>
                            <option>Pitcairn Island</option>
                            <option>Poland</option>
                            <option>Portugal</option>
                            <option>Puerto Rico</option>
                            <option>Qatar</option>
                            <option>Republic of Montenegro</option>
                            <option>Republic of Serbia</option>
                            <option>Reunion</option>
                            <option>Romania</option>
                            <option>Russia</option>
                            <option>Rwanda</option>
                            <option>St Barthelemy</option>
                            <option>St Eustatius</option>
                            <option>St Helena</option>
                            <option>St Kitts-Nevis</option>
                            <option>St Lucia</option>
                            <option>St Maarten</option>
                            <option>St Pierre &amp; Miquelon</option>
                            <option>St Vincent &amp; Grenadines</option>
                            <option>Saipan</option>
                            <option>Samoa</option>
                            <option>Samoa American</option>
                            <option>San Marino</option>
                            <option>Sao Tome &amp; Principe</option>
                            <option>Saudi Arabia</option>
                            <option>Senegal</option>
                            <option>Serbia</option>
                            <option>Seychelles</option>
                            <option>Sierra Leone</option>
                            <option>Singapore</option>
                            <option>Slovakia</option>
                            <option>Slovenia</option>
                            <option>Solomon Islands</option>
                            <option>Somalia</option>
                            <option>South Africa</option>
                            <option>Spain</option>
                            <option>Sri Lanka</option>
                            <option>Sudan</option>
                            <option>Suriname</option>
                            <option>Swaziland</option>
                            <option>Sweden</option>
                            <option>Switzerland</option>
                            <option>Syria</option>
                            <option>Tahiti</option>
                            <option>Taiwan</option>
                            <option>Tajikistan</option>
                            <option>Tanzania</option>
                            <option>Thailand</option>
                            <option>Togo</option>
                            <option>Tokelau</option>
                            <option>Tonga</option>
                            <option>Trinidad &amp; Tobago</option>
                            <option>Tunisia</option>
                            <option>Turkey</option>
                            <option>Turkmenistan</option>
                            <option>Turks &amp; Caicos Is</option>
                            <option>Tuvalu</option>
                            <option>Uganda</option>
                            <option>Ukraine</option>
                            <option>United Arab Emirates</option>
                            <option>United Kingdom</option>
                            <option>United States of America</option>
                            <option>Uruguay</option>
                            <option>Uzbekistan</option>
                            <option>Vanuatu</option>
                            <option>Vatican City State</option>
                            <option>Venezuela</option>
                            <option>Vietnam</option>
                            <option>Virgin Islands (Brit)</option>
                            <option>Virgin Islands (USA)</option>
                            <option>Wake Island</option>
                            <option>Wallis &amp; Futana Is</option>
                            <option>Yemen</option>
                            <option>Zaire</option>
                            <option>Zambia</option>
                            <option>Zimbabwe</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" name="c_city" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Contact No:</label>
                        <input type="text" name="c_contact" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" name="c_address" class="form-control col-4" required/>
                    </div>
                    
                    <div class="form-group">                        
                        <input type="submit" name="register"  value="Create Account" class="btn btn-secondary"/>
                    </div>
                
                </form>
  
            </section>
                
            <hr class="my-5">
            
            </div>
        </main>
        <!--Main Content-->
        
        <!--Footer Content-->
        <footer>
            
            <!--Social Media Buttons-->
                <div class="secondary-color-dark">

                    <div class="container">
                        <!--Grid Row-->
                        <div class="row py-4 d-flex align-items-center">

                            <!--Grid Column-->
                            <div class="col-md-6 col-lg-5 text-center md-left mb-4 mb md-0">
                                <h6 class="mb-0 white-text" style="font-size: 20px">Follow us on social media!</h6>
                            </div>
                            <!--Grid Column-->

                            <!--Grid Column-->
                            <div class="col-md-6 col-lg-7 text-center text-md-right">

                                <!--Facebook-->
                                <a class="fb ic ml-0" href="https://www.facebook.com/malouphoenixcosplay/" target="_blank">
                                    <i class="fa fa-facebook white-text fa-2x mr-4"></i>
                                </a>

                                <!--Twitter-->
                                <a class="tw-ic" href="#" target="_blank">
                                    <i class="fa fa-twitter white-text fa-2x mr-4"></i>
                                </a>
                                
                                <!--Instagram-->
                                <a class="in-ic" href="https://www.instagram.com/malouphoenix/?hl=en" target="_blank">
                                    <i class="fa fa-instagram white-text fa-2x mr-4"></i>
                                </a>

                                <!--YouTube-->
                                <a class="yt-ic" href="https://www.youtube.com/channel/UCE2wyK6YEJ1Fl2WmNE0Sx1Q" target="_blank">
                                    <i class="fa fa-youtube-play white-text fa-2x mr-4"></i>
                                </a>

                            </div>
                            <!--Grid Column-->

                        </div>                    
                    </div>

                </div>
                <!--Social Media Buttons-->
            
            <footer class="page-footer font-small stylish-color pt-4 mt-0">                

                <!--Footer Links-->
                <div class="container mt-5 mb-4 text-center text-md-left">
                    <div class="row mt-3">

                        <!--First column-->
                        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Pink Haven Clothing</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>You can access cosplay photos, art projects and vlogs from here.</p>
                        </div>
                        <!--/.First column-->

                        <!--Second column-->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Links</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>
                                <a href="gallery.html">Cosplay</a>
                            </p>
                            <p>
                                <a href="#!">Art Projects</a>
                            </p>
                            <p>
                                <a href="#!">Vlogs</a>
                            </p>                        
                        </div>
                        <!--/.Second column-->                   

                        <!--Third column-->
                        <div class="col-md-4 col-lg-3 col-xl-3">
                            <h6 class="text-uppercase font-weight-bold">
                                <strong>Contact</strong>
                            </h6>
                            <hr class="deep-white accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">                       
                            <p>
                                <i class="fa fa-envelope mr-3"></i>Meforts7@gmail.com</p>                            
                        </div>
                        <!--/.Third column-->

                    </div>
                </div>
                <!--/.Footer Links-->


                <!--Copyright-->
                <div class="footer-copyright py-3 text-center">            
                    @2018 Copyright:
                    <a href="index.html">Malou-Phoenix-Cosplay.com</a><br>
                    This website was created by:
                    <a href="https://www.facebook.com/pg/DanielRichardsWebDesign">Daniel Richards Web Design</a>
                </div>
                <!--Copyright-->

            </footer>
        </footer>
        <!--Footer Content-->



    </body>
    
</html
    
<?php
    
    if(isset($_POST['register']))
    {
        $ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
        
        $hash_pass = password_hash($c_pass, PASSWORD_DEFAULT);
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$hash_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0)
        {
		
		  $_SESSION['customer_email']=$c_email; 
		
		  echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		  echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else 
        {
		
		  $_SESSION['customer_email']=$c_email; 
		
		  echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		  echo "<script>window.open('checkout.php','_self')</script>";
        }
    }
    
?>
    
    
