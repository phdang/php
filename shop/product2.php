<?php
	require_once('db/config.php');
?>
<?php
//Lay gia tri tham so tren URL
//$cid=$_GET['cid'];
//if($cid=='')$cid=1;

if(isset($_GET['cid'])){
	$cid=$_GET['cid'];

} else {
	$cid=1;
}
$cid = (int)$cid;
if (!is_int($cid) || $cid < 1) {
	$cid = 1;
}

if(isset($_GET['page']))$page=$_GET['page'];
else $page=1;
$page = (int)$page;
if (($page < 1) || !is_int($page)) {
	$page = 1;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pagination</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/pagination.css" rel="stylesheet">
<link href="css/sdmenu.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/sdmenu.js"></script>
<style>


</style>
<script>
	var myMenu;

	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};

</script>
</head>

<body>
<div id="wrapper">
    <div id="header">1</div>
    <div id="menu">
    	<button>
        	<hr>
            <hr>
            <hr>
        </button>
    	<ul>
        	<li><a href="product2.php">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Sản phẩm</a>
            	<ul>
                	<?php
						//Lay cac department
						$sql='SELECT `id`, `name` FROM `nn_department` WHERE `active`=1 ORDER BY `order`';
						$rsDep=mysqli_query($link,$sql);
						while($r=mysqli_fetch_assoc($rsDep))
						{
					?>
                        <li><a href="#"><?=$r['name']?></a>
                            <ul>
                            	<?php
									//Lay category tuong ung voi department
									$sql='SELECT `id`, `name` FROM `nn_category` WHERE `department_id`='.$r['id'].' AND `active`=1 ORDER BY `order`';
									$rsCat=mysqli_query($link,$sql);
									while($r=mysqli_fetch_assoc($rsCat))
									{
								?>
                                		<li><a href="?cid=<?=$r['id']?>&page=1"><?=$r['name']?></a></li>
                                <?php
									}
								?>
                            </ul>
                        </li>
                   <?php
						}
				   ?>
                </ul>
            </li>
            <li><a href="#">Hướng dẫn</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
    </div>
    <div id="left">
        <div id="my_menu" class="sdmenu">
        <?php
			//Lay cac chung loai (department)
			//$sql='SELECT `id`, `name` FROM `nn_department` WHERE `active`=1 ORDER BY `order`';
			//$rsDep=mysqli_query($link,$sql);

			//Di chuyển đến dòng đầu tiên để fetch tiếp
			mysqli_data_seek($rsDep,0);
			while($r=mysqli_fetch_assoc($rsDep))
			{
		?>
          <div>
            <span><?=$r['name']?></span>
            <?php
				$sql="SELECT `id`, `name` FROM `nn_category` WHERE `department_id`={$r['id']} AND `active`=1 ORDER BY `order`";
				$rsCat=mysqli_query($link,$sql);
				while($r=mysqli_fetch_assoc($rsCat))
				{
			?>
            	<a href="?cid=<?=$r['id']?>&page=1"><?=$r['name']?></a>
           <?php
				}
		   ?>
          </div>
         <?php
			}
		 ?>
<!--          <div>
            <span>Support Us</span>
            <a href="http://www.dynamicdrive.com/recommendit/">Recommend Us</a>
            <a href="http://www.dynamicdrive.com/link.htm">Link to Us</a>
            <a href="http://www.dynamicdrive.com/resources/">Web Resources</a>
          </div>
          <div class="collapsed">
            <span>Partners</span>
            <a href="http://www.javascriptkit.com">JavaScript Kit</a>
            <a href="http://www.cssdrive.com">CSS Drive</a>
            <a href="http://www.codingforums.com">CodingForums</a>
            <a href="http://www.dynamicdrive.com/style/">CSS Examples</a>
          </div>
          <div>
            <span>Test Current</span>
            <a href="?foo=bar">Current or not</a>
            <a href="./">Current or not</a>
            <a href="index.html">Current or not</a>
            <a href="index.html?query">Current or not</a>
          </div>-->
        </div>
    </div>
    <div id="main">


	  <?php
			$items_per_page = 15;
			$pos=($page-1)*$items_per_page;

			$sql="SELECT `id`, `name`, `price`, `img_url`, `create_at` FROM `nn_product` WHERE `category_id`={$cid} limit {$pos},{$items_per_page}";
			$rs=mysqli_query($link,$sql);
			$i=1;
			while($r=mysqli_fetch_assoc($rs))
			{
      ?>
    	<div class="product">
        	<h2><?=$r['name']?></h2>
            <img src="images/sanpham/<?=$r['img_url']?>" alt="product">
            <h3> <?=number_format($r['price'])?> VND </h3>
            <input type="button" value="Mua">
        </div>
    <?php
			}
	  ?>
						<ul class="pagination">
							<li id="first"><a href="?cid=<?=$cid ?>&page=1">First</a></li>
							<?php
							//Count all active items
							$sql = 'SELECT COUNT(*) AS `total` FROM `nn_product` WHERE `category_id` = '. $cid . ' AND `active`=1';
							$rs  = mysqli_query($link,$sql);
							$r_count_product = mysqli_fetch_assoc($rs);
							//return all items as variable $total_items
							$total_items = $r_count_product['total'];
							//Set page number
							$page_number = $total_items%$items_per_page ? intval($total_items/$items_per_page) + 1: $total_items/$items_per_page;
							?>
							<li id="next"><a href="?cid=<?=$cid ?>&page=<?= $page_number ? max($page - 1,1) : 1;?>">Pre</a></li>
							<?php
							$i = 0;
							//Tao the phan trang cho san pham
							while ($i < $page_number) { ?>
								<?php $page_id = $i+1; ?>

								<li id="page<?= $page_id ?>"><a href="?cid=<?=$cid ?>&page=<?=$page_id?>"><?= $page_id?></a></li>
							<?php
							$i++;
							}
							?>
							<?php // Neu page_number khong co gia tri (khong co ket qua) tra ve trang 1 ?>

							<li id="next"><a href="?cid=<?=$cid ?>&page=<?=$page_number ? min($page + 1,$page_number) : 1;?>">Next</a></li>
							<li id="last"><a href="?cid=<?=$cid ?>&page=<?=$page_number ? $page_number : 1;?>">Last</a></li>
						</ul>
						<!-- Phan trang cho san pham -->
						<?php include_once('lib/pagination_product2.php');?>
    </div>
    <div id="right">5</div>
    <div id="footer">6</div>
</div>
</body>
</html>
