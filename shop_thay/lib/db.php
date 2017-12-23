<?php
	/*
	*	error_reporting(0);//Production mode
	*	error_reporting(E_ALL);//Development mode
	*/
	error_reporting(E_ALL);
	
	//Cau hinh thong tin ket noi MySQL
	$host='localhost';
	$user='root';
	$pass='';
	$db='shop';
	
	//Ket noi
	$link=mysqli_connect($host,$user,$pass,$db) or die('Lỗi kết nối');
	
	//Dong bo charset
	mysqli_set_charset($link,'utf8');
	
	//Set timezone
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>