<?php

// In tat ca session đã được tạo

	//print_r($_SESSION);

// Huy Session đã tạo ra
	
	unset($_SESSION['id']);

//Chuyển trang dùng PHP

	header('location:?mod=login');
?>
