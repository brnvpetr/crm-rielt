<?php

session_start();

if (!isset($_SESSION["login"])) :
    header("location:static.php");
else :
?>



    <!doctype html>
    <html lang="en">

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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Статистика</h1>

            </div>

            <div class="mid">
                <form action='edit.php' method='POST'>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Менеджер</th>
                                <th>План договоров</th>
                                <!--<th>Договоров сегодня</th>-->
                                <th>Фактически договоров</th>
                                <th>Объявления</th>
                            </tr>
                        </thead>
                        <?php
                        $hostname="localhost";
                        $username="c16632_crmask_na4u_ru";
                        $dbname="c16632_crmask_na4u_ru";
                        $pass="YiQbaXelhurux14";
                        $usertable = "clients";

                        mysql_connect($hostname, $username, $pass);
                        mysql_select_db($dbname);
                        mysql_set_charset("utf8");

                        $result = mysql_query("SELECT * FROM users");
                        $result2 = mysql_query("SELECT * FROM clients");
                        $b = mysql_query("SELECT COUNT(*) FROM clients GROUP BY manager");
                        $o = mysql_query("SELECT COUNT(*) FROM ads GROUP BY fioads");
                        //echo $b[0]; // выведет число строк

                        while ($a = mysql_fetch_array($result) and $v = mysql_fetch_array($b) and $om = mysql_fetch_array($o) ) {
                            $user = $a['fiouser'];
                            $plandogovorov = $a['plandogovorov'];


                            print("
                  <tbody>
                    <tr>
                    <td>$user</td>
                    <td>$plandogovorov</td>
                    <td>$v[0]</td>
                    <td>$om[0]</td>

                    <td><input class='form-check-input' id='inlineCheckbox1' type='checkbox' name='edit_row[]' value='" . $a["id"] . "'></td>
                    </tr>
                  </tbody>");
                        }
                        print("</table>");
                        //</table>
                        mysql_close();
                        ?>
                        <!--<input type='submit' class="btn btn-primary button-obj" value='Сохарнить'>-->
                </form>
            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>