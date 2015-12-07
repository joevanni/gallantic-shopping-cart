<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['ivf_id']) && (int)$_GET['ivf_id'] >= 0) {
	$catId = (int)$_GET['ivf_id'];
	$queryString = "&ivf_id=$ivf_id";
} else {
	$catId = 0;
	$queryString = '';
}
	
// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT ivf_id, ivf_name
        FROM tbl_ivf
		WHERE ivf_id = $ivf_id";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<p>&nbsp;</p>
<form action="process.php?action=add" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>IVF Name</td>
   <td>Description</td>
   <td width="75">Modify</td>
   <td width="75">Delete</td>
  </tr>
  <?php
$cat_parent_id = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
		
		if ($cat_parent_id == 0) {
			$ivf_name = "<a href=\"index.php?ivf_id=$ivf_id\">$ivf_name</a>";
		}
		
		if ($cat_image) {
			$cat_image = WEB_ROOT . 'images/category/' . $cat_image;
		} else {
			$cat_image = WEB_ROOT . 'images/no-image-small.png';
		}		
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $ivf_name; ?></td>
   <td><?php echo nl2br($ivf_description); ?></td>
   <td width="75" align="center"><a href="javascript:modifyCategory(<?php echo $ivf_id; ?>);">Modify</a></td>
   <td width="75" align="center"><a href="javascript:deleteCategory(<?php echo $ivf_id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while


?>
  <tr> 
   <td colspan="4" align="center">
   <?php 
   echo $pagingLink;
   ?></td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="4" align="center">No IVF Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="4" align="right"> <input name="btnAddIVF" type="button" id="btnAddIVF" value="Add IVF" class="box" onClick="addCategory(<?php echo $catId; ?>)"> 
   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>