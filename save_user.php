<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (isset($_POST['emailuser'])) { $emailuser = $_POST['emailuser']; if ($emailuser == '') { unset($emailuser);} }
    if (isset($_POST['fiouser'])) { $fiouser = $_POST['fiouser']; if ($fiouser == '') { unset($fiouser);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password) or empty($emailuser) or empty($fiouser)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $fiouser = stripslashes($fiouser);
    $fiouser = htmlspecialchars($fiouser);
    $emailuser = stripslashes($emailuser);
    $emailuser = htmlspecialchars($emailuser);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password,fiouser,emailuser) VALUES('$login','$password','$fiouser','$emailuser')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo '<meta http-equiv="refresh" content="1; URL=login.php" />';
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>