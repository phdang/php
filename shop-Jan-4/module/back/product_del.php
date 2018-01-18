<?php
if (!isset($_SESSION['admin_name'])) {
  header('location:?mod=login');
}
if (!isset($_GET['dep_id'])) {
  header('location:?mod=dept');
}
$dept_id = $_GET['dep_id'];
if (is_numeric($dept_id)) {
  $sql = 'DELETE FROM `nn_department` WHERE `id` = ' . $dept_id;
  $rs = mysqli_query($link,$sql);
  if ($rs) {
    header('location:?mod=dept');
  } else {
    echo $sql;
  }
} else {
  header('location:?mod=dept');
}

?>
