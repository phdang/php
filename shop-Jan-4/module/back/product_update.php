<?php
if (!isset($_SESSION['admin_name'])) {
  header('location:?mod=login');
}
if (!isset($_GET['dep_id'])) {
  header('location:?mod=dept');
}

$dept_id = $_GET['dep_id'];

if (!is_numeric($dept_id)) {

  header('location:?mod=dept');
}
if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$order=$_POST['order'];
		$active=$_POST['active'];

		$sql = "UPDATE `nn_department`
    SET
                                      `name` = '$name',
                                      `order` = $order,
                                      `active` = $active
    WHERE `id` = $dept_id";
		mysqli_query($link, $sql) or die($sql);

		//Chuyen den trang view
		header('location:?mod=dept');
	}
  $sql = 'SELECT `name`, `order`, `active` FROM `nn_department` WHERE `id` = ' . $dept_id;
  $rs = mysqli_query($link, $sql);
  $r = mysqli_fetch_assoc($rs);
?>
<form action="" method="post">
  <table width="500" border="1">
    <caption>
      SỬA CHỦNG LOẠI
    </caption>
    <tr>
      <th width="166" scope="row"><label for="name">Tên</label></th>
      <td width="318"><input type="text" name="name" id="name" value="<?= $r['name'] ?>"></td>
    </tr>
    <tr>
      <th scope="row">Thứ tự</th>
      <td><input name="order" type="number" id="order" min="1" value="<?= $r['order'] ?>"></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><select name="active" id="active">
        <option value="1" <?= $r['active'] == 1 ? 'selected' : '' ?>>Hiện</option>
        <option value="0" <?= $r['active'] == 0 ? 'selected' : '' ?>>Ẩn</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><button type="submit">Update</button>
      <!-- <button type="reset">Reset</button> -->
      </td>
    </tr>
  </table>
</form>
