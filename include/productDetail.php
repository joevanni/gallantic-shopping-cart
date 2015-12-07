
 <?php
if (!defined('WEB_ROOT')) {
	exit;
}

$product = getProductDetail($pdId, $catId);

// we have $pd_name, $pd_price, $pd_description, $pd_image, $cart_url
extract($product);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
  <td width="60%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td width="60%" align="center"><img src="<?php echo $pd_image; ?>" width="250" height="250" border="0" alt="<?php echo $pd_name; ?>" /></td>
      <td width="40%" valign="middle"><strong><?php echo $pd_name; ?></strong><br/>
        <br />
        <?php echo $pd_description; ?><br />
        <br />
        Price : <?php echo displayAmount($pd_price); ?><br/>
        <br />
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
?></td>
    </tr>
    <tr align="left">
      <td colspan="2"><?php echo $pd_description; ?></td>
    </tr>
  </table></td>
</tr>
</table>

?>



