<?php
if (isset($_GET['dept_id'])) {

		$dept_id = $_GET['dept_id'];

	} else {

		header('location:?mod=dept');
	}
if (!isset($_SESSION['admin_name'])) {

	header('location:?mod=login');
}
$sql = 'SELECT `id` FROM `nn_category` WHERE  `department_id` = ' . $dept_id;

$rs = mysqli_query($link, $sql) or die($sql);

while ($r = mysqli_fetch_assoc($rs)) {

	$sql = "DELETE FROM `nn_product` WHERE `category_id` = {$r['id']}";

	$rs_product_del = mysqli_query($link, $sql) or die($sql);
}

$sql = "DELETE FROM `nn_category` WHERE `department_id` = $dept_id";

$rs = mysqli_query($link, $sql) or die($sql);

$sql = 'DELETE FROM `nn_department` WHERE `id` = ' . $dept_id ;

$rs = mysqli_query($link, $sql);

if (!$rs) {

	echo 'Không xóa được';

} else {

	header ('location:?mod=dept');
}
?>
