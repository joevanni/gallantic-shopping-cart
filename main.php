<?php
isset($_SESSION["user_name"]); 
 
require_once 'library/config.php';
require_once 'library/category-functions.php';
require_once 'library/product-functions.php';
require_once 'library/cart-functions.php';
require_once 'admin/library/functions.php';
if (isset($_GET['function'])){
      doLogout();
}
 
 
$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;

require_once 'include/header.php';

?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<style>
    #form
    {
        
    }
</style>
<!-- Shell -->	
<div class="shell">
     <div id="signup" style='color:red;'>
         <?php
if(isset( $_SESSION["user_name"]) &&  $_SESSION["user_name"]!="")
{
   echo('<a href="?function">Logout</a></br> WElCOME '); 
           echo  $_SESSION["user_name"]; 
}
else
{
      echo('<a href="http://localhost/cart/admin/login_new.php">login</a>/<a href="register.php">register</a> ');
}
?>
        
        </div>	
    <div id="wrapper">
	<style>
            .error {
    color: #FF0000;
}
            #signup{
                float:right;
            }
                #wrapper{
                float:right;
            }
           </style> 
	<!-- Header -->	
       <div id= "container">
	<div id="header">
		<h1 id="logo"><a href="#">shoparound</a></h1>	
		
		<!-- Cart -->
		<div id="cart">
					  <div class="cl">&nbsp;</div>
		</div>
		<div align="right">
		  <!-- End Cart -->
		  
		  <!-- Navigation -->
	    </div>
		<div id="navigation">
		  <div align="right">
		    <ul>
		      <li><a href="main.php" class="active">Home</a></li>
		      <li><a href="checkout.php">Checkout</a></li>
		      <li><a href="cart.php">Cart</a></li>
		      <li><a href="profile.php">About Us</a></li>
	        </ul>
	      </div>
	    </div>
		<!-- End Navigation -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;
		  <form id="form1" name="form1" method="post" action="">
		    <label for="search"></label>
		  </form>
		</div>
		
		<!-- Content -->
		<div id="content">
			
			<!-- Content Slider -->
			<div id="slider" class="box">
				<div id="slider-holder">
					<ul>
					    <li><a href="#"><img src="css/images/slide1.jpg" alt="" /></a></li>
                       
					    <li><a href="#"><img src="css/images/slide2.jpg" alt="" /></a></li>
                        
                        <li><a href="#"><img src="css/images/slide3.jpg" alt="" /></a></li>
                        
                        <li><a href="#"><img src="css/images/slide4.jpg" alt="" width="700" /></a></li>
					</ul>
				</div>
				<div id="slider-nav">
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
				</div>
			</div>
			<!-- End Content Slider -->
			
			<!-- Products -->
			<div class="products">
<!--				<div class="cl">&nbsp;</div>
				<ul>
				    <li>
				    	<a href="#"><img src="css/images/big1.jpg" alt="" /></a>
				    	<div class="product-info">
				    		<h3>LOREM IPSUM</h3>
				    		<div class="product-desc">
								<h4>WOMEN’S</h4>
				    			<p>Lorem ipsum dolor sit<br />amet</p>
				    			<strong class="price">$58.99</strong>
				    		</div>
				    	</div>
			    	</li>
			    	<li>
				    	<a href="#"><img src="css/images/big1.jpg" alt="" /></a>
				    	<div class="product-info">
				    		<h3>LOREM IPSUM</h3>
				    		<div class="product-desc">
								<h4>WOMEN’S</h4>
				    			<p>Lorem ipsum dolor sit<br />amet</p>
				    			<strong class="price">$58.99</strong>
				    		</div>
				    	</div>
			    	</li>
			    	<li class="last">
				    	<a href="#"><img src="css/images/big1.jpg" alt="" /></a>
				    	<div class="product-info">
				    		<h3>LOREM IPSUM</h3>
				    		<div class="product-desc">
								<h4>WOMEN’S</h4>
				    			<p>Lorem ipsum dolor sit<br />amet</p>
				    			<strong class="price">$58.99</strong>
				    		</div>
				    	</div>
			    	</li>
				</ul>
				<div class="cl">&nbsp;</div>-->
  <td>
<?php
if ($pdId) {
	require_once 'include/productDetail.php';
} else if ($catId) {
	require_once 'include/productList.php';
} else {
	require_once 'include/categoryList.php';
}
?>  
 
  </td>
<!--  <td width="130" align="center"><?php require_once 'include/miniCart.php'; ?></td>-->
 
		  </div>
			<!-- End Products -->
			
		</div>
		<!-- End Content -->
		
		<!-- Sidebar -->
		<div id="sidebar">
			
			<!-- Search -->
<!--			<div class="box search">
				<h2>Search by <span></span></h2>
				<div class="box-content">
					<form action="" method="post">
						
						<label>Keyword</label>
						<input type="text" class="field" />
						
						<label>Category</label>
						<select class="field">
							<option value="">-- Select Category --</option>
						</select>
						
						<div class="inline-field">
							<label>Price</label>
							<select class="field small-field">
								<option value="">$10</option>
							</select>
							<label>to:</label>
							<select class="field small-field">
								<option value="">$50</option>
							</select>
						</div>
						
						<input type="submit" class="search-submit" value="Search" />
						
						<p>
							<a href="#" class="bul">Advanced search</a><br />
							<a href="#" class="bul">Contact Customer Support</a>
						</p>
	
					</form>
				</div>
			</div>
			 End Search -->
			
			<!-- Categories -->
			<div class="box categories">
				<h2>Categories <span></span></h2>
				<div class="box-content">
                                    <?php
