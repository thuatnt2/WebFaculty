<?php
$con = mysql_connect("localhost", "root" , "");
if(!$con) { 
    exit("Khong ket noi duoc den server!");
}
$selectBD = mysql_select_db("db_webkhoa", $con);
if(!$selectBD) { 
    exit("Khong co co so du lieu");
}
mysql_query("SET NAMES 'utf8'");  
?>