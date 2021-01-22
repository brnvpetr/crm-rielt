<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "clients";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (isset($_POST['statusmoney']) and isset($_POST['userId']) and isset($_POST['clientId'])) {
    $statusmoney = (int)$_POST['statusmoney'];
    $userId = (int)$_POST['userId'];
    $clientId = (int)$_POST['clientId'];
    mysql_query("UPDATE `clients` SET  `statusmoney`=$statusmoney WHERE `manager`=$userId AND `id`=$clientId");

    // echo $result;
}
