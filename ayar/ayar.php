<?php
session_start();
error_reporting(0);
$baglan=mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("ticaret",$baglan) or die (mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARECTER SET 'utf8'");
include "function.php";
?>