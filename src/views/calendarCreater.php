<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/src/air-datepicker/air-datepicker.css?v=3">
  <link rel="stylesheet" href="/src/pages/calendarCreater.css?v=2">
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
        <form class="formOfDate form">
          <input type="text" id="airdatepicker" name="date" class="from__input formOfDate__input datepicker-here" readonly>
          <span class="from__input-error airdatepicker-error"></span>
          <button class="btnShow btn">Выбрать даты</button>
        </form>
        <section class="calendar">
          <h2 class="calendar__title">Отдыхай с интересом!</h2>
          <div class="calendar__wrapper">

          </div>
          <button class="add_btn btn" style="margin-top: 20px;" data-user="<?= $_SESSION['user']['id'] ? 'true': 'false'?>">Добавить</button>
        </section>
      </main>
    <footer class="footer">
      <p class="footer__created">
        Данный сайт разработан Матвеевым Владиславом Владимировичем, студентом группы 3901
      </p>
    </footer>

    <!-- <template id="popup-template">

    </template> -->

    <div class="popup popup-my-day">
      <div class="card-crater">
        <h2 class="card-creater__day"></h2>
        <div class="card-creater__wrapper">
          <div class="card-creater__choose">
            <button class="card-creater__round card-creater__save">
              <img src="/src/images/card-creater/save.svg" alt="Сохранить">
            </button>
          </div>
          <form action="/calendarCreater" class="popup__form card-crater__form" method="POST" enctype="multipart/form-data">
            <textarea class="card-creater__text" name="text-about" cols="30" rows="10" placeholder="Введите ваш текст">
            </textarea>
            <div class="card-creater__images-wrapper">

            </div>
            <div class="card-creater__images-wrapper-input">
              <input class="card-creater__img" name="img[]" multiple="true" type="file" accept=".jpeg,.jpg,.gif,.png,.svg,.webp"></input>
              <button class="card-creater__img-add btn">Выбрать</button>
            </div>
          </form>
        </div>
        <div class="my-day">
          <p class="my-day__text"></p>
          <div class="my-day__images">

          </div>
        </div>
      </div>
      <div class="card-crater__content day-content">
        <p class="day-content__text"></p>
        <div class="day-content-photos">

        </div>
      </div>
    </div>
  </div>

  <template id="card-template">
    <div class="card">
      <p class="card__day"></p>
    </div>
  </template>
  <script  src="/src/pages/chips.js?v=2" defer></script>
  <script  src="/src/air-datepicker/air-datepicker.js?v=2"></script>
  <script type="module" src="/src/pages/calendarCreater.js?v=2"></script>
  </body>
</html>
