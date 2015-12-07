<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action='search.php' method='GET'
<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search']; 
 
if(!$button)
echo "you didn't submit a keyword";
else
{
if(strlen($search)<=1)
echo "Search term too short";
else{
echo "You searched for <b>$search</b> <hr size='1'></br>";
mysql_connect("localhost","root","password");
mysql_select_db("db");
 
$search_exploded = explode (" ", $search);
 
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="cat_name LIKE '%$search_each%'";
else
$construct .="AND cat_name LIKE '%$search_each%'";
 
}
$construct ="SELECT * FROM searchengine WHERE $construct";
$run = mysql_query($construct);
 
$foundnum = mysql_num_rows($run);
 
if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>.</br></br>1. 
Try more general words. for example: If you want to search 'different categories'
then use general keyword like 'category' 'women'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling";
else
{
echo "$foundnum results found !<p>";
 
while($runrows = mysql_fetch_assoc($run))
{
$title = $runrows ['cat_name'];
$desc = $runrows ['cat_description'];
$url = $runrows ['url'];
 
echo "
<a href='$url'><b>$title</b></a><br>
$desc<br>
<a href='$url'>$url</a><p>
";
 
}
}
 
}
}
 
?>>

<center>
<h1>My Search Engine</h1>
<input type='text' size='90' name='search'></br></br>
<input type='submit' name='submit' value='Search source code' ></br></br></br>
</center>
</form>
</body>
</html>