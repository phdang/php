<?php
	//Huy cac session da duoc tao trong login
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	
	//Chuyen den trang dang nhap
	header('location:?mod=login');
?>