<?php
/*Определяем переменные для хранения адреса хоста, названия базы данных, таблицы базы данных, имени и пароля пользователя
*/
$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "obj";

//Соединяемся с базой данных
mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);

//Формируем текст запроса
$query = "select tipobj, adress, fioobj, phoneobj";

//Выполняем запрос с сохранением идентификатора результата
$result = mysql_query($query);

//Печатаем шапку таблицы
print("<p align=center><font face=verdana><b>Найденные</b>
<table border=1 align=center width=90% cellpadding=5>
<tr bgcolor=#ffffcc>
<td>Порода</td>
<td>Дата находки</td>
<td>Район</td>
<td>Пол</td>
<td>Возраст</td>
<td>Приметы</td>
<td>Контакты</td>
<td>Дополнительная информация</td>
</tr>");

//Печатаем содержимое таблицы
while ($a = mysql_fetch_array($result)) {
    $tipobj = $a['tipobj'];
    $adress = $a['adress'];
    $fioobj = $a['fioobj'];
    $phoneobj = $a['phoneobj'];

    print("<tr>
<td>$tipobj</td>
<td>$adress</td>
<td>$fioobj</td>
<td>$phoneobj</td>
</tr>");
}
print("</table>");

//Закрываем соединение
mysql_close();
