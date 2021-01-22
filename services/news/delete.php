<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "news";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (isset($_POST['news_id'])){
    $news_id = $_POST['news_id'];
    mysql_query("DELETE FROM news WHERE id = $news_id");
    
}
header("location:/index.php");