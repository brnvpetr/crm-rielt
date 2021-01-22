<?php
$tipobj = $_POST['tipobj'];
$adress = $_POST['adress'];
$fioobj = $_POST['fioobj'];
$phoneobj = $_POST['phoneobj'];
$manageruserus = $_POST['manageruserus'];

$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "obj";

$db = mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

$query = "insert into $usertable (tipobj, adress, fioobj, phoneobj, manageruserus) values ('$tipobj', '$adress', '$fioobj', '$phoneobj', '$manageruserus')";
$result = mysql_query($query);
if ($result == true)
    echo '<meta http-equiv="refresh" content="1; URL=objects.php" />';
else
    print("Данные не занесены");
mysql_close();
