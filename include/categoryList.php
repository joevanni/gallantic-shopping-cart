
<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$categoryList    = getCategoryList();
$categoriesPerRow = 4;
$numCategory     = count($categoryList);
$columnWidth    = (int)(100 / $categoriesPerRow);
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
	width:140px;
	height:35px;
	float:left;
	position:absolute;	
	top:16px;
	left:97px;	
}
 </style> 
 <td><div id="allitems"><img id="features" src="images/products/features.jpg" />
  <h3><div id="h2"> All Category</div></h3>
  <!--<div id="margin"></div>-->
</div></td>

<table width="90%" border="0" cellspacing="0" cellpadding="2">
<?php 
if ($numCategory > 0) {
	$i = 0;
	for ($i; $i < $numCategory; $i++) {
		if ($i % $categoriesPerRow == 0) {
			echo '<tr>';
		}
		
		// we have $url, $image, $name, $price
		extract ($categoryList[$i]);
		
		echo "<td width=\"$columnWidth%\" align=\"center\"><a href=\"$url\"><img src=\"$image\" border=\"0\"><br><div id='colorname'>$name</a></div></td>\r\n";
	
	
		if ($i % $categoriesPerRow == $categoriesPerRow - 1) {
			echo '</tr>';
		}
		
	}
	
	if ($i % $categoriesPerRow > 0) {
		echo '<td colspan="' . ($categoriesPerRow - ($i % $categoriesPerRow)) . '">&nbsp;</td>';
	}
} else {
?>
	<tr><td width="100%" align="center" valign="center">No categories yet</td></tr>
<?php	
}	
?>
</table>
