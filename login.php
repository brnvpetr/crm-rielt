<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Форма авторизации и регистрации | pcvector.net</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=cyrillic" rel="stylesheet">
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script>var articleLink = '/scripts/forms/499-veb-forma-avtorizacii-i-registracii-na-sayte.html';</script>

<div class="cotn_principal">
  <div class="cont_centrar">
    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
            <h2>Войти</h2>
            <p>У вас уже есть логин?</p>
            <button class="btn_login" onclick="cambiar_login()">Войти</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">
            <h2>Регистрация</h2>
            <p>Нет логина?</p>
            <button class="btn_sign_up" onclick="cambiar_sign_up()">Зарегистрироваться</button>
          </div>
        </div>
      </div>
      <div class="cont_back_info">
        <div class="cont_img_back_grey">
          <img src="img/bg.jpg" alt="" />
        </div>
      </div>
      <div class="cont_forms">
        <div class="cont_img_back_">
          <img src="img/bg.jpg" alt="" />
        </div>
        <form  action="testreg.php" method="post">
        <div class="cont_form_login">
          <form class="form-signin" action="testreg.php" method="post">
          <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
          <h2>Войти</h2>
          <input name="login" type="text" placeholder="Логин" />
          <input name="password" type="password" placeholder="Пароль" />
          <button class="btn_login" onclick="cambiar_login()">Войти</button>
        </div>
        </form>
        <form action="save_user.php" method="post">
        <div class="cont_form_sign_up">
          <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
          <h2>Регистрация</h2>
          <input name="fiouser" type="text" placeholder="ФИО Менеджер" />
          <input name="emailuser" type="text" placeholder="E-mail" />
          <input name="login" type="text" placeholder="Логин" />
          <input name="password" type="password" placeholder="Пароль" />
          <button name="submit" class="btn_sign_up" onclick="cambiar_sign_up()">Зарегистрироваться</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

  <script src="js/index.js"></script>
  <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']) or empty($_SESSION['fiouser']))
    {
    // Если пусты, то мы не выводим ссылку
    //echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {

    // Если не пусты, то мы выводим ссылку
    //echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='index.php'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
    }
    ?>
</body>
</html>
