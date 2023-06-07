<?php

  if(isset($_POST['1_text'])) {

    require_once 'functions.php'; // Подключить файл с функциями
    require_once 'db.php'; //Подключаем файл БД

    foreach($_POST as $key => $value) {

      if(preg_match('/^\d+_text$/', $key)) {

        $num = explode('_', $key)[0];

        $text = trim(htmlspecialchars(strip_tags($_POST[$num.'_text'])));
        $date = trim(htmlspecialchars(strip_tags($_POST[$num.'_date'])));

        $f_date = set_date($date);

        $check = fetchColumn("SELECT `id` FROM `trips` WHERE `date` = :d AND `user_id` = :user_id", [':d' => $f_date, ':user_id' => $_SESSION['user']['id']]);
        if($check) exit('errorDate');

        if($text AND $f_date AND $_FILES[$num.'_img']['name'][0]) {

          $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/gif', 'image/webp', 'image/png', 'image/svg'];
          $allowedExtensions = ['jpg', 'jpeg', 'gif', 'webp', 'png', 'svg'];

          foreach ($_FILES[$num.'_img']['tmp_name'] as $key => $tmpName) {
            $fileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $tmpName);
            $ext = pathinfo($_FILES[$num.'_img']['name'][$key], PATHINFO_EXTENSION);

            if (!in_array($fileType, $allowedMimeTypes) || !in_array($ext, $allowedExtensions)) {
              exit('errorImage');
            }
          }


          foreach($_FILES[$num.'_img']['type'] as $value) {

            if(!in_array($value, ['image/jpeg', 'image/jpg', 'image/gif', 'image/webp', 'image/png', 'image/svg'])) {
              exit('errorImage');
            }
          }

          $images = [];

          $img_path = 'images/user/'.translit($_SESSION['user']['name']); // Строим путь до папки пользователя с картинками

          if(!file_exists($img_path)) mkdir($img_path); // Если нет папки под пользователя, то создаем

          foreach($_FILES[$num.'_img']['name'] as $key => $value) {

            preg_match('/[^\..*]+$/', $value, $matches);
      
            $count_img = count(glob($img_path.'/*'));
            $path = $img_path.'/'.translit($_SESSION['user']['name']).'-'.($count_img + 1).'.'.trim($matches[0]);
      
            move_uploaded_file($_FILES[$num.'_img']['tmp_name'][$key], $path);
      
            $images[] = '/src/'.$path;
      
          }

          // Сохроняем запись в БД
          query("INSERT INTO `trips` VALUES(NULL, :user_id, :text_about, :images, :d)", [
            ':user_id' => $_SESSION['user']['id'],
            ':text_about' => $text,
            ':images' => json_encode($images),
            ':d' => $f_date,
          ]);

        }

      } else continue;

    }

    exit('ok');

  }

?>