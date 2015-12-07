<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>$pageTitle</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<script src="js/slider.js" script type="text/javascript"></script>
<script src="js/hover.js" script type="text/javascript"></script>
</head>

<body onload="Load()">
<div id="holder">
<div id="header">
    <div id="home"><a href="index.php">HOME</a></div>
    <div id="about"><a href="#">SPECIALTIES</div></a>
    <div id="specialties"><a href="catalog.php">CATALOG</div></a>
    <div id="catalog"><a href="catalog.html">FAQS</div></a>
    <div id="faqs"><a href="FAQS.html">CONTACT US</div></a>
    <div id="signin"><a href="#">Sign In</a> or <a href="#">Register</a></div>
    <div id="cart"><a href="cart.php"><img src="images/products/cartfinal.png" /></a></div> 
    
  </div>
</div>
 
 
<div class="shell">
	
	<!-- Header -->	
	
		<h1 id="logo"><a href="#">shoparound</a></h1>	
		
		<!-- Cart -->
	  <div id="carts">
			<a href="#" class="cart-link">Your Shopping Cart</a>
		<div class="cl">&nbsp;</div>
		</div>
		<div align="center"><!-- End Cart -->
		  
		  <!-- Navigation -->
	  </div>
		
		<!-- End Navigation -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="cl">&nbsp;</div>
		
		<!-- Content -->
		<div id="contents">
                    <div class="products">
                    <?php
require_once 'library/config.php';
require_once 'library/cart-functions.php';
require_once 'library/checkout-functions.php';

if (isCartEmpty()) {
	// the shopping cart is still empty
	// so checkout is not allowed
	header('Location: cart.php');
} else if (isset($_GET['step']) && (int)$_GET['step'] > 0 && (int)$_GET['step'] <= 3) {
	$step = (int)$_GET['step'];

	$includeFile = '';
	if ($step == 1) {
		$includeFile = 'shippingAndPaymentInfo.php';
		$pageTitle   = 'Checkout - Step 1 of 2';
	} else if ($step == 2) {
		$includeFile = 'checkoutConfirmation.php';
		$pageTitle   = 'Checkout - Step 2 of 2';
	} else if ($step == 3) {
		$orderId     = saveOrder();
		$orderAmount = getOrderAmount($orderId);
		
		$_SESSION['orderId'] = $orderId;
		
		// our next action depends on the payment method
		// if the payment method is COD then show the 
		// success page but when paypal is selected
		// send the order details to paypal
		if ($_POST['hidPaymentMethod'] == 'cod') {
			header('Location: success.php');
			exit;
		} else {
			$includeFile = 'paypal/payment.php';	
		}
	}
} else {
	// missing or invalid step number, just redirect
	header('Location: index.php');
}


?>
<script language="JavaScript" type="text/javascript" src="library/checkout.js"></script>
<?php
require_once "include/$includeFile";
 
?>
	</div>
			<!-- End Products -->
			
		</div>
                	<div id="footer">
	     
 
		<p class="right">
			&copy; 2015 Cart.
			Design by <a href="#" target="_blank" title="">cart.com</a>
		</p>
	</div>
	<!-- End Footer -->
	
</div>	

<!-- End Shell -->