<?php

  require_once '../src/db.php';

  // Функция для записи данных пользователя в сессию и перенаправление в личный кабинет
  function auth_user($user) { 

    $_SESSION['user'] = [];

    foreach($user as $key => $value) {

      $_SESSION['user'][$key] = $value;

    }

    exit('ok');

  }

  //Функция проверки входных данных
  function check_data($post) {

    $data = [];

    if($post['name'] AND (strlen($post['name']) < 3 OR strlen($post['name']) > 30)) exit('errorName');
    if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) exit('errorEmail');

    foreach($post as $key => $value) {

      $val = trim($value);

      if($val) $data[$key] = htmlspecialchars(strip_tags($value));
      else exit('errorParams');

    }

    return $data;

  }

  if(isset($_POST['type'])) {

    $data = check_data($_POST);

    if($data['type'] == 'register') { // Регистрация пользователя

      if(fetchColumn("SELECT `id` FROM `users` WHERE `email` = :e OR `name` = :n", [':e' => $data['email'], ':n' => $data['name']])) exit('errorUser');
      else {

        query("INSERT INTO `users` VALUES(NULL, :n, :e, :p)", [
          ':n' => $data['name'],
          ':e' => $data['email'],
          ':p' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);

        $user = fetchAll("SELECT * FROM `users` WHERE `email` = :e", [':e' => $data['email']])[0];

        auth_user($user);

      }

    } else { // Авторизация пользователя

      $user = fetchAll("SELECT * FROM `users` WHERE `email` = :e", [':e' => $data['email']])[0];

      if(password_verify($data['password'], $user['password'])) {

        auth_user($user);

      } else exit('errorAuth');

    }

  }

?>