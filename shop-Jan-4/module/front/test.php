<?php
  $str = "Chuc moi nguoi moi ngay vui ve";
  $len_str = strlen($str);
  $str_array = [];
  $count_str_array = [];
  for ($i = 0; $i < $len_str; $i++) {

      $char = substr($str,$i,1);

      if (in_array($char,$str_array)) {

        $count_str_array[$char]++;

      } else {

        $str_array[] = $char;
        $count_str_array[$char] = 1;

      }

  }
  $str_array = null;
  echo '<pre>';
  print_r($count_str_array);

?>
