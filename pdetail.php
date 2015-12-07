<?php

require_once 'library/config.php';
require_once 'library/category-functions.php';
require_once 'library/product-functions.php';
require_once 'library/cart-functions.php';
$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ormolu Item Details</title>

<link href="css/style2.css" rel="stylesheet" type="text/css" />
<script src="javascript/slideshow.js" script type="text/javascript"></script>
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>



</head>

<!--<body onload="MM_preloadImages('image/catalogdetail2.jpg','image/catalogdetail3.jpg','image/catalogdetail4.jpg','image/catalogdetail5.jpg','image/catalogdetail6.jpg','image/catalogdetail7.jpg','image/catalogdetail8.jpg','image/catalogdetail9.jpg','image/catalogdetail10.jpg','image/catalogdetail11.jpg')" onclick="MM_effectAppearFade('catalogdetail', 1500, 0, 100, false)">
<div id="holder">
<div id="header">
     <div id="home"><a href="index.php">HOME</a></div>
    <div id="about"><a href="#">SPECIALTIES</div></a>
    <div id="specialties"><a href="catalog.php">CATALOG</div></a>
    <div id="catalog"><a href="faqs.php">FAQS</div></a>
    <div id="faqs"><a href="FAQS.html">CONTACT US</div></a>
    <div id="signin"><a href="#">Sign In</a> or <a href="#">Register</a></div>
    <div id="cart"><a href="cart.php"><img src="images/products/cartfinal.png" /></a></div>
</div>
<div class="slidebar">
<!--<h3><p align="center">
 CATALOG</p></h3>

  <form action="" method="get">
    
    <input type="text" input size="23" />
    <input type="submit" value="search" class="search"/></form>-->  
</div>-->
<div class="nav">

<?php 
require_once'include/leftNav.php';
?>
</div>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$product = getProductDetail($pdId, $catId);

// we have $pd_name, $pd_price, $pd_description, $pd_image, $cart_url
extract($product);
?>

<img id="catalogdetail" src="<?php echo $pd_image; ?>" />
<!--<div id="catalogdetailwrapper">
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail2.jpg',1)">
<img src="image/catalogdetail2.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail3.jpg',1)">
<img src="image/catalogdetail3.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail4.jpg',1)">
<img src="image/catalogdetail4.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail5.jpg',1)">
<img src="image/catalogdetail5.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail6.jpg',1)">
<img src="image/catalogdetail6.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail7.jpg',1)">
<img src="image/catalogdetail7.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail8.jpg',1)">
<img src="image/catalogdetail8.jpg" border="0" /></a><a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail9.jpg',1)">
  <img src="image/catalogdetail9.jpg" border="0" /></a><a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail10.jpg',1)">
<img src="image/catalogdetail10.jpg" border="0" /></a>
<a href="javascript:;" onclick="MM_swapImage('catalogdetail','','image/catalogdetail11.jpg',1)">
<img src="image/catalogdetail11.jpg" border="0" /></a>-->

<!--</div>-->
</div>
<p id="back"> <a href="catalog.php">Back</p></a>
 <div id="ormoluitemdetail">
<h3> <p><font style="color:#F93; font-weight:bold;"><?php echo $pd_name; ?></p></font></h3>
<h2> <p><font color="#66CC00"><?php echo displayAmount($pd_price); ?></p></h2></font>

 <p><div id="desc"><?php echo $pd_description; ?></div><br /></p>
 <?php
// if we still have this product in stock
// show the 'Add to cart' button
if ($pd_qty > 0) {
?>
 <input type="button" name="btnAddToCart" value="Add To Cart &gt;" onclick="window.location.href='<?php echo $cart_url; ?>';" class="addToCartButton" />

  <?php
} else {
	echo 'Out Of Stock';
}
?>

</tr>
</table>
 <!--</div>
 <div id="detailfooter">
<p align="center"><font color="#FF9900"> Home | About Us | Terms & Condition | Contact Us</p>
<img id="info" src="image/info.jpg" /></div> 
</div>
-->
</body>
</html>
