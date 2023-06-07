<?php

  if(!$_SESSION['user']['id']) { // Если пользователь не авторизован, то запрещаем доступ к этой странице

    http_response_code(404);
    header("Location: /login");
    exit;

  } else { 

    if(isset($_POST['remove'])) {

      require_once 'db.php'; //Подключаем файл БД

      $id = trim($_POST['id']);

      $images = json_decode(fetchAll("SELECT `images` FROM `trips` WHERE `id` = :id AND `user_id` = :user_id", [':id' => $id, ':user_id' => $_SESSION['user']['id']])[0]['images'], 1);

      foreach($images as $value) {
        unlink(str_replace('/src/', '', $value));
      }

      query("DELETE FROM `trips` WHERE `id` = :id AND `user_id` = :user_id", [':id' => $id, ':user_id' => $_SESSION['user']['id']]);

      exit('ok');

    }

    // Если пользователь авторизован, то выгружаем записи путишествий
    require_once 'db.php';
    require_once 'functions.php';

    global $months;

    $months_flip = array_flip($months);
    
    $trips = fetchAll("SELECT * FROM `trips` WHERE `user_id` = :id ORDER BY `date`", [':id' => $_SESSION['user']['id']]);

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/src/pages/user.css?v=2">
</head>
<body>
  <header>
    <div class="heading container">
      <div class="logo">
        <a href="/"><img src="/src/images/header/headerLogo.svg"></a>
      </div>
      <nav class="menu-left menu">
        <ul>
          <li><a href="/logout">Выход</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="profile-user_wrapp container">
      <div class="profile">
        <div class="profile-bg">
          <div class="portrait">
            <img src="/src/images/user/portrait.png">
          </div>
          <div class="profile-name"><?=$_SESSION['user']['name']?></div>
        </div>
        <div class="profile-info"></div>
      </div>
    </div>
    <div class="main-section container">
        <aside>
        <div class="aside-wrapp bg">
          <div class="aside-content">
            <ul>
              <div class="li-wrapp"><li><a href="/user/" class="active"><i class="fas fa-coins" aria-hidden="true"></i> Путишествия</a></li>            </div></ul>
          </div>
        </div>
      </aside>
      <section>
    <div class="section-wrapp">
      <div class="section-title bg">Ваши путешествия</div>
      <div class="section-wrapp_content">
        <div class="trips-wrapp">
          <?php if($trips): ?>
            <?php foreach($trips as $value): ?>
              <?php $images = json_decode($value['images'], 1); ?>
              <div class="trips-item trips-item_blur bg">
                <h4><?=show_date($value['date'], $months_flip)?></h4>
                <p style="margin: 10px 0;"><?=$value['text_about']?></p>
                <div class="trips-img">
                  <?php foreach($images as $img): ?>
                    <img src="<?=$img?>">
                  <?php endforeach; ?>
                </div>
                <button class="rm-btn btn" data-id="<?=$value['id']?>">Удалить</button>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="empty bg" style="padding: 20px; margin-top: 20px">У вас нет сохраненных путешествий</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
</section>
</div>
</main>
<script>
  const rmBtn = document.querySelectorAll('.rm-btn');
  rmBtn.forEach(btn => {
    btn.addEventListener('click', function() {

      let id = this.getAttribute('data-id');
      
      fetch('/user', {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `remove=1&id=${id}`
      })
      .then(data => data.text())
      .then(data => {

        console.log(data);

        if(data == 'ok') window.location.reload();

      })

    });
  });

  let tripsItems = document.querySelectorAll('.trips-item');

  tripsItems.forEach((item)=>{
    
    item.addEventListener('click', ()=>{
      tripsItems.forEach((card)=>{
        if(!card.classList.contains('trips-item_blur')){
          card.classList.add('trips-item_blur')
        }
      })
      if(item.classList.contains('trips-item_blur')){
        item.classList.remove('trips-item_blur');
      }
    })
  })
</script>
</body>
</html>