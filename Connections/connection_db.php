<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connection_db = "localhost";
$database_connection_db = "db";
$username_connection_db = "root";
$password_connection_db = "";
$connection_db = mysql_pconnect($hostname_connection_db, $username_connection_db, $password_connection_db) or trigger_error(mysql_error(),E_USER_ERROR); 
?>