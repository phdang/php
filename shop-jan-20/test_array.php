<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
//Mảng - Array: Cấu trúc tập họp nhiều phần tử
//Mỗi phần tử là 1 cặp key => value

//Khai bao
/*$a = array(1, 2, 7, 9.5, 'Hello');
$b = array(1 => 7, 'A' => 10, 7 => 3);
echo '<pre>';
print_r($a);
print_r($b);
*/
/*//Truy xuat - get
echo $a[2];
echo $b['A'];

//Truy xuat - set
$a[3] = 100;
print_r($a);*/

/*//Thêm phần tử
$a[]=200;

//Cập nhật phần tử (set)
$a[2] = $a[2] + 1;

//Xóa phần tử
unset($a[1]);
print_r($a);*/

//Duyet mang
/*$n = count($a);//Dem so luong phan tu cua mang
for($i = 0; $i < $n; $i++)
echo $a[$i],'<hr>';

foreach($b as $key => $value)
echo $value,'<br>';*/

$c = array(0 => array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));
echo '<pre>';
print_r($c);

foreach($c as $k => $v)
	foreach($v as $k2 => $v2)
		echo $v2;

?>
</body>
</html>