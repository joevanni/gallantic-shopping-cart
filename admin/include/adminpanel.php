<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php

if (!defined('WEB_ROOT')) {
	exit;
}
if (isset($_GET['function'])){
      doLogout();
}

$self = WEB_ROOT . 'adminpanel.php';
?>
<html>
<head>
    <?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
 
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<link href="../Admincss/admin2.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.InHeader{
		background:url(../../images/header%202nd.png);
	margin: auto;
	width: 1300px;
	height: 165px;
	
	border-right: 0px solid #dcdcdc;
	border-left: 0px solid #dcdcdc;
	}
	#wrappers {
	width: 950px;
	padding: 15px 0 0 0;
	position: absolute;
	float:left;
	right:200px;
	top:200px;
	border-left: 1px solid #dcdcdc;
	border-right: 1px solid #dcdcdc;
	border-bottom: 1px solid #dcdcdc;
	float: center;
	margin: auto;
	text-align: left;
	background: #fff url(img/bg_kiri.png) repeat-y;
	-moz-box-shadow: 0px 0px 8px #dcdcdc;
	-webkit-box-shadow: 0px 0px 8px #dcdcdc;
}
#header {
	
	width: 100%;
	border-bottom: 1px solid #dcdcdc;
	
	height: 75px;
	z-index: 1000;
	-moz-box-shadow: 0px 0px 8px #dcdcdc;
	-webkit-box-shadow: 0px 0px 8px #dcdcdc;
}
#admin
{
float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:-70px;
	text-decoration:none;
	font-size:16px;
	color:#3F6;
}
#admin a
{
	color:#FC6;;
}
#admin a:hover 
{
	color:#fff;
}

#category
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:10px;
	text-decoration:none;
	font-size:16px;
}
#category a
{
	color:#FC6;;
}
#category a:hover 
{
	color:#fff;
}

#subcategory
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:140px;
	text-decoration:none;
	font-size:16px;
	color: #F90;
	
}
#subcategory a
{
	color:#FC6;;
}
#subcategory a:hover 
{
	color:#fff;
}

#product
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:280px;
	text-decoration:none;
	font-size:16px;
}
#product a
{
	color:#FC6;;
}
#product a:hover 
{
	color:#fff;
}
#order
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:660px;
	text-decoration:none;
	font-size:16px;
}
#order a:hover 
{
	color:#fff;
}
#order a
{
	color:#FC6;
}
#configuration
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:750px;
	text-decoration:none;
	font-size:16px;
}
#configuration a
{
	color:#FC6;
}
#configuration a:hover 
{
	color:#fff;
}
#users
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:890px;
	text-decoration:none;
	font-size:16px;
	
}
#users a 
{
	color:#FC6;
}
#users a:hover 
{
	color:#fff;
}

#Logout
{
	float: left;
	width: 90px;
	height: 50px;
	position:absolute;
	top:-60px;
	left:980px;
	text-decoration:none;
	font-size:16px;	
}
#logout a:hover 
{
	color:#fff;
}
#logout a
{
	color:#FC6;
}


</style>



</head>

<body>

<!--<div id="header">-->
	<div class="InHeader">
   
	
	</div>
</div>

<div id="wrappers">
	<div id="leftBar">
	
       
    <td width="150" valign="top" class="navArea"><p>&nbsp;</p>
    <div id="admin"><a href="<?php echo WEB_ROOT; ?>admin">Home</a></div>
		<div id="category"><a href="<?php echo WEB_ROOT; ?>admin/category/" >MainCategory</a></div>
            <div id="subcategory"> <a href="<?php echo WEB_ROOT; ?>admin/subcategory/" >SubCategory</a></div>

		<div id="product"><a href="<?php echo WEB_ROOT; ?>admin/product/" >Product</a></div>
                
		<div id="order"><a href="<?php echo WEB_ROOT; ?>admin/order/?status=Paid" >Order</a> </div>
		<div id="configuration"><a href="<?php echo WEB_ROOT; ?>admin/config/" > Configuration</a></div>
		<div id="users"><a href="<?php echo WEB_ROOT; ?>admin/user/" >User</a></div>
                 <div id="Logout"><a href="<?php echo $logoutAction ?>">logout</a></div>
                 
    
      <p>&nbsp;</p></td>
	   
	</div>
  <div id="rightContent">
             <td width="600" valign="top" class="contentArea"><table width="100%" border="0" cellspacing="0" cellpadding="20">
        <tr>
          <td>
            <?php
	 require_once $content;
?>
<!--	<h3>Dashboard</h3>
	<div class="quoteOfDay">
	<b>Quote of the day :</b><br>
	<i style="color: #5b5b5b;">"If you think you can, you really can"</i>
	</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/posting.png"><br>Tambah Posting</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/photo.png"><br>Upload Foto</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/halaman.png"><br>Tambah Halaman</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/template.png"><br>Pengaturan Template</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/quote.png"><br>Tambah QOD</a>
		</div>
		<div class="shortcutHome">
		<a href=""><img src="mos-css/img/bukutamu.png"><br>Data Buku Tamu</a>
		</div>
		
		<div class="clear"></div>
		
		<div id="smallRight"><h3>Informasi web anda</h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Jumlah posting</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah kategori</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah komentar diterbitkan</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah komentar belum diterbitkan</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah foto dalam galeri</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah data buku tamu</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
		</table>
		</div>
		<div id="smallRight"><h3>Statistik pengunjung web</h3>
		
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Pengunjung online</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Pengunjung hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Total pengunjung</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Hit hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Total hit</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
		</table>
		</div>-->
          </td>
        </tr>
      </td>
  </tr>
</table>
<br />
<br />
<br />
	</div>
<div class="clear"></div>
<center><font size="2">All right reserve 2015@Team-O Company</font></center>
	
</div>
</div>
</body>
</html>