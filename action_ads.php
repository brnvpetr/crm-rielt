<?php
$fioads = $_POST['fioads'];
$cityads = $_POST['cityads'];
$adressads = $_POST['adressads'];
$siteads = $_POST['siteads'];

$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "ads";

$db = mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

$query = "insert into $usertable (fioads, cityads, adressads, siteads) values ('$fioads', '$cityads', '$adressads', '$siteads')";
$result = mysql_query($query);
if ($result == true)
    echo '<meta http-equiv="refresh" content="1; URL=ads.php" />';
else
    print("Данные не занесены");
mysql_close();
