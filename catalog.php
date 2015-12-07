
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
<title>Catalog</title>

<link href="css/style2.css" rel="stylesheet" type="text/css" />

<script src="js/hover.js" type="text/javascript"></script>

</head>

<body>
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
</div>
<div class="slidebar">
<h3><p align="center">
 CATALOG</p></h3>

  <form action="" method="get">
    
    <input type="text" input size="23" />
    <input type="submit" value="search" class="search"/></form>
   <!-- <div id="sortholder">
      <select name="sort" class="sort" onchange="sort(this.value)">
        <option disabled selected> Alphabetical Order</option>
        <option value="pricehightolow.html">Price High To Low</option>
        <option value="pricelowtohigh.html">Price Low To High</option>
      </select>
     <div id="sortby">Sort By:</div>
    </div>	-->

</div>
 <br />
 <div class="nav">

	
<?php 
require_once'include/leftNav.php';
?>
<!-- <ul>
<h4>Furnishing(17)</h4>
	<li>Furniture </li>  
    <li>Lighting</li> 
    <li>Boxes </li> 
    <li>Clocks</li>
<h4>Decorative Art(18)</h4>
   <li>Porcelain </li>  
    <li>Glass</li> 
    <li>Minerals </li> 
    <li>Metals</li>
    <li>Textiles</li>
<h4>Fine Arts(21)</h4>
	<li>Paintings</li>
	<li>Script</li>
	<li>Sculpture</li>
 <h4>Sold Items(81)</h4>  
  </ul>-->

</div>
  
<!-- <div id="allitems"> <img id="features" src="images/products/features.jpg" />
  <h3><div id="h2"> All Items</div></h3>
  <div id="margin"></div>
</div>-->
<!--<div id="prices">
<p id="price1">$17,500</p>
<p id="price2">$8,950</p>
<p id="price3">$9,750</p>
<p id="price4">$1,950</p>
<p id="price5">$8,950</p>
<p id="price6">$2,975</p>
<p id="price7">$875</p>
<p id="price8">$17,500</p>
<p id="price9">$8,950</p>
<p id="price10">$2,975</p>
<p id="price11">$14,500</p>
<p id="price12">$6,750</p>
</div>-->
<div id="imagewrappers">
<?php
if ($pdId) {
	require_once 'pdetail.php';
} else if ($catId) {
	require_once 'include/productList.php';
} else {
	require_once 'include/categoryList.php';
}
 ?>

 <!--<a href="detail.html"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p1','','image/pic(alternate2).jpg',1)"><img id="p1" src="image/pic1.jpg"  /></a>
<p id="box">Italian Empire Patinated Bronze  Figure Of Doryphoros</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p2','','image/pic2(alternate).jpg',1)">
<img id="p2" src="image/pic2.jpg" /></a>
<p id="box2">Louis XVI Bronse Ormolu Mounted Cobalt Glass Vases</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p3','','image/pic3(alternate).jpg',1)">
<img id="p3" src="image/pic3.jpg" /></a>
<p id="box3">French Louis XV Bronze Ormolu Sevres Porcelain Vase</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p4','','image/pic4(alternate).jpg',1)">
<img id="p4" src="image/pic4.jpg" /></a>
<p id="box4">Greek Etruscan Luristan Bronze Vessel Vase - Pre Roman</p>
<a href="" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p5','','image/pic5(alternate).jpg',1)">
<img id="p5" src="image/pic5.jpg" />
<p id="box5">French Empire Bronze Ormolu and Porphyry Figural Tazza</p>
<a href="" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p6','','image/pic6(alternate).jpg',1)">

<img id="p6" src="image/pic6.jpg" /></a>
<p id="box6">French Directoire Bronze Athenienne and Blue John Tazza</p>
<a href="" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p7','','image/pic7(alternate).jpg',1)">
<img id="p7" src="image/pic7.jpg" /></a>
<p id="box7">French Louis XVI Ormolu & Bronze Miniature Clock</p>
<a href="detail.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p8','','image/pic8(alternate).jpg',1)">
<img id="p8" src="image/pic8.jpg" /></a>
<p id="box8">French Directoire Bronze & Ormolu Blackamoor Clock</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p9','','image/pic9(alternate).jpg',1)">
<img id="p9" src="image/pic9.jpg" /></a>
<p id="box9">French Diretoire Bronze Sculputure Of The Rearing Horse</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p10','','image/pic10(alternate).jpg',1)">
<img id="p10" src="image/pic10.jpg" /></a>
<p id="box10">19 Century Italian Fruitwood Classical Column</p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p11','','image/pic11(alternate).jpg',1)">
<img id="p11" src="image/pic11.jpg" /></a>
<p id="box11">French Empire Bronze Bust Of Napoleon - Feuchere </p>
<a href=""  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('p12','','image/pic12(alternate).jpg',1)">
<img id="p12" src="image/pic12.jpg" /></a>
<p id="box12">Russian Empire Bronze Ormolu And Charoite Vase </p>
-->

</div>



 <div id="catalogfooter">
<p align="center"><font color="#FF9900"> Home | About Us | Terms & Condition | Contact Us</p>
<img id="info" src="image/info.jpg" /></div>




</body>
</html>
