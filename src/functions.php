<?php

  global $months;

  $months = [
    'января' => '01',  
    'февраля' => '02',  
    'марта' => '03',  
    'апреля' => '04',  
    'мая' => '05',  
    'июня' => '06',  
    'июля' => '07',  
    'августа' => '08',  
    'сентября' => '09',  
    'октября' => '10',  
    'ноября' => '11',  
    'декабря' => '12',  
  ];

  function translit($value) {
      
    $converter = array(
      'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
      'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
      'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
      'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
      'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
      'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
      'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
  
      'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
      'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
      'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
      'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
      'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
      'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
      'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
    );
    
    $value = strtr($value, $converter);
    $value = preg_replace('/[^\w]+|\_+/mi', ' ', $value);
    return trim(mb_strtolower(preg_replace('/\s+/mi', '-', $value)), '-');

  }

  function set_date($date) {
    global $months;
    $date_arr = explode(' ', $date);
    return $date_arr[2].'-'.$months[$date_arr[1]].'-'.$date_arr[0];
  }

  function show_date($date, $arr) {
    $date_arr = explode('-', explode(' ', $date)[0]);
    return $date_arr[2].' '.$arr[$date_arr[1]].' '.$date_arr[0].' г.';
  }

?>