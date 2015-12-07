<?php 
require_once 'library/config.php';
require_once 'library/category-functions.php';

require_once 'library/cart-functions.php';
require_once 'featured.php';

$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ormolu Homepage</title>
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
    <div id="catalog"><a href="faqs.php">FAQS</div></a>
    <div id="faqs"><a href="FAQS.html">CONTACT US</div></a>
    <div id="signin"><a href="#">Sign In</a> or <a href="#">Register</a></div>
    <div id="cart"><a href="cart.php"><img src="images/products/cartfinal.png" /></a></div> 
    
  </div>
</div>
<div id="slider">
<div id="imgs">
   <img id="img1" src="images/products/picture(sample).jpg"/>
  <img id="img2" src="images/products/1.jpg" />
  <img id="img3" src="images/products/2.jpg" />
    </div>

 
<div id="snav">
  <div id="snavup">
  <div id="circles">
    <ul>
    <li id="R0"></li>
     <li id="R1"></li>
      <li id="R2"></li>
     </ul>
     </div>
     
<div id="snavmiddle">
 
<img id="right" src="images/products/1439620837_rnd_br_next.png" onclick="next()"/>
<img id="left" src="images/products/1439620888_rnd_br_prev.png" onclick="prev()" />
</div>
</div>

  
 <div id="snavbottom">

<p align="center" id="P0"><span style="font-size: 16px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;">UNIQUE AND SELECTOR ANTIQUE</span><br /><br /><span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif;">A fine selection of period decorative art with emphasis on french Empire and Neoclassical objects.All items are in original condition.All gilding on Ormolu objects are the Orginal finish and Never re-gilded.</span></p>
  <p id="P1"></p>
  <p id="P2"></p>
</div>
</div>
 <div id="item"> 
 <img id="feature" src="images/products/features.jpg" />
    <div id="h1"> Featured Item</div>
  </div>
   <div id="add-on2">
   <img id="cartnipaul2" src="images/products/CART.jpg" />
   </div>
  <div id="add-on">
  
  <img id="cartnipaul" src="images/products/CART.jpg" />
  
  
  </div>
  <div id="margin">
</div>
  <div id="imagewrapper">
  <?php 
  
  

if (!defined('WEB_ROOT')) {
	exit;
}

$productsPerRow = 4;
$productsPerPage = 8;

//$productList    = getProductList($catId);
$children = array_merge(array($catId), getChildCategories(NULL, $catId));
$children = ' (' . implode(', ', $children) . ')';

$sql = "SELECT pd_id, pd_name, pd_price, pd_thumbnail, pd_qty, c.cat_id
		FROM tbl_product pd, tbl_category c
		WHERE pd.cat_id = c.cat_id AND pd.cat_id IN $children 
		ORDER BY pd_name";
$result     = dbQuery(getPagingQuery($sql, $productsPerPage));
$pagingLink = getPagingLink($sql, $productsPerPage, "c=$catId");
$numProduct = dbNumRows($result);

// the product images are arranged in a table. to make sure
// each image gets equal space set the cell width here

$columnWidth = (int)(100 / $productsPerRow);
?>

<table width="85%" border="0" cellspacing="0" cellpadding="20" 

<?php 
if ($numProduct > 0 ) {

	$i = 0;
	while ($row = dbFetchAssoc($result)) {
	
		extract($row);
		if ($pd_thumbnail) {
			$pd_thumbnail = WEB_ROOT . 'images/product/' . $pd_thumbnail;
		} else {
			$pd_thumbnail = WEB_ROOT . 'images/no-image-small.png';
		}
	
		if ($i % $productsPerRow == 0) {
			echo '<tr>';
		}

		// format how we display the price
		$pd_price = displayAmount($pd_price);
		
		echo "<td width=\"$columnWidth%\" align=\"center\"><a href=\"catalog.php" . $_SERVER['QUERY_STRING'] . "?c=$catId&p=$pd_id" . "\"><img src=\"$pd_thumbnail\" border=\"0\"><br><div id='colorname'>$pd_name</a></div><br>Price : $pd_price";
		// if the product is no longer in stock, tell the customer
		if ($pd_qty <= 0) {
			echo "<br>Out Of Stock";
		
		}
		
		
		echo "</td>\r\n";
	
		if ($i % $productsPerRow == $productsPerRow - 1) {
			echo '</tr>';
		}
		
		$i += 1;
	}
	
	if ($i % $productsPerRow > 0) {
		echo '<td colspan="' . ($productsPerRow - ($i % $productsPerRow)) . '">&nbsp;</td>';
	}
	
} else {
?>
	<tr><td width="100%" align="center" valign="center">No products in this category</td></tr>
<?php	
}	
?>
</table>
<p align="center"><?php echo $pagingLink; ?></p>
  
  



<!--  <hallmark movies
table width="200" border="0">
  <tr>
    <td width="17%" valign="top"><img src="image/pic1.jpg" width="180" height="180"</td>
  </tr>
  <tr>
    <td><p>Product Title</p>
      
      <p>Product Price</p>
      <p>View Detail</p></td>
  </tr>
  <tr>
 
  </tr>
  </table>-->

  
  
</div></div>

<div id="catalogholder">
<a href="catalog.php"><img id="gotocatalog" src="images/products/gotocatalog.jpg" /></a></div>
<div id="footer">
<p align="center"><font color="#FF9900">Home | About Us | Terms & Condition | Contact Us</p>
<img id="info" src="images/products/info.jpg" /></div>
  


</body>
</html>
