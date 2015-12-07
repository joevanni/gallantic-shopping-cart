
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
<style>
#features
{
	
	width:40px;
	height:20px;
	float:bottom;
	top:17px;
	left:50px;
	position:absolute;
	
}


#h2
{
	font:normal 110% Arial;
	width:120px;
	height:35px;
	float:left;
	position:absolute;	
	top:16px;
	left:97px;	
}
</style>
<div id="allitems"> <img id="features" src="images/products/features.jpg" />
  <h3><div id="h2"> All Items</div></h3></div>
<table width="85%" border="0" cellspacing="0" cellpadding="20">


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
		
		echo "<td width=\"$columnWidth%\" align=\"center\"><a href=\"" . $_SERVER['PHP.SELF'] . "?c=$catId&p=$pd_id" . "\"><img src=\"$pd_thumbnail\" border=\"0\"><br><div id='colorname'>$pd_name</a></div><br>Price : $pd_price";
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