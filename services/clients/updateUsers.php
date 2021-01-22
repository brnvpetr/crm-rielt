<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
$usertable = "users";

mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

if (
    isset($_POST["procentzarplata"])
    and isset($_POST["id"])
) {
    $id = $_POST['id'];
    $procentzarplata = $_POST['procentzarplata'];

    mysql_query("UPDATE clients SET 
    procentzarplata=\"$procentzarplata\"
    WHERE id=$manager_id");
}
header("location:/users.php");
