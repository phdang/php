<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}
	if (isset($_POST['name'])) {

		$cat_id = $_POST['cat_id'];

		$name = $_POST['name'];

		$price = $_POST['price'];

		$desc = $_POST['desc'];

		$detail = $_POST['detail'];

		$qty = $_POST['qty'];

		$note = $_POST['note'];

		$active = $_POST['active'];
		
		if (!empty($_FILES['img_url']['name'])) {

			$file_name = $_FILES['img_url']['name'];

			while (is_file('images/sanpham/' . $file_name)) {
				$file_name = '1_' . $file_name;
			}
			$file_path = $_FILES['img_url']['tmp_name'];
			copy($file_path,'images/sanpham/' . $file_name);

		}
			$sql = "INSERT INTO `nn_product` VALUES
			(NULL, '{$cat_id}', '{$name}', '{$price}', '{$desc}', '$detail', '$file_name', now(), '$qty', '$note', '0', '0', '$active')";

			$rs = mysqli_query($link, $sql);

			if ($rs) {

				header('location:?mod=product');

			} else {

				echo 'Cập nhật thất bại';

			}
	}
?>
<form action="" method="post" id="pro_add" enctype="multipart/form-data">
		<table width="80%" border="1" cellspacing="5" cellpadding="5">

        <caption>
      THÊM SẢN PHẨM
    </caption>
  <tr>
    <th width="20%" scope="row">Tên</th>
    <td width="25%"><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <th scope="row">Giá</th>
    <td><input type="text" name="price" id="price"></td>
  </tr>
  <tr>
    <th scope="row">Số lượng</th>
    <td><input type="number" value="1" min="1" name="qty" id="qty"></td>
  </tr>
  <tr>
    <th scope="row">Hình</th>
    <td><input type="file" name="img_url" id="img_url"></td>
  </tr>
  <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><select name="active" id="active">
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row"> Thuộc loại</th>
      <td>
				<select id="cat_id" name="cat_id">
	    <?php
	    $sql = 'SELECT dep.`name` AS `cat_name`, `cat`.* FROM
																`nn_category` AS `cat`
																LEFT JOIN `nn_department` AS `dep`
																ON `dep`.`id` = `cat`.`department_id`
																ORDER BY `department_id`';
		$cat_name = array();
		$rs = mysqli_query($link,$sql);
		while ($r = mysqli_fetch_assoc($rs)) {

			if (!in_array($r['cat_name'],$cat_name)) {

				if (count($cat_name) > 0) {?>
				</optgroup>
	            <?php
				}


				$cat_name[] = $r['cat_name']



			 ?>

	    	<optgroup label="<?= $r['cat_name'] ?>">
	        	<option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
	    <?php
			} else {?>

	        <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>

	    <?php
			}
		}
		 ?>
	    </select>
		</td>
    </tr>
  <tr>
    <th scope="row">Mô tả</th>
    <td><textarea name="desc" id="desc"></textarea></td>
  </tr>
  <tr>
    <th scope="row">Chi tiết</th>
    <td><textarea name="detail" id="detail"></textarea></td>
  </tr>
  <tr>
    <th scope="row">Ghi chú</th>
    <td><textarea name="note" id="note"></textarea></td>
  </tr>
  <tr>
      <th scope="row">&nbsp;</th>
      <td><button type="submit">Submit</button>
      <button type="reset">Reset</button></td>
    </tr>
</table>


</form>
