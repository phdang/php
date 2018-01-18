<?php
	
	if (isset($_SESSION['admin_name'])) {
		
		$admin_name = $_SESSION['admin_name'];
		
		echo 'Xin chào quản trị ' . $admin_name	;
	
	} else {
		
		header('location:?mod=login');
	}


?>