<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "ads";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (isset($_POST['ads_id'])){
    $ads_id = (int)$_POST['ads_id'];
    mysql_query("DELETE FROM ads WHERE id = $ads_id");
    
}
header("location:/ads.php");