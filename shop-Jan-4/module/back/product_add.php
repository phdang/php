<?php
	if (!isset($_SESSION['admin_name'])) {

		header('location:?mod=login');
	}

	if (isset($_GET['cat_id'])) {
			if (is_numeric($_GET['cat_id'])) {

				$cat_id = $_GET['cat_id'];

			} else {
				 header('location:?mod=product');
			 }
	} else {
			header('location:?mod=product');
	}

	if (isset($_POST['cat_id'])) {

		$cat_id = $_POST['cat_id'];

		$name = $_POST['product'];

		$name =  ucwords(strtolower($name));

		$price = $_POST['price'];

		if (is_numeric($price)) {
			if ($price < 0) {
				$price = 0;
			}
		} else {
			$price = 0;
		}

		$desc = $_POST['desc'];

		$detail = $_POST['detail'];

		$note = $_POST['note'];

		$sold = $_POST['sold'];

		$qty = $_POST['qty'];

		if (is_numeric($qty)) {
			if ($qty < 0) {
				$qty = 0;
			}
		} else {
			$qty = 0;
		}

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
		(NULL, '$cat_id', '{$name}', '$price', '$desc', '$detail', '$file_name', now(), '$qty', '$note', '$sold', '0', '{$active}')";

		$rs = mysqli_query($link, $sql) or die($sql);

		if ($rs) {

			header('location:?mod=product&cat_id=' . $cat_id);

		} else {

			echo 'Cập nhật thất bại';
		}
	}
	$sql = 'SELECT `name`, `id` FROM `nn_category`';
	$rs = mysqli_query($link, $sql) or die($sql);
?>

<form action="" method="post" id="product_add" enctype="multipart/form-data">
		<h3>Thêm sản phẩm</h3>
        <ul class="forms">
            <li class="txt"><label for="cat_id">Tên loại</label></li>
            <li class="">
           		<select name="cat_id" >
                <?php
				while ($r = mysqli_fetch_assoc($rs)) { ?>

            		<option value="<?= $r['id'] ?>" <?= $r['id'] == $cat_id ? 'selected' : '' ?>><?= $r['name'] ?> </option>

                <?php
				}
				?>
                </select>
            </li>
        </ul>

				<ul class="forms">
						<li class="txt"><label for="product">Tên sản phẩm</label></li>
						<li class=""><input type="text" name="product" class="bar" autofocus value="" ></li>
				</ul>
				<ul class="forms">
						<li class="txt"><label for="price">Giá</label></li>
						<li class=""><input type="text" name="price" class="bar" value="" ></li>
				</ul>
				<ul class="forms">
						<li class="txt"><label for="desc">Mô tả</label></li>
						<li class=""><textarea cols="50" rows="10" name="desc" class="bar" value="" ></textarea></li>
				</ul>
				<ul class="forms">
						<li class="txt"><label for="name">Chi tiết</label></li>
						<li class=""><textarea cols="50" rows="10" name="detail" class="bar" value="" ></textarea></li>
				</ul>
				<ul class="forms">
						<li class="txt"><label for="name">Ghi chú</label></li>
						<li class=""><textarea cols="50" rows="8" name="note" class="bar" value="" ></textarea></li>
				</ul>

				<ul class="forms">
						<li class="txt"><label for="name">Hình</label></li>
						<li class=""><input type="file" name="img_url" class="bar" value="" ></li>
				</ul>
				<ul class="forms">
						<li class="txt"><label for="name">Số lượng</label></li>
						<li class=""><input type="number" name="qty" class="bar" min="1" value="1" ></li>
				</ul>
				<ul class="forms">
					 <li class="txt"><label for="sold">Bán / Chưa</label></li>
					 <input type="radio" name="sold" class="bar" value="1"> Bán
					 <input type="radio" name="sold" class="bar" value="0" checked> Chưa
			 </ul>
         <ul class="forms">
            <li class="txt"><label for="active">Ẩn / Hiện</label></li>
            <input type="radio" name="active" class="bar" value="1" checked> Hiện
            <input type="radio" name="active" class="bar" value="0"> Ẩn
        </ul>

        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            <button type="submit" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Thêm</span></a></button>
            <button type="reset" style="border:none; cursor:pointer"><a href="#" class="simplebtn"><span>Reset</span></a></button>
            </li>

        </ul>

</form>
