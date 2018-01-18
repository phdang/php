<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}

?>

<table width="500" border="1" cellspacing="5" cellpadding="5">
  <caption>
    Danh Sách Chủng Loại
  </caption>
  <tr>
    <th width="50" scope="col">STT</th>
    <th width="151" scope="col">Tên</th>
    <th width="59" scope="col">Thứ Tự</th>
    <th width="62" scope="col">Ẩn</th>
    <th width="86" scope="col"><a href="?mod=dept_add">+ Thêm</a></th>
  </tr>
<?php
	$sql = 'SELECT * FROM `nn_department`';
	$rs = mysqli_query($link,$sql);
	$i = 1;
	while ($r = mysqli_fetch_assoc($rs)) { ?>
  <tr>
    <td align="center"><?= $i++ ?></td>
    <td ><?= $r['name'] ?></td>
    <td align="center"><?= $r['order'] ?></td>
    <td align="center"><?= $r['active'] == 0 ? 'v' : '' ?></td>
    <td align="center">
			<a href="?mod=dept_update&dep_id=<?= $r['id'] ?>">Sửa </a>|
			<a onclick="return confirm('Bạn có thực sự muốn xoá chủng loại này');" href="?mod=dept_del&dep_id=<?= $r['id'] ?>">Xóa </a>
		</td>
  </tr>
<?php
	}
?>
</table>
