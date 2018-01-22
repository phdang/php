<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}

	$cat_id = isset($_GET['cat_id']) ?  $_GET['cat_id'] : 0;

	if (!is_numeric($cat_id)) {
		header('location:?mod=product&cat_id=0');
	}

	if ($cat_id < 0) {

		$cat_id = 0;
	}

	$current_page = isset($_GET['page']) ?  $_GET['page'] : 1;

	if (!is_numeric($current_page)) {
		header('location:?mod=product&cat_id=' . $cat_id . '&page=1');
	}
	if ($current_page < 1) {
		$current_page = 1;
	}
?>
<table width="80%" border="1" cellspacing="5" cellpadding="5">
	Chọn theo
	<select id = "cat_id" onChange="location='?mod=product&cat_id=' + this.value;">
		<option value="0">Tất cả</option>
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
				<option <?= $r['id'] == $cat_id ? 'selected' : '' ?> value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
	<?php
	} else {?>

			<option <?= $r['id'] == $cat_id ? 'selected' : '' ?> value="<?= $r['id'] ?>"><?= $r['name'] ?></option>

	<?php
	}
}
 ?>
	</select>
	<?php
	$products_per_page = 10;
	$position = ($current_page - 1) * $products_per_page;
	if ($cat_id != 0) {
		$sql = 'SELECT cat.`name` AS `cat_name`, `pro`.* FROM `nn_category` AS `cat`, `nn_product` AS `pro`
		WHERE `pro`.`category_id` = `cat`.`id` AND `pro`.`category_id` = ' . $cat_id . " ORDER BY `cat`.`id` LIMIT $position, $products_per_page;";
		$sql_count = 'SELECT COUNT(*) AS total FROM `nn_product` WHERE `category_id` = ' . $cat_id;
	} else {
		$sql = 'SELECT cat.`name` AS `cat_name`, `pro`.* FROM `nn_category` AS `cat`, `nn_product` AS `pro`
		WHERE `pro`.`category_id` = `cat`.`id`' .
		" ORDER BY `cat`.`id` LIMIT $position, $products_per_page;";
		$sql_count = 'SELECT COUNT(*) AS total FROM `nn_product`';
	}
		$rs = mysqli_query($link,$sql) or die($sql);

		$number_of_rows = mysqli_num_rows($rs);
	?>
  <caption>
    <?=  $number_of_rows > 0 ? 'Danh Sách Sản Phẩm' : 'Hiện chưa có sản phẩm nào' ?>
  </caption>

  <tr>
    <th width="" scope="col">STT</th>
    <th width="" scope="col">Tên loại</th>
    <th width="" scope="col">Tên</th>
		<th width="" scope="col">Giá</th>
		<th width="" scope="col">Mô tả</th>
		<th width="" scope="col">Chi tiết</th>
		<th width="" scope="col">Hình</th>
		<th width="" scope="col">Ngày tạo</th>
		<th width="" scope="col">Số lượng</th>
		<th width="" scope="col">Ghi chú</th>
    <th width="" scope="col">Đã bán</th>
    <th width="" scope="col">Ẩn</th>
    <th width="" scope="col"><a href="?mod=product_add&cat_id=<?= $cat_id ?>&page=<?= $current_page ?>">+ Thêm</a></th>
  </tr>

	<?php
	$i = 1;
	while ($r = mysqli_fetch_assoc($rs)) { ?>
  <tr>
    <td align="center"><?= $position + $i++ ?></td>
    <td align="center"><?= $r['cat_name'] ?></td>
    <td ><?= $r['name'] ?></td>
		<td align="center"><?= number_format($r['price']) ?></td>
		<td><?= $r['desc'] ?></td>
		<td align="center"><?= $r['detail'] ?></td>
		<td align="center"><img width="100%" src="images/sanpham/<?= is_file('images/sanpham/' . $r['img_url']) ? $r['img_url'] : 'noImage.jpg' ?>"></td>
		<td align="center"><?= $r['create_at'] ?></td>
		<td align="center"><?= $r['qty'] ?></td>
		<td align="center"><?= $r['note'] ?></td>
    <td align="center"><?= $r['sold'] == 0 ? 'Chưa' : '' ?></td>
    <td align="center"><?= $r['active'] == 0 ? 'v' : '' ?></td>
    <td align="center">
    <a href="?mod=product_update&cat_id=<?= $cat_id ?>&pro_id=<?= $r['id'] ?>&page=<?= $current_page ?>">Sửa </a>|
    <a onclick ="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?')" href="?mod=product_del&cat_id=<?= $cat_id ?>&page=<?= $current_page ?>&pro_id=<?= $r['id'] ?>">Xóa </a>
    </td>
  </tr>
<?php
	}
?>
</table>
<!-- phân trang -->
<?php
	$rs = mysqli_query($link,$sql_count) or die($sql_count);
	$r = mysqli_fetch_assoc($rs);
	$total_items = $r['total'];
	$total_pages = ceil($total_items/$products_per_page);
	$total_pages_display = 9; //must be an odd number
	$pages_after_current_page = ($total_pages_display -1) / 2;
	$start_page = max(1,$current_page - $pages_after_current_page);
	$end_page = min($total_pages, $current_page + $pages_after_current_page);
	$i = $start_page;
	// Không có sản phẩm thì không phân trang
	if (($total_items > 0) || ($number_of_rows > 0)) {
?>
<ul class="right pagination">
		<li class="text">Trang
				<a href="?mod=product&cat_id=<?= $cat_id ?>&page=1">&lt;&lt;</a>
				<a href="?mod=product&cat_id=<?= $cat_id ?>&page=<?= max($current_page - $pages_after_current_page, 1) ?>">&lt;</a>
				<?php while ($start_page <= $end_page)  {?>
				<a href="?mod=product&cat_id=<?= $cat_id ?>&page=<?= $i ?>" class="colr <?= $i++ == $current_page  ? 'current' : '' ?>"><?= $start_page++ ?></a>
			<?php } ?>
			<a href="?mod=product&cat_id=<?= $cat_id ?>&page=<?= min($total_pages, $current_page + $pages_after_current_page) ?>">&gt;</a>
			<a href="?mod=product&cat_id=<?= $cat_id ?>&page=<?= $total_pages ?>">&gt;&gt;</a>
		</li>
</ul>

<?php
}

if ($number_of_rows == 0) {

	if ($current_page > 1) {

		$current_page -= 1;
		header ("location:?mod=product&cat_id={$cat_id}&page={$current_page}");
	}
}
?>
