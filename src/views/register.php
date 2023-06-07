<?php if($_SESSION['user']) header("Location: /user"); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/src/pages/index.css?v=2">
  <title>Адвент-календарь</title>
</head>
<body class="page">
  <div class="page__wrapper">
      <header class="header">
        <div class="logo logo_position_header">
          <img class="logo__img" src="/src/images/header/headerLogo.svg" alt="Логотип">
          <div class="logo__text">
            <h1 class="logo__title">RELAXING TRIP</h1>
            <p class="logo__subtitle">Путешествуй легко!</p>
          </div>
        </div>
        <input type="checkbox" id="header__menu-btn-input" class="header__menu-hidden-ticker">
        <label class="header__btn-menu header__btn-menu_hidden" for="header__menu-btn-input">
          <span class="first"></span>
          <span class="second"></span>
          <span class="third"></span>
        </label>
        <nav class="header__menu header__menu_hidden header__menu-list">
            <a  class="header__menu-item header__menu-link" href="/">Начать</a>
            <a  class=" header__menu-item header__menu-link" href="/user">Ваше путешествие</a>
            <a  class="header__menu-item header__menu-link" href="/login">Мой кабинет</a>
        </nav>
      </header>
      <main class="main">
        <section class="description">
          <div class="f-default">
            <div class="f-default__top">
              <nav>
                <ul>
                  <li><a href="/login">Вход</a></li>
                  <li><a href="/register" class="active">Регистрация</a></li>
                </ul>
              </nav>
            </div>
            <div class="f-default__bottom">
              <div class="f-default__bottom">
                <form action="/login" method="POST">
                  <input type="name" name="name" placeholder="Имя">
                  <input type="email" name="email" placeholder="Email">
                  <input type="password" name="password" placeholder="Пароль">
                  <input type="hidden" name="type" value="register">
                  <button class="f-btn" name="enter" value="1">Зарегистрироваться</button>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
    <footer class="footer">
      <p class="footer__created">
        Данный сайт разработан Матвеевым Владиславом Владимировичем, студентом группы 3901
      </p>
    </footer>
  </div>
  <script src="/src/pages/chips.js?v=2" defer></script>
  <script src="/src/pages/form.js?v=2" defer></script>
  </body>
</html>
