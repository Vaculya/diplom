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
          <h2 class="description__title">Твой цифровой Адвент-календарь</h2>
          <p class="description__text">RELAXING TRIP - это платформа для быстрого и простого создания онлайн-календаря 
            Адвента для путешествий. Здесь вы можете сами создать карточки самостоятельно. <br> Пожалуйста заполняйте все поля(фотографии и текст), инчае день не будет сохраняться</p>
          <button class="create-trip btn" onclick="window.location.href='/calendarCreater'">Создать путешествие</button>
        </section>
      </main>
    <footer class="footer">
      <p class="footer__created">
        Данный сайт разработан Матвеевым Владиславом Владимировичем, студентом группы 3901
      </p>
    </footer>
  </div>
  </body>
</html>
