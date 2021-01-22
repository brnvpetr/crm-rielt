<?php
$db_server="localhost";
$db_user="c16632_crmask_na4u_ru";
$db_password="YiQbaXelhurux14";
$db_name="c16632_crmask_na4u_ru";
try {
    // Открываем соединение, указываем адрес сервера, имя бд, имя пользователя и пароль
    $db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
    // Устанавливаем атрибут сообщений об ошибках (выбрасывать исключения)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    // Создаем массив, в котором будем хранить идентификаторы записей
    $ids_to_delete = array();
    // Переносим данные (отмеченные записи) из полей формы в массив
    foreach($_POST['delete_row'] as $selected){
        $ids_to_delete[] = $selected;
    }
 
    // Если пользователь не отметил ни одной записи для удаления,
    // то прерываем выполнение кода
    if(empty($ids_to_delete)){
        echo "Вы не выделили ни одной записи для удаления!";
        return;
    }
 
      
    // Если есть хоть одно заполненное поле формы (запись выделена для удаления),
    // то составляем запрос.    
    if(sizeof($ids_to_delete > 0)){
        // Запрос на удаление выделенных записей в таблице
        $sql = "DELETE FROM obj WHERE id IN (" . implode(',', array_map('intval', $ids_to_delete)) . ")";
        // Перед тем как выполнять запрос предлагаю убедится, что он составлен без ошибок.
        // echo $sql;
       
        // Подготовка запроса.
        $statement = $db->prepare($sql);
 
        // Выполняем запрос.
        $statement->execute();
    
        echo '<meta http-equiv="refresh" content="1; URL=adressobj.php" />';
    }
}
 
catch(PDOException $e) {
    echo "Ошибка при удалении записи в базе данных: " . $e->getMessage();
}
 
// Закрываем соединение.
$db = null;
?>