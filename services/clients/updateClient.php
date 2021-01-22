<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "clients";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (
    isset($_POST["commentsclient"])
    and isset($_POST["id"])
    and isset($_POST['domclient'])
    and isset($_POST['phoneclient'])
    and isset($_POST['summamoney'])
) {
    $id = $_POST['id'];
    $commentsclient = $_POST['commentsclient'];
    $domclient = $_POST['domclient'];
    $phoneclient = $_POST['phoneclient'];
    $summamoney = $_POST['summamoney'];

    mysql_query("UPDATE clients SET 
    commentsclient=\"$commentsclient\",
    domclient=\"$domclient\",
    phoneclient=\"$phoneclient\",
    summamoney=\"$summamoney\"
    WHERE id=$id");
}
header("location:/clients.php");
