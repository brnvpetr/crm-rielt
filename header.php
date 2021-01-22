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
                                Объекты недвижемости <span class="sr-only">(current)</span>
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
                        <!--<li class="nav-item">
                        <a class="nav-link" href="#">Сотрудники</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Агенты</a>
                    </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="#">SMS</a>
                        </li>
                        <?php if ($_SESSION['groupId'] == 0) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="zarplata.php">Зарплата</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="notepad.php">Блокнот</a>
                        </li>
                        <!--<li class="nav-item">
                        <a class="nav-link" href="#">Объявления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="static.php">Статистика</a>
                    </li>-->
                        <li class="nav-item">

                            <h6 class="nav-link"><?php echo $_SESSION['fiouser']; ?>!</h6>
                        <?php } ?>

                        </li>
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