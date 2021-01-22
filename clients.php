<?php
$hostname = "localhost";
$username = "c16632_crmask_na4u_ru";
$dbname = "c16632_crmask_na4u_ru";
$pass = "YiQbaXelhurux14";
$usertable = "clients";


mysql_connect($hostname, $username, $pass);
mysql_select_db($dbname);



session_start();

if (!isset($_SESSION["login"])) :
    header("location:clients.php");
else :
?>
    <?php
    function isSuperuser()
    {
        if ($_SESSION['groupId'] == 0) {
            return True;
        } else {
            return False;
        }
    }
    ?>




    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <style>
            .select2 {
                display: block;
            }
        </style>
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

            
                <h2>Клиенты заявки</h2>
                <p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#client1">Добавить</button><br>

                    <!--<div class="form-group">
                        <label for="exampleFormControlSelect1">Менеджер</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Шавилова Марина Юрьевна</option>
                        <option>Григорьев Евгений Сергеевич</option>
                        </select>
                    </div>-->
                </p>
                <!--<div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Адрес</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>-->
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Менеджер</>
                            <th>ФИО</th>
                            <th>ТЕЛЕФОН</th>
                            <th>ТИП ЖИЛЬЯ</th>
                            <th>ГОРОД/ОБЛАСТЬ</th>
                            <th>КОММЕНТАРИЙ</th>
                            <th>СУММА</th>
                            <th>Статус</th>
                            <th></th>
                            <th>Удалить запись</th>
                        </tr>
                    </thead>
                    <?php


                    if (isSuperuser()) {
                        $result = mysql_query("SELECT * FROM clients ORDER BY manager");
                    } else {
                        $manager_id = $_SESSION['id'];
                        $result = mysql_query("SELECT * FROM clients WHERE `manager`=$manager_id");
                    }

                    while ($a = mysql_fetch_array($result)) {
                        $id = $a['id'];
                        $managerID = $a['manager'];
                        $fioclient = $a['fioclient'];
                        $phoneclient = $a['phoneclient'];
                        $domclient = $a['domclient'];
                        $cityclient = $a['cityclient'];
                        $commentsclient = $a['commentsclient'];
                        $summamoney = $a['summamoney'];
                        $statusmoney = $a['statusmoney'];

                        $manager_sq = mysql_query("SELECT fiouser FROM users WHERE id=$managerID");
                        $manager = mysql_fetch_array($manager_sq);
                        
                      
                    ?>
                        <tbody>
                            <tr>
                                <form action="services/clients/updateClient.php" method="POST">

                                    <td hidden>
                                        <input type="text" name="id" value="<?= $id ?>" hidden>
                                    </td>

                                    <td>
                                        <?= $manager['fiouser'] ?>
                                        </td>
                                    <td>
                                        <?= $fioclient ?>
                                    </td>
                                    <td>
                                        <input type="text" name="phoneclient" value="<?= $phoneclient ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="domclient" value="<?= $domclient ?>">
                                    </td>
                                    <td>
                                        <?= $cityclient ?>
                                    </td>
                                    <td>
                                        <input type="text" name="commentsclient" value="<?= $commentsclient ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="summamoney" value="<?= $summamoney ?>">
                                        руб.</td>
                                    <td>
                                        <select class="statusmoney" data-client-id="<?= $id ?>" <?php if (isSuperuser()) {
                                                                                                    echo "data-manager-id=\"$managerID\"";
                                                                                                } ?>>
                                            <option value="1" <?php if ($statusmoney == "1") echo 'selected="selected"' ?>>Оплачено</option>
                                            <option value="0" <?php if (!$statusmoney == "1") echo 'selected="selected"' ?>>Не оплачено</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit">Сохранить</button>
                                    </td>
                                </form>
                                <td>
                                    <form action='services/clients/delete.php' method='POST'>
                                        <input class='form-check-input' type='text' name='client_id' value="<?= $id ?>" hidden>
                                        <button type="submit">DEL</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    print("</table>");
                    //</table>
                    mysql_close();
                    ?>


           





        <!-- Модальное окно заявка клиенты-->
        <!-- The Modal -->
        <form action="acction_clients.php" method="post">
            <div class="modal" id="client1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Добавить клиента/заявку</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="/acction_clients.php">
                                <!--<div class="form-group">-->
                                <!--<label for="usermanager">Менеджер:</label>-->
                                <input name="manager" type="text" class="form-control" id="manager" value="<?php echo $_SESSION['id']; ?>" hidden>
                                <!--</div>-->
                                <div class="form-group">
                                    <label for="fio">ФИО:</label>
                                    <input name="fioclient" type="text" class="form-control" id="fio">
                                </div>
                                <div class="form-group">
                                    <label for="phone">ТЕЛЕФОН:</label>
                                    <input name="phoneclient" type="phone" class="form-control" id="phone">
                                </div>
                                <div class="form-group">
                                    <label for="phone">ТИП ЖИЛЬЯ:</label>
                                    <input name="domclient" type="text" class="form-control" id="dom">
                                </div>
                                <div class="form-group">
                                    <label for="phone">ГОРОД/ОБЛАСТЬ:</label>
                                    <select name="cityclient" class="js-example-placeholder-single js-states form-control" id="allSity"></select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">КОММЕНТАРИЙ:</label>
                                    <input name="commentsclient" type="text" class="form-control" id="comments">
                                </div>
                                <div class="form-group">
                                    <label for="phone">СУММА:</label>
                                    <input name="summamoney" type="text" class="form-control" id="summamoney">
                                </div>
                                <button name="submit" type="submit" class="btn btn-primary">Добавить</button>
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
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Крутой выбор городов с поиском -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $(".js-example-placeholder-single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
        </script>
        <!-- / Крутой выбор городов с поиском -->
        <script>
            $(document).ready(function() {
                $('.statusmoney').change(function(e) {
                    $.ajax({
                        type: "POST",
                        url: 'services/clients/updateStatusmoney.php',
                        data: {
                            'statusmoney': $(this).val(),
                            'clientId': $(this).data('clientId'),
                            'userId': <?php if (isSuperuser()) { ?>
                            $(this).data('managerId')
                        <?php } else {
                                            echo $_SESSION['id'];
                                        } ?>
                        },
                        success: function(response) {
                            console.log(response)
                        },
                        error: function(response) {
                            console.log('error: ' + response)
                        }
                    });
                });
            });
        </script>
        <script>
            const createOption = (elem) => {
                const region_with_city = `${elem['region']}, ${elem['city']}`

                let option = document.createElement('option')

                const optionText = document.createTextNode(region_with_city)

                option.appendChild(optionText)
                option.setAttribute('value', region_with_city)
                document.getElementById("allSity").appendChild(option)
            }

            $.getJSON('allSity.json', function(data) {
                const allSity = data.map((elem) => createOption(elem))
            });
        </script>

    </body>

    </html>