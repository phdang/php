<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}

?>

<table width="650" border="1" cellspacing="5" cellpadding="5">
  <caption>
    Danh Sách Loại
  </caption>
  <tr>
    <th width="50" scope="col">STT</th>
    <th width="150" scope="col">Tên chủng loại</th>
    <th width="151" scope="col">Tên</th>
    <th width="59" scope="col">Thứ Tự</th>
    <th width="62" scope="col">Ẩn</th>
    <th width="86" scope="col"><a href="?mod=cat_add">+ Thêm</a></th>
  </tr>
<?php
	$sql = 'SELECT dep.`name` AS `dept_name`, `cat`.* FROM `nn_category` AS `cat`, `nn_department` AS `dep`
	WHERE `dep`.`id` = `cat`.`department_id`
	ORDER BY `department_id`';
	$rs = mysqli_query($link,$sql);
	$i = 1;
	while ($r = mysqli_fetch_assoc($rs)) { ?>
  <tr>
    <td align="center"><?= $i++ ?></td>
    <td align="center"><?= $r['dept_name'] ?></td>
    <td ><?= $r['name'] ?></td>
    <td align="center"><?= $r['order'] ?></td>
    <td align="center"><?= $r['active'] == 0 ? 'v' : '' ?></td>
    <td align="center">
    <a href="?mod=cat_update&cat_id=<?= $r['id'] ?>">Sửa </a>|
    <a onclick ="return confirm('Bạn có chắc chắn muốn xóa chủng loại này')" href="?mod=cat_del&cat_id=<?= $r['id'] ?>">Xóa </a>
    </td>
  </tr>
<?php
	}
?>
</table>
