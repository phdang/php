<?php
if (!isset($_SESSION['admin_name'])) {

	header('location:?mod=login');
}

if (isset($_GET['cat_id'])) {

		$cat_id = $_GET['cat_id'];

} else {

	header('location:?mod=product');
}

if (isset($_GET['page'])) {

		$current_page = $_GET['page'];

} else {

	$current_page = 1;
}

if (isset($_GET['pro_id'])) {

		$pro_id = $_GET['pro_id'];

} else {

	header('location:?mod=product');
}

if (!is_numeric($pro_id) || !is_numeric($cat_id) || !is_numeric($page)) {
	//header('location:?mod=product');
}

$sql = 'DELETE FROM `nn_product` WHERE `id` = ' . $pro_id;

$rs = mysqli_query($link, $sql);

if (!$rs) {

	echo 'Không xóa được';

} else {
	header ("location:?mod=product&cat_id={$cat_id}&page={$current_page}");
}
?>
