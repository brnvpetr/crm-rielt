<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "news";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (
    isset($_POST["textnews"])
    and isset($_POST["id"])
) {
    $id = $_POST['$id'];
    $textnews = $_POST['textnews'];

    mysql_query("UPDATE news SET 
    textnews=\"$textnews\"
    WHERE id=$id");
}
header("location:/index.php");