// define variables and initialize with empty values
$nameErr = $addrErr = $passErr = $emailErr = $phoneErr  = "";
$name = $pass = $address = $email = $phone = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user"])) {
        $nameErr = "Missing";
    }
    else {
        $name = $_POST["user"];
    }
 if (empty($_POST["pass"])) {
        $passErr = "Missing";
    }
    else {
        $pass = $_POST["pass"];
    }
    if (empty($_POST["address"])) {
        $addrErr = "Missing";
    }
    else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"]))  {
        $emailErr = "Missing";
    }
    else {
        $email = $_POST["email"];
    }

    if (!isset($_POST["phone"])) {
        $phoneErr = "missing";
    }
    else {
        $phone = $_POST["phone"];
    }
 $q = "INSERT INTO tbl_user(user_name,user_password,email,address,phone,user_regdate) VALUES ('$name', '$pass','$email', '$address', '$phone',NOW())";
      $sucess='sucess registered';
       $result = mysql_query($q);
       
   
    
}
?>
 
<?php
require_once 'include/leftNav.php';
?>
                              <?php                            
                            if(isset( $_SESSION["user_name"])&& $_SESSION["user_name"]!="")
{  echo' ';  
                                }
                                else{
                                     echo '<div id="form">
                               
<h1>Register</h1>

<form method="POST" action=" echo htmlspecialchars($_SERVER["PHP_SELF"]);">
<table cellspacing="1" cellpadding="1" border="2">
<tr><td>Username:</td><td><input type="text" name="user"
 value="">
<span class="error"><?php echo $nameErr;?></span></td></tr>
<tr><td>Password:</td><td><input type="text" name="pass"
 value="">
<span class="error"><?php echo $passErr;?></span></td></tr>
<tr><td>Email:</td><td><input type="text" name="email"
 value="">
<span class="error"><?php echo $emailErr;?></span></td></tr>
<tr><td>Address:</td><td><input type="text" name="address"
 value="">
<span class="error"><?php echo $addrErr;?></span></td></tr>
<tr><td>Phone:</td><td><input type="text" name="phone"
 value="">
<span class="error"><?php echo $phoneErr;?></span></td></tr>
<tr><td colspan="2" align="right"><input type="submit" value="Join!"></td></tr>
 </table>
</form>
</div>  

                                    '; }
                                ?>
                              
                                
<script type="text/javascript">

function regvalidate()
{
var uname = document.regform.user.value;  
var upass = document.regform.pass.value; 
var uemail = document.regform.email.value; 
var atpos=uemail.indexOf("@");
var dotpos=uemail.lastIndexOf(".");
if(uname==null || uname=="")
   {
    alert("User  name must be filled out");
 return false;
   }
 else if(upass==null || upass == "")
   {
    alert("Please Fill Password ");
      return ;
   }
   else if (upass.length<4)
    {
     alert("Password must be greater than 4 character");
       return ;
    }
 else if(uemail==null || uemail=="")
   {
    alert("Email must be filled out");
   return;
   }
 else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=uemail.length)
  {
  alert("Not a valid e-mail address");
 return;
  }
  else{
      submit();
  }
  
  
}
</script>

				</div>
			</div>
			<!-- End Categories -->
			
		</div>
		<!-- End Sidebar -->
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	
	<!-- Side Full -->
	<div class="side-full">
		
		<!-- More Products -->
		<div class="more-products">
			<div class="more-products-holder">
				<ul>
               
				    <li><a href="#"><img src="images/t1.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/t2.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/t3.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/t4.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/t5.jpg" alt="" width="97" height="100"/></a></li>
				    <li><a href="#"><img src="images/t6.jpg" alt="" width="97" height="100" /></a></li>
                    <li><a href="#"><img src="images/t7.jpg" alt="" width="97" height="100"/></a></li>
				    <li><a href="#"><img src="images/polo2.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/polo3.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/polo4.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/polo5.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/polo6.jpg" alt="" width="97" height="100" /></a></li>
				    <li><a href="#"><img src="images/polo7.jpg" alt="" width="97" height="100" /></a></li>
				    </li>
				</ul>
			</div>
			<div class="more-nav">
				<a href="#" class="prev">previous</a>
				<a href="#" class="next">next</a>
			</div>
		</div>
		<!-- End More Products -->
		
		<!-- Text Cols -->
		<div class="cols">
			<div class="cl">&nbsp;</div>
			<div class="col">
				<h3 class="ico ico1">Essenxa Branches</h3>
                <p>Lacson St., Bacolod City</p>
                <p>Talisay, Bacolod City</p>
                <p>&nbsp;</p>
				<p class="more">&nbsp;</p>
		  </div>
			<div class="col">
				<h3 class="ico ico2">Call Us</h3>
                <p>Phone no.: 704-70-85</p>
                <p>Cell No.: 09231084427</p>
                <p>Web: Essenxa@yahoo.com</p>
				<p class="more">&nbsp;</p>
			</div>
		  <div class="col">
				<h3 class="ico ico3">Essenxa Branches</h3>
                <p>LacsonSt., Bacolod City</p>
                <p>Talisay, Bacolod City</p>
                <p>&nbsp;</p>
                <p class="more">&nbsp;</p>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Text Cols -->
		
	</div>
    </div>
	<!-- End Side Full -->
	
	<!-- Footer -->
	<div id="footer">
	     
 
		<p class="right">
			&copy; 2015 Essenxa.com</p>
	</div>
	<!-- End Footer -->
	</div>
	
<!-- End Shell -->
</div>		
	
</body>
</html>