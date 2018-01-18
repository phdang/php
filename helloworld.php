<!DOCTYPE html>

<html>

     <head>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel= "stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<link href="animate.css" rel="stylesheet">

	<script src="jquery-3.2.1.min.js"></script>

	<script src="bootstrap.min.js"></script>

	<style type="text/css">







	</style>

	<meta charset ="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>First PHP</title>


     </head>




     <body>

	<div class="container code">

<?php

  echo '<h1>Hello World!</h1>';

  $array = ['Hello' => 'World'];

  //echo $array["Hello"];

  $multiArray = Array(
      Array("id" => 1, "name" => "Defg"),
      Array("id" => 2, "name" => "Abcd"),
      Array("id" => 3, "name" => "Bcde"),
      Array("id" => 4, "name" => "Cdef"));
  $tmp = Array();
  foreach($multiArray as $v)
      $tmp[] = $v["name"];
  array_multisort($tmp, $multiArray);

  //print_r($multiArray);

  $danhSachSinhVien = array(
  array(
  'MSSV' => 'SV001',
  'hoTen' => 'Phạm Văn Hoa',
  'DTB' => '7.5',
  'LinkUrlAvatar' =>'images/SV_01.png'
  ),
  array(
  'MSSV' => 'SV002',
  'hoTen' => 'Lê Thị Hiền',
  'DTB' => '5',
  'LinkUrlAvatar' =>'images/SV_02.png'
  ),
  array(
  'MSSV' => 'SV003',
  'hoTen' => 'Lê Thị Hồng',
  'DTB' => '9.5',
  'LinkUrlAvatar' =>'images/SV_03.png'
  ),
  array(
  'MSSV' => 'SV004',
  'hoTen' => 'Phạm Lê Tuấn Khải',
  'DTB' => '3.5',
  'LinkUrlAvatar' =>'images/SV_04.png'
  ),
  array(
  'MSSV' => 'SV005',
  'hoTen' => 'Nguyễn Huyền Hải',
  'DTB' => '4.5',
  'LinkUrlAvatar' =>'images/SV_05.png'
  ),
  array(
  'MSSV' => 'SV006',
  'hoTen' => 'Hồ Thanh Hiền',
  'DTB' => '8.5',
  'LinkUrlAvatar' =>'images/SV_06.png'
  ),
  array(
  'MSSV' => 'SV007',
  'hoTen' => 'Lâm Thanh Nga',
  'DTB' => '7.5',
  'LinkUrlAvatar' =>'images/SV_07.png'
  ),
  array(
  'MSSV' => 'SV008',
  'hoTen' => 'Ngô Thanh Hiền',
  'DTB' => '7.5',
  'LinkUrlAvatar' =>'images/SV_08.png'
  ),
  array(
  'MSSV' => 'SV009',
  'hoTen' => 'Mai Huyền Hải',
  'DTB' => '8',
  'LinkUrlAvatar' =>'images/SV_09.png'
  ),
  array(
  'MSSV' => 'SV010',
  'hoTen' => 'Mai Văn Hồ',
  'DTB' => '5',
  'LinkUrlAvatar' =>'images/SV_10.png'
  )
  );

//Bo dau Tieng Viet

function convert_to_unicode ($str){

$unicode = array(

'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

'd'=>'đ',

'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

'i'=>'í|ì|ỉ|ĩ|ị',

'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

'D'=>'Đ',

'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

);

foreach($unicode as $nonUnicode=>$uni){

$str = preg_replace("/($uni)/i", $nonUnicode, $str);

}

return $str;

}

function ten_tu_hoten($ho_ten) {

  $len = strlen($ho_ten) - 1;
  $ten = '';
  for ($i = $len; $i > 0; $i-- ) {
    if (substr($ho_ten, $i - 1, 1) === ' ') {

      $ten = substr($ho_ten, $i);

      break;
    }
  }
  return $ten;
}

  // $str = 'Phạm Văn Hoa';
  // echo ten_tu_hoten($str);

  $tmp = Array();
  foreach($danhSachSinhVien as $values) {
      //echo ten_tu_hoten($values['hoTen']);
      $ten = convert_to_unicode($values['hoTen']);
      $tmp[] = ten_tu_hoten($ten);
  }
  array_multisort($tmp, SORT_ASC, $danhSachSinhVien); //DESC giảm dần
  echo '<pre>';
  print_r($danhSachSinhVien);

  //phpinfo();

  //Encrypt

  //echo hash('sha512', hash('sha512', '123')), '<br>';

  //echo '4f22a5b713259a8b3e6d47c9073d7eef25e6ced4c20cbe49abaaa2e80b01e4e37c1a7c16891810668dd9a6bd88f259bbf8b7a672d37e785c3f2f3aa0b7169b54'
?>

	</div>

     </body>


</html>
