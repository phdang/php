<?php
if ( ! isset($_SESSION['id'])) {
		
		header('location:?mod=login');
}

//Lay id nguoi dung khi dang nhap

$userId = $_SESSION['id'];

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	
	//Update table order
	
	$sql = 'UPDATE `nn_order` SET `status` = -1 WHERE `status` = 0 AND `user_id` = ' . $userId . '`id` =' . $id;
	
	mysqli_query($link,$sql) or die($sql);
	
	//echo $sql;
	
	//header('location:?mod=account');
	
} 

header('location:?mod=account');



?>