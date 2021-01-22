<?php
$hostname="localhost";
$username="c16632_crmask_na4u_ru";
$dbname="c16632_crmask_na4u_ru";
$pass="YiQbaXelhurux14";
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Создаем массив, в котором будем хранить идентификаторы записей
    $ids_to_edit = array();

    foreach($_POST['edit_row'] as $selected){
        $ids_to_edit[] = $selected;
    }

    // Если пользователь не отметил ни одной записи для удаления,
    // то прерываем выполнение кода
    if(empty($ids_to_delete)){
        echo "Вы не выделили ни одной записи для удаления!";
        return;
    }
     
// если запрос POST 
if(sizeof($ids_to_edit > 0)){
 
    $sql = "UPDATE users SET name='$name', company='$company' WHERE id='$id'";

    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}

// закрываем подключение
$db = null;
?>