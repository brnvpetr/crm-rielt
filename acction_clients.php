<?php
$manager = $_POST['manager'];
$fioclient = $_POST['fioclient'];
$phoneclient = $_POST['phoneclient'];
$domclient = $_POST['domclient'];
$cityclient = $_POST['cityclient'];
$commentsclient = $_POST['commentsclient'];
$summamoney = $_POST['summamoney'];

$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "clients";

$db = mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

$query = "insert into $usertable (manager, fioclient, phoneclient, domclient, cityclient, commentsclient, summamoney) values ('$manager', '$fioclient', '$phoneclient', '$domclient', '$cityclient', '$commentsclient', '$summamoney')";
$result = mysql_query($query);
if ($result == true)
    echo '<meta http-equiv="refresh" content="1; URL=clients.php" />';
else
    print("Данные не занесены");
mysql_close();
