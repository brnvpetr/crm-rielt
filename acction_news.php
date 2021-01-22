<?php
$textnews = $_POST['textnews'];


$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "news";

$db = mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

$query = "insert into $usertable (textnews) values ('$textnews')";
$result = mysql_query($query);
if ($result == true)
    echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
else
    print("Данные не занесены");
mysql_close();
