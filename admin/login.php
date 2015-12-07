<?php require_once('../Connections/connection_db.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUserName'])) {
  $loginUsername=$_POST['txtUserName'];
  $password=$_POST['txtPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "order/index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connection_db, $connection_db);
  
  $LoginRS__query=sprintf("SELECT user_name, user_password FROM tbl_user WHERE user_name=%s AND user_password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connection_db) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'],$_POST['txtPassword'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<html>
<head>
<title>Shop Admin - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/admin.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
#loginlogo
{
	background-image: url(../images/loginlogo.jpg);
	background-repeat:no-repeat;
	width:300px;
	height:330px;
	float:right;
	position:absolute;
	left:530px;
	top:250px;
-moz-transform-style: preserve-3d;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
	
	/* When the forms are flipped, they will be hidden */
	-moz-backface-visibility: hidden;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	
	/* Enabling a smooth animated transition */
	-moz-transition:0.8s;
	-webkit-transition:0.8s;
	transition:0.8s;
	
	/* Configure a keyframe animation for Firefox */
	-moz-animation: pulse 2s infinite;
	
	/* Configure it for Chrome and Safari */
	-webkit-animation: pulse 2s infinite;
}


/* Firefox Keyframe Animation */
@-moz-keyframes pulse{
	0%{		box-shadow:0 0 1px black;}
	50%{	box-shadow:0 0 8px black;}
	100%{	box-shadow:0 0 1px black;}
}

 /*Webkit keyframe animation */
@-webkit-keyframes pulse{
	0%{		box-shadow:0 0 1px black;}
	50%{	box-shadow:0 0 10px black;}
	100%{	box-shadow:0 0 1px black;}
}
	

#txtUserName
{
	margin-left:5px;
	height:25px;
	border-radius:3px;
}
#txtPassword
{
	margin-left:10px;
	border-radius:3px;
	height:25px;
}
#btnLogin
{
	width:75px;
	height:40px;
	margin-left:100px;
	border-radius:3px;
	
}
#btnLogin:hover
{
	color:#C00;
}
#user
{
	font-size:20px;
	color:#FC6;
}

#password1
{
	font-size:20px;
	color:#FC6;
}
[class^="icon-"]:last-child,
[class*=" icon-"]:last-child {
  *margin-left: 0;
}
[class^="icon-"],

[class*=" icon-"] {
  display: inline-block;
  width: 14px;
  height: 14px;
  *margin-right: .3em;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url(../images/glyphicons-halflings-white.png);
  background-position: 14px 14px;
  background-repeat: no-repeat;
}

.icon-lock {
  background-position: -287px -24px;
  position:absolute;
  top:19px;
  float:left;
  left:15px;
  width:20px;
  height:25px;
  
}
#add-on
{
color:#FFF;
float:left;
position:absolute;
left:32px;
font-weight:bold;
font-size:14px;

}
#logo-header
{
	background-image: url(../images/header%202nd.png);
	background-repeat:no-repeat;
	width:1330px;
	height:300px;
	float:left;
	position:absolute;
	border-radius:10px;
	margin:0;

	
	
}
#adminfooter
{
	
	
	width:400px;
	
	float:left;
	position:absolute;
	top:420px;
	left:-50px;
	color:#333;
	font-size:16px;
	
}
#clearfix{
	clear:both;
}
body
{
	background-color:#FFC;
}
</style>
<body>



<!--
<table width="750" border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
 <tr> 
  <td align="center"><img src="../images/essenxa.png" bgcolor="#FFF"></td>
 </tr>
 <tr> -->
 <!-- <td valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="20">
    <tr> -->
    <!-- <td class="contentArea">-->
    
    
    
 <body>


<div id="logo-header"></div>

<div id="loginlogo">
<i class="icon-lock icon-padding"></i></br>
<div id="add-on">Login your account!</div>

<div id="clearfix"></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="frmLogin" id="frmLogin">
       <!--<p>&nbsp;</p>
       <table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#336699" class="entryTable">
        <tr id="entryTableHeader"> 
         <td>:: Administrator Login ::</td>
        </tr>
        <tr> 
         <td class="contentArea"> -->
		<!-- <div class="errorMessage" align="center"><?php /*?><?php echo $errorMessage; ?><?php */?>-->
		<!--  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="text">
           <tr align="center"> 
            <td colspan="3">&nbsp;</td>
           </tr>
           <tr class="text"> 
            <td width="100" align="right">Username</td>
            <td width="10" align="center">:</td>
            
            <td>-->
            <div id="user">Username:<input name="txtUserName" type="text" class="box" placeholder="Username" id="txtUserName" value="admin" size="10" maxlength="20">
         <!--  </tr>
           <tr> 
            <td width="100" align="right">Password</td>
            <td width="10" align="center">:</td>-->
            <br>
            <br>
            <br>
            <!--<td>--><div id="password1">Password:<input name="txtPassword" placeholder="Password" type="password" class="box" id="txtPassword" value="admin" size="10"><!--</td>-->
          <!-- </tr>
           <tr> 
            <td colspan="2">&nbsp;</td>-->
            <br>
            <br>
            <br>
            <input name="btnLogin" type="submit" id="btnLogin" value="Login">
           </form>
</div>
           </div>
<div id="adminfooter">All right reserve 2015@Team-O Company
</div>
<n&nbsp;>
        
 
          
      
          <!-- </tr>
          </table></td>
        </tr>
       </table>
       <p>&nbsp;</p>
      </form></td>
    </tr>
   </table></td>
 </tr>
</table>-->

</body>
</html>