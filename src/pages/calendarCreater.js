new AirDatepicker('#airdatepicker', {
  days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
  daysShort: ['Вос','Пон','Вто','Сре','Чет','Пят','Суб'],
  daysMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
  months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
  monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
  today: 'Сегодня',
  clear: 'Очистить',
  dateFormat: 'yyyy.MM.dd',
  timeFormat: 'HH:mm',
  firstDay: 1,
  multipleDates: true,
  multipleDatesSeparator: ' - ',
  range: true,
  autoClose: true,
  minDate: new Date(),
  maxDate: getDateAgo(24)
});


const addBtn = document.querySelector('.add_btn');
const popup = document.querySelector('.popup-my-day');
const cardCreaterInputImages = popup.querySelector('.card-creater__img');
const cardCreaterChooseBtn = popup.querySelector('.card-creater__img-add');
const cardCreaterImagesWrapper = popup.querySelector('.card-creater__images-wrapper');


function trigerInput (){
  cardCreaterInputImages.click();
}

function fileReader (file){
  if(!file.type.match('image')){
    return;
  }

   let reader = new FileReader();

  //  Как файлы загрузятся помещаем их в контейнер для фотографий this._cardCreaterImagesWrapper
  reader.onload = (ev)=>{
    cardCreaterImagesWrapper.insertAdjacentHTML('afterbegin', `
    <div class="card-creater__preview-boxImg">
      <div class="card-creater__preview-remove">&times;</div>
      <img class="card-creater__preview-image" src='${ev.target.result}' alt="${file.name}"/>
    </div>
    `);
  };

  // readAsDataURL считывает файл и передает его содержимое как base64 строку
  reader.readAsDataURL(file);
};

function readFiles(e){
  if(!e.target.files.length){
    return;
  }

  cardCreaterImagesWrapper .innerHTML = '';  //Очистим контейнер с фотками
  cardCreaterImagesWrapper .classList.add('card-creater__images-wrapper_opened');

  console.log(e.target);

  let files = Array.from(e.target.files); // массив из загруженных файлов

  console.log(`Загруженные файлы: ${files}`);

  //Работаем с каждым фалом из массива this._files отдельно
  files.forEach((file) => {

    fileReader(file);

  });
}


// _fileReader(file){
  //Проверка является ли загруженный файл картинкой
  // if(!file.type.match('image')){
  //   return;
  // }

  // Встроенный класс чтения загруженных файлов
  // this._reader = new FileReader();

  // //  Как файлы загрузятся помещаем их в контейнер для фотографий this._cardCreaterImagesWrapper
  // this._reader.onload = (ev)=>{
  //   this._cardCreaterImagesWrapper.insertAdjacentHTML('afterbegin', `
  //   <div class="card-creater__preview-boxImg">
  //     <div class="card-creater__preview-remove">&times;</div>
  //     <img class="card-creater__preview-image" src='${ev.target.result}' alt="${file.name}"/>
  //   </div>
  //   `);
  // };

  // // readAsDataURL считывает файл и передает его содержимое как base64 строку
  // this._reader.readAsDataURL(file);
// };

// _readFiles(event){

//   // Если полученных файлов нет, то ничего не делаем
//   if(!event.target.files.length){
//     return;
//   }

//   this._cardCreaterImagesWrapper.innerHTML = '';  //Очистим контейнер с фотками
//   this._cardCreaterImagesWrapper.classList.add('card-creater__images-wrapper_opened');

//   console.log(event.target);

//   this._files = Array.from(event.target.files); // массив из загруженных файлов

//   console.log(`Загруженные файлы: ${this._files}`);

//   //Работаем с каждым фалом из массива this._files отдельно
//   this._files.forEach((file) => {

//     this._fileReader(file);

//   })
// };

cardCreaterChooseBtn.addEventListener('click', (e)=>{
  e.preventDefault();
  trigerInput();
});

cardCreaterInputImages.addEventListener('change', (e)=>{
  console.log('Изменено');
  readFiles(e);
});






















// let dateCopy = new Date(date);

//   dateCopy.setDate(date.getDate() - days);
//   return dateCopy.getDate();

const today = new Date();
// let lastDay =  Date.parse(today);
// let lastDay = today.setDate(today.getDate + 24);
// lastDay = (lastDay);

// function getDateLast(date, days) {
//   let dateCopy = new Date(date);
//   console.log(dateCopy);

//   // dateCopy.setDate(date.getDate() + days);
//   console.log(dateCopy.getDate(dateCopy.setDate(date.getDate() + days)));
//   console.log(new Date(dateCopy.setDate(date.getDate() + days)))
//   return dateCopy.getDate();
// }




const formOfDateInput = document.querySelector('.formOfDate__input');

function getDateAgo(days) {
  const now = new Date();
  return new Date(
      now.getFullYear(),
      now.getMonth(),
      now.getDate() + days,
      now.getHours(),
      now.getMinutes(),
      now.getSeconds());
}

const lastDay = getDateAgo(5);

// formOfDateInput.setAttribute('max', lastDay);

console.log(lastDay);

import Card from '../components/Card.js';
import Section from '../components/Section.js';
import Popup from '../components/Popup.js';
import PopupOfDay from '../components/PopupOfDay.js';




