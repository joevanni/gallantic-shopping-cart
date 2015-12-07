<?php 
if (isset($_post['update_cart'])){
	
	$qty = $_POST['ct_qty'];
	$update_qty=" update cart set txtQty='$ct_qty'";
	$run_qty=mysql_query($update_qty);
	$_SESSION['ct_qty']=$qty;
	$subTotal = $pd_price * $ct_qty;
	
}



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cart</title>
<!--<link href="admin/Admincss/admin2.css" rel="stylesheet" type="text/css" />-->
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
    <div id="cart"><a href="#"><img src="images/products/cartfinal.png" /></a></div> 
    
  </div>
</div>


<?php

 
require_once 'library/config.php';
require_once 'library/cart-functions.php';

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : 'view';

switch ($action) {
	case 'add' :
		addToCart();
		break;
	case 'update' :
		updateCart();
		break;	
	case 'delete' :
		deleteFromCart();
		break;
	case 'view' :
}

$cartContent = getCartContent();
$numItem = count($cartContent);

$pageTitle = 'Shopping Cart';


// show the error message ( if we have any )
displayError();

if ($numItem > 0 ) {
?>

 <table width="780" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr id="entryTableHeader"> 
   <td colspan="2" align="center">Item</td>
   <td width="229" align="center">Unit Price</td>
   <td width="92" align="center">Quantity</td>
   <td width="134" align="center">Total</td>
  <td width="84" align="center">&nbsp;</td>
 </tr>
 <?php
$subTotal = 0;
for ($i = 0; $i < $numItem; $i++) {
	extract($cartContent[$i]);
	$productUrl = "cart.php?c=$cat_id&p=$pd_id";
	$subTotal = $pd_price * $ct_qty;



 
 
     
 
?>
<form action="<?php echo $_SERVER['PHP_SELF'] . "?action=update"; ?>" method="post" name="frmCart" id="frmCart">
 <tr class="content"> 
  <td width="80" align="center"><a href="<?php echo $productUrl; ?>"><img src="<?php echo $pd_thumbnail; ?>" border="0"></a></td>
  <td width="200"><?php echo $pd_name; ?></td>
   <td align="right"><?php echo displayAmount($pd_price); ?></td>
  <td width="92"><p>
   
    <!--<input name="txtQty[]" type="text" id="txtQty[]" size="5" value="--><?php echo $ct_qty ?><!--" class="box" onkeyup="checkNumber(this);" />-->
      
      <input name="hidCartId[]" type="hidden" value="<?php echo $ct_id; ?>">
      <input name="hidProductId[]" type="hidden" value="<?php echo $pd_id; ?>">
      
      
      
      
      
  </p></td>
  <td align="right"><?php echo displayAmount($pd_price * $ct_qty); ?></td>
  <td width="84" align="center"> <input name="btnDelete" type="button" id="btnDelete" value="Delete"  onclick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . "?action=delete&cid=$ct_id"; ?>';"   class="box"> 
  </td>
 </tr>
 <?php
}
?>
 
 </tr>
 <tr class="content"> 
  <td colspan="4" align="right">Sub-total</td>
  <td align="right"><?php echo displayAmount($subTotal); ?></td>
  <td width="84" align="center">&nbsp;</td>
 </tr>
<tr class="content"> 
   <td colspan="4" align="right">Shipping </td>
  <td align="right"><?php echo displayAmount($shopConfig['shippingCost']); ?></td>
  <td width="84" align="center">&nbsp;</td>
 </tr>
<tr class="content"> 
   <td colspan="4" align="right">Total </td>
   <?php $ss=displayAmount($subTotal + $shopConfig['shippingCost']);
 
   ?>
  <td align="right"><?php echo $ss; ?></td>
  <td width="84" align="center">&nbsp;</td>
 </tr>  
 <tr class="content"> 
  <td colspan="5" align="right">&nbsp;</td>
  <td width="84" align="center">
<!--<input name="btnUpdate" type="submit" id="btnUpdate" value="Update Cart"    class="box"></td>-->
 </tr>
</table>
</form>
<?php
} else {
	
?>
<p>&nbsp;</p><table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
 <tr>
  <td><p align="center"><span style="font-weight:bold">Your shopping cart is empty, but it doesn't have to be. </p>There are a lot of great deals and one of a kind items just waiting for you.
   start shopping and look for the "add to cart" button anything you like. You can add several items to your cart from different sellers and pay for them all at once.
   
   </td>
 </tr>
</table>
<?php
}

$shoppingReturnUrl = isset($_SESSION['shop_return_url']) ? $_SESSION['shop_return_url'] : 'main.php';
?>
<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
 <tr align="center"> 
  <td><input name="btnContinue" type="button" id="btnContinue" value="&lt;&lt; Continue Shopping" onClick="window.location.href='<?php echo $shoppingReturnUrl; ?>';" class="box"></td>
<?php 
if ($numItem > 0) {
?>  
  <td><input name="btnCheckout" type="button" id="btnCheckout" value="Proceed To Checkout &gt;&gt;" onClick="window.location.href='checkout.php?step=1';" class="box"></td>
<?php
}
?>  
 </tr>
</table>
<!--  <td>
<?php
if ($pd_id) {
	require_once 'include/productDetail.php';
} else if ($cat_id) {
	require_once 'include/productList.php';
} else {
	require_once 'include/categoryList.php';
}
?>  
  </td>-->
  <td width="130" align="center"><?php require_once 'include/miniCart.php'; ?></td>
 
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
<!--		<div class="more-products">
			<div class="more-products-holder">
				<ul>
				    <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small1.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small2.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small3.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small4.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small5.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/small6.jpg" alt="" /></a></li>
				    <li class="last"><a href="#"><img src="css/images/small7.jpg" alt="" /></a></li>
				</ul>
			</div>
			<div class="more-nav">
				<a href="#" class="prev">previous</a>
				<a href="#" class="next">next</a>
			</div>
		</div>-->
		<!-- End More Products -->
		
		<!-- Text Cols -->
	<!--	<div class="cols">
			<div class="cl">&nbsp;</div>
			<div class="col">
				<h3 class="ico ico1">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col">
				<h3 class="ico ico2">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col">
				<h3 class="ico ico3">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="col col-last">
				<h3 class="ico ico4">Donec imperdiet</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare dui.</p>
				<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Text Cols -->
		

	<!-- End Side Full -->
	
	<!-- Footer -->
	<div id="footer">
	     
 
		<p class="right">
			&copy; 2015 Cart.
			Design by <a href="#" target="_blank" title="">cart.com</a>
		</p>
	</div>
	<!-- End Footer -->
	
</div>	
<!-- End Shell -->
	
	</div>
</body>
</html>