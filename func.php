<?php
// функция для создания данных вида "ключN\tзначениеN\x0A" в файле key.txt
function increaseValue(){
  for($incremented_value=1; $incremented_value<=400; $incremented_value++){
      //открываем файл на чтение и запись
      $file = fopen("key.txt", "a+");
      $string = "ключ" . $incremented_value . "\\t" . "значение" . $incremented_value . "\\x0A" . "\n";
      //пишем значение в файл
      fwrite($file, $string);
    }
}
increaseValue();
