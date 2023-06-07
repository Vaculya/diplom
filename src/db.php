<?php

  $db = new PDO('mysql:dbname=sayskas9_advent;host=localhost;charset=utf8', 'sayskas9_advent', 'OpM**6A4');

  function query($sql, $params = []) {
    global $db;
    $smtp = $db->prepare($sql);
    $smtp->execute($params);
    return $smtp;
  }

  function fetchAll($sql, $params = []) {
    $smtp = query($sql, $params);
    return $smtp->fetchAll(PDO::FETCH_ASSOC);
  }

  function fetchColumn($sql, $params = []) {
    $smtp = query($sql, $params);
    return $smtp->fetchColumn();
  }


?>