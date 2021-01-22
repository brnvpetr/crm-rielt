<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "clients";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (isset($_POST['client_id'])){
    $client_id = (int)$_POST['client_id'];
    mysql_query("DELETE FROM clients WHERE id = $client_id");
    
}
header("location:/clients.php");