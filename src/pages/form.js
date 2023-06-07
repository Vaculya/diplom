const FDefault = document.querySelector('.f-default form');
const fBtn = document.querySelector('.f-btn');

fBtn.addEventListener('click', function(e) {

  e.preventDefault();

  let check = true;

  for(let i = 0; i < FDefault.elements.length; i++) {
    let value = FDefault.elements[i].value.trim();
    if(!value) {
      check = false;
      break;
    }
  }

  if(check) {

    fetch('/auth', {
      method: 'POST',
      body: new FormData(FDefault)
    })
    .then(data => data.text())
    .then(data => {

      console.log(data);
      
      if(data == 'errorUser') chips('Такое имя пользователя или e-mail уже существует', 'error');
      else if(data == 'errorAuth') chips('Неверный логин или пароль', 'error');
      else if(data == 'ok') window.location.href = '/user';

    });

  } else chips('Заполните все поля', 'error');

});