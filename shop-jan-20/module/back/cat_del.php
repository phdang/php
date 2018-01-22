<?php
if (isset($_GET['cat_id'])) {
		
		$cat_id = $_GET['cat_id'];
		
	} else {
		
		header('location:?mod=cat');	
	}
if (!isset($_SESSION['admin_name'])) {
	
	header('location:?mod=login');
}
	
echo $sql = 'DELETE FROM `nn_category` WHERE `id` = ' . $cat_id;

$rs = mysqli_query($link, $sql);

if (!$rs) {
	
	echo 'Không xóa được';
	
} else {
	
	header ('location:?mod=cat');
}

?>