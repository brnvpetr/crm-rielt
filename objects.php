<?php

session_start();

if (!isset($_SESSION["login"])) :
  header("location:login.php");
else :
?>



  <!doctype html>
  <html lang="ru">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">

  </head>

  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">АСК РИЕЛТ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item action ">
              <a class="nav-link" href="index.php">Главная</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="objects.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Объекты недвижимости <span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!--<a class="dropdown-item" href="#">Управление парсером</a>-->
                <a class="dropdown-item" href="objects.php">Добавить</a>
                <a class="dropdown-item" href="#">Добавить парсером</a>
                <!--<a class="dropdown-item" href="#">Города и регионы</a>-->
                <a class="dropdown-item" href="adressobj.php">Адреса объектов</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clients.php">Клиенты/заявки</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">Сотрудники</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sms.php">SMS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="zarplata.php">Зарплата</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="notepad.php">Блокнот</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ads.php">Объявления</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php">Статистика</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <div class="pull-right">
                <a class="btn btn-primary" href="logout.php" role="button">Выход</a>
              </div>
            </li>

            <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> -->
          </ul>
        </div>
      </nav>
    </header>


    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <h2>Объекты недвижимости</h2>
        <p>
          <div class="dropdown">
            <button type="button" class="btn btn-primary button-obj" data-toggle="modal" data-target="#obj1">Добавить</button>
            <input type='submit' class="btn btn-primary button-obj" value='Удалить выделенные записи'>
            <!--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Тим жилья
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"></a>
                              <a class="dropdown-item" data-filter='.admin' href="#">2-х комнатная квартира</a>
                              <a class="dropdown-item" href="#">3-х комнтаная квартира</a>
                              <a class="dropdown-item" href="#">4-х и более комнтаная квартира</a>
                              <a class="dropdown-item" href="#">Дом</a>
                            </div>-->

          </div>
        </p>
          <form action='delete.php' method='POST'>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Менеджер</th>
                <th>Тип объекта</th>
                <th>Адрес объекта</th>
                <th>ФИО Владелец</th>
                <th>Номер телефона</th>
                <th>Удалить запись</th>
              </tr>
            </thead>
            <?php
            $hostname="localhost";
            $username="c16632_crmask_na4u_ru";
            $dbname="c16632_crmask_na4u_ru";
            $pass="YiQbaXelhurux14";
            $usertable = "obj";

            mysql_connect($hostname, $username, $pass);
            mysql_select_db($dbname);

            $result = mysql_query("SELECT * FROM obj");

            while ($a = mysql_fetch_array($result)) {
              $tipobj = $a['tipobj'];
              $id = $a['id'];
              $adress = $a['adress'];
              $fioobj = $a['fioobj'];
              $phoneobj = $a['phoneobj'];
              $manageruserus = $a['manageruserus'];

              print("
                  <tbody class='$manageruserus'>
                    <tr>
                    <td>$manageruserus</td>
                    <td >$tipobj</td>
                    <td>$adress</td>
                    <td>$fioobj</td>
                    <td>$phoneobj</td>
                    <td><input class='form-check-input' id='inlineCheckbox1' type='checkbox' name='delete_row[]' value='" . $a["id"] . "'></td>
                    </tr>
                  </tbody>");
            }
            print("</table>");
            //</table>
            mysql_close();
            ?>
        </form>
      



    <!-- Модальное окно Добавить объект-->
    <!-- The Modal -->
    <form action="save_obj.php" method="post">
      <div class="modal" id="obj1">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Добавить новость</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="/save_obj.php">
                <div class="form-group">
                  <label for="tipobj">Тип объекта:</label>
                  <input name="tipobj" type="text" class="form-control" id="tipobj">
                </div>
                <div class="form-group">
                  <label for="adress">Адрес объекта:</label>
                  <input name="adress" type="adress" class="form-control" id="adress">
                </div>
                <div class="form-group">
                  <label for="fioobj">ФИО владельца:</label>
                  <input name="fioobj" type="text" class="form-control" id="fioobj">
                </div>
                <div class="form-group">
                  <label for="phoneobj">Номер телефона:</label>
                  <input name="phoneobj" type="phone" class="form-control" id="phoneobj">
                </div>
                <div class="form-group">
                  <label for="usermanager">Менеджер:</label>
                  <input name="manageruserus" type="text" class="form-control" id="manageruserus" value="<?php echo $_SESSION['fiouser']; ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
              </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            </div>

          </div>
        </div>
      </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  </html>