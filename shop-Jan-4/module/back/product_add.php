<?php
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$order=$_POST['order'];
		$active=$_POST['active'];

		$sql = "insert into `nn_department` values (NULL,'$name','$order','$active')";
		mysqli_query($link, $sql);

		//Chuyen den trang view
		header('location:?mod=dept');
	}
?>
<form action="" method="post">
  <table width="500" border="1">
    <caption>
      THÊM CHỦNG LOẠI
    </caption>
    <tr>
      <th width="166" scope="row"><label for="name">Tên</label></th>
      <td width="318"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <th scope="row">Thứ tự</th>
      <td><input name="order" type="number" id="order" min="1" value="1"></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><select name="active" id="active">
        <option value="1" selected>Hiện</option>
        <option value="0">Ẩn</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><button type="submit">Submit</button>
      <button type="reset">Reset</button></td>
    </tr>
  </table>
</form>
