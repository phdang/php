<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}

	$cid = isset($_GET['cid']) ? $_GET['cid'] : 1;

?>

<table width="80%" border="1" cellspacing="5" cellpadding="5">
  <caption>
    Danh Sách Loại
    <select id = "cat_id" onChange="location='?mod=product&cid=' + this.value;">
    <?php
    $sql = 'SELECT dep.`name` AS `dept_name`, `cat`.* FROM
															`nn_category` AS `cat`
															LEFT JOIN `nn_department` AS `dep`
															ON `dep`.`id` = `cat`.`department_id`
															ORDER BY `department_id`';
	$dept_name = array();
	$rs = mysqli_query($link,$sql);
	while ($r = mysqli_fetch_assoc($rs)) {

		if (!in_array($r['dept_name'],$dept_name)) {

			if (count($dept_name) > 0) {?>
			</optgroup>
            <?php
			}


			$dept_name[] = $r['dept_name']



		 ?>

    	<optgroup label="<?= $r['dept_name'] ?>">
        	<option <?= $r['id'] == $cid ? 'selected' : '' ?> value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
    <?php
		} else {?>

        <option <?= $r['id'] == $cid ? 'selected' : '' ?> value="<?= $r['id'] ?>"><?= $r['name'] ?></option>

    <?php
		}
	}
	 ?>
    </select>
  </caption>

  <tr>
    <th width="50" scope="col">STT</th>
    <th width="150" scope="col">Tên loại</th>
    <th width="151" scope="col">Tên</th>
    <th width="59" scope="col"> Giá</th>
    <th width="59" scope="col">Số lượng</th>
    <th width="62" scope="col">Ẩn</th>
    <th width="86" scope="col"><a href="?mod=pro_add">+ Thêm</a></th>
  </tr>
<?php
	$sql = 'SELECT cat.`name` AS `cat_name`, `pro`.* FROM
	`nn_product` AS `pro` LEFT JOIN `nn_category` AS `cat`
	ON `cat`.`id` = `pro`.`category_id`
	WHERE  `pro`.`category_id` = ' . $cid . '
	ORDER BY `category_id`';
	$rs = mysqli_query($link,$sql);
	$i = 1;
	while ($r = mysqli_fetch_assoc($rs)) { ?>
  <tr>
    <td align="center"><?= $i++ ?></td>
    <td align="center"><?= $r['cat_name'] ?></td>
    <td ><?= $r['name'] ?></td>
    <td align="right"><?= number_format($r['price']) ?></td>
    <td align="right"><?= $r['qty'] ?></td>
    <td align="center"><?= $r['active'] == 0 ? 'v' : '' ?></td>
    <td align="center">
    <a href="?mod=pro_update&cat_id=<?= $r['id'] ?>">Sửa </a>|
    <a onclick ="return confirm('Bạn có chắc chắn muốn xóa chủng loại này')" href="?mod=pro_del&cat_id=<?= $r['id'] ?>">Xóa </a> |
    <a href="index.php?mod=detail&id=<?= $r['id'] ?>">Chi tiết</a>
    </td>
  </tr>
<?php
	}
?>
</table>
