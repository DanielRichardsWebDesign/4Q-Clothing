                
<?php
    include("includes/db.php");

    $user = $_SESSION['customer_email'];

    $get_customer = "select * from customers where customer_email='$user'";

    $run_customer = mysqli_query($con, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);
    
        $c_id = $row_customer['customer_id'];
        $name = $row_customer['customer_name'];
        $email = $row_customer['customer_email'];
        $pass = $row_customer['customer_pass'];
        $img = $row_customer['customer_image'];
        $country = $row_customer['customer_country'];
        $city = $row_customer['customer_city'];
        $contact = $row_customer['customer_contact'];
        $address = $row_customer['customer_address'];
    
?>


                <h2 style='mb-15 font-weight-bold' style='padding:20px'>Edit Account</h2>                

                <form class="customer_register.php?c_id=<?php echo $c_id; ?>" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="c_name" class="form-control col-7" value="<?php echo $name; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" name="c_email" class="form-control col-7" value="<?php echo $email; ?>" required/>
                    </div>
                                        
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="c_image" class="form-control-file col-5"/><img src="customer_images/<?php echo $img; ?>" value="<?php echo $img ?>" width="50" height="50"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Country:</label>
                        <select name="c_country" class="form-control col-5" disabled>
                            <option><?php echo $country; ?></option>
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
                        <input type="text" name="c_city" class="form-control col-7" value="<?php echo $city; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Contact No:</label>
                        <input type="text" name="c_contact" class="form-control col-7" value="<?php echo $contact; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" name="c_address" class="form-control col-7" value="<?php echo $address; ?>" required/>
                    </div>
                    
                    <div class="form-group">                        
                        <input type="submit" name="update"  value="Update Account" class="btn btn-secondary"/>
                    </div>                  
                    
                
                </form>
  
            
<?php
    
    if(isset($_POST['update']))
    {
        $ip = getIp();
		
		$customer_id = $c_id;
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer_images/$c_image");
		
		 $update_c = "update customers set customer_name='$c_name', customer_email='$c_email',customer_city='$c_city', customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
    }
    }
    
?>