// ТУТ ХРАНЯТСЯ ВСЕ ДАННЫЕ КАРТОЧЕК ПО ИТОГУ(ТЕКСТ И МАССИВ ФОТОГРАФИЙ);
let dataDays = {

}


const elements = document.querySelector('.calendar__wrapper');

// const popupDayClassCreater = (selector, dataDays) => {
//   const popupDayOpener = new PopupOfDay(selector, dataDays);   //создание попапа и передача селектора
//   // popupDayOpener.setEventListeners();
//   // popupDayOpener.open(dataDays);
//   return popupDayOpener;
// };
// const popupDayClassCreated =  popupDayClassCreater('.popup', dataDays);
// popupDayClassCreated.setEventListeners();

// const popupDayClassCreater = (popupSelector, dataDays) => {
//   const popupDayOpener = new PopupOfDay(popupSelector, dataDays);
//   // popupDayOpener.setEventListeners();
//   return popupDayOpener;
// }

const popupMyDayCreater = (popupSelector, dataDays, thisDay) =>{
  const popupMyDay = new PopupOfDay(popupSelector, dataDays, thisDay);
  popupMyDay.setEventListeners();
  console.log("ТРИГЕР ПОСТАВЛЕН");
  return popupMyDay;
}



const classSection = (data) =>{
  const createSection = new Section(
    {
      items : data,
      renderer : (item) => {
        const newCard = cardCreater(item);
        createSection.addItem(newCard);
      }
    }, elements
  );
  return createSection;
};

const cardCreater = (cardData, dataDay) => {     //функция, которая создает карточки
  const card = new Card(                //вызов класса
    cardData,                           //откуда берем данные(начальный массив или данные с формы)
    '#card-template',                   // селктор карточки
    // dataDays.day,
    dataDays[`${cardData.day}`],
    {handleCardClick : (cardData) => {  // функция, открытия попап с данными карточки, как аргумент
      console.log(cardData);
      const popupDayClassReady = popupMyDayCreater('.popup-my-day', dataDays, cardData.day);
      popupDayClassReady.open(cardData);                                    //откртие попапа
      console.log(dataDays);
    }});
  const cardGenerated = card.generateCard(); //генерация карточки
  return cardGenerated;
};


const btnShow = document.querySelector('.btnShow');

const calendarWrapper = document.querySelector('.calendar__wrapper');

const calendar = document.querySelector('.calendar');

btnShow.addEventListener('click', ()=>{
  event.preventDefault();
  calendarWrapper.textContent = '';
  let formDate = document.querySelector('.datepicker-here').value; // поулчае из инпута дат

  if(formDate === ''){
    return
  }

  let ArrayOfDates = [];  // место хранение дат путешесвтия

  if (formDate.includes(' - ')) {
    const twoDates = formDate.split(' - ');
    const dateStartNew = new Date(twoDates[0].replaceAll('.', '-')).getTime();
    const dateEndNew = new Date(twoDates[1].replaceAll('.', '-')).getTime();
    const oneDayMilliseconds = 24 * 60 * 60 * 1000;
  
    for (let i = dateStartNew; i <= dateEndNew; i += oneDayMilliseconds) {
      const dayObj = {
        day: new Date(i).toLocaleString('ru-RU', {
          month: 'long',
          year: 'numeric',
          day: '2-digit'
        })
      };
      ArrayOfDates.push(dayObj);
    }
  } else {
    const oneDay = formDate;
    const oneDayMilliseconds = 24 * 60 * 60 * 1000;
    const oneDayTime = new Date(oneDay.replaceAll('.', '-')).getTime();
    const dayObj = {
      day: new Date(oneDayTime).toLocaleString('ru-RU', {
        month: 'long',
        year: 'numeric',
        day: '2-digit'
      })
    };
    ArrayOfDates.push(dayObj);
  }

  if(ArrayOfDates[0] !== 'Invalid Date'){
    console.log(ArrayOfDates);
    calendar.classList.add('calendar_opened');
    Object.keys(dataDays).forEach(key => delete dataDays[key]);
    ArrayOfDates.forEach((date)=>{
      console.log(date.day);
      dataDays[`${date.day}`] = {};
    });

    console.log(dataDays);

    const cardOfDays = classSection(ArrayOfDates);

    cardOfDays.renderItem();

  }
});

addBtn.addEventListener('click', function() {
  if(this.getAttribute('data-user') == 'true') {

    let data = new FormData();

    setTimeout(() => {

      Object.keys(dataDays).forEach((key, index) => {
        
        if(dataDays[key]['images']) {

          data.append(`${index + 1}_text`, dataDays[key]['text']);
          data.append(`${index + 1}_date`, key);
         
          dataDays[key]['images'].forEach(img => {
            data.append(`${index + 1}_img[]`, img);
          });
          
        }

      });

      fetch('/trips', {
        method: "POST",
        body: data
      })
      .then(result => result.text())
      .then(result => {

        console.log(result);
        
        if(result == 'errorImage') chips('Загружаемые файлы должны быть картинкой', 'error');
        if(result == 'errorDate') chips('Для некоторых из дат уже существуют записи', 'error');
        else if(result == 'ok') window.location.href = '/user';

      });

    }, 500);
    
  } else chips('Вы не авторизованы. Чтобы сохранить авторизуйтесь', 'error');
});