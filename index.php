<?php

function binarySearch($file, $key_value){
    $file = fopen($file, "r");
    while (!feof($file)){
      //чтение данных по 4000байт
      $string = fgets($file, 4000);
      //mb_convert_encoding($string, "UTF-8");
      $explode_string = explode('\x0A', $string);

      foreach ($explode_string as $key){
        //создаем массив в массиве где ключ и значение хранятся по отдельности
        $array[] = explode('\t', $key);
      }


     //определям начало и конец
     $start = 0;
     $end = count($array);

     while ($start <= $end){
       //усреднеяем значение с округлением
       $mid_value = floor(($start + $end) / 2);
       //сравнение строк с учетом регистра
       $strcmp = strcmp($array[$mid_value][0], $key_value);
       if ($strcmp < 0){
         $start = $mid_value + 1;
       } elseif ($strcmp > 0){
         $end = $mid_value - 1;
       } else {
         return $array[$mid_value][1];
       }

     }
  }
  return "undef";
}


echo binarySearch("key.txt", "ключ43"); //вернет "значение 43"
echo "<br>";
echo binarySearch("key.txt", "ключ3322"); //вернет undef
