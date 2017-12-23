<?php
	require_once('db/config.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/main.css" rel="stylesheet">
<link href="css/sdmenu.css" rel="stylesheet">
<script src="js/sdmenu.js"></script>
<script>
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
		function newDoc() {
			if  (window.location.pathname === "/shop/product2.php") {
				window.location.assign("?home");
			}
		};
		if  (window.location.search === "") {
		newDoc();
		}
	};
</script>

<style>
	#main{
		background-color: #fff;
	}

</style>
</head>

<body>
<div id="wrapper">
    <div id="header"> </div>
    <div id="menu">
    	<button>
        	<hr>
          <hr>
          <hr>
      </button>
    	<ul>
        	<li><a href="?home">Trang chủ</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Sản phẩm</a>
            	<ul>
             <?php
			$sql='SELECT `id`, `name` FROM `nn_department`';
			$rs=mysqli_query($link,$sql);
			$i=1;
			while($r=mysqli_fetch_assoc($rs))
			{


     		 ?>
                <li>
                    <a href="#"><?= $r['name'] ?></a>
                	<ul>
                         <?php
                            $sql='SELECT `id`, `name` FROM `nn_category` WHERE `department_id` = ' . $r['id'];
                            $rsCat=mysqli_query($link,$sql);
                            while($r=mysqli_fetch_assoc($rsCat))
                            {
                         ?>
                        <li><a href="?cid=<?= $r['id'] ?>"><?= $r['name'] ?></a></li>

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
            <li><a href="#">Liên hệ</a>
            	<ul>
                	<li><a href="#">Điện thoại</a></li>
            		<li><a href="#">Máy tính</a>
                        <ul>
                            <li><a href="#">DELL</a></li>
                            <li><a href="#">ASUS</a>
                                 <ul>
                                    <li><a href="#">DELL 222 </a></li>
                                    <li><a href="#">ASUS 222</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="left">
        <div id="my_menu" class="sdmenu">
        <?php
			$sql='SELECT `id`, `name` FROM `nn_department` WHERE `active`= 1';
			$rs=mysqli_query($link,$sql);
			while($r=mysqli_fetch_assoc($rs)) {
		?>
          <div>
            <span><?= $r['name'] ?></span>
            <?php
			$sql="SELECT `id`, `name` FROM `nn_category` WHERE `department_id` = {$r['id']} AND `active` = 1";
			$rsCat=mysqli_query($link,$sql);
			while($r=mysqli_fetch_assoc($rsCat)) {
			?>
            <a href="http://tools.dynamicdrive.com/imageoptimizer/"><?=$r['name']?></a>
			<?php
			}
			?>
            <!--<a href="http://tools.dynamicdrive.com/favicon/">FavIcon Generator</a>
            <a href="http://www.dynamicdrive.com/emailriddler/">Email Riddler</a>
            <a href="http://tools.dynamicdrive.com/password/">htaccess Password</a>
            <a href="http://tools.dynamicdrive.com/gradient/">Gradient Image</a>
            <a href="http://tools.dynamicdrive.com/button/">Button Maker</a>-->
          </div>
        <?php
			}
		?>
          <!--<div>
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
	  	$cid = (isset($_GET['cid']) && $_GET['cid'] >0) ? $_GET['cid'] : 1 ;
			$page = (isset($_GET['page']) && $_GET['page'] >0) ? $_GET['page'] : 1 ;
			$numberOfItems = 15;
			$pos = ($page-1) * $numberOfItems;
			$sql="SELECT `id`, `name`, `price`, `img_url`, `create_at` FROM `nn_product` WHERE `category_id` = {$cid} limit {$pos},{$numberOfItems}";
			$rs=mysqli_query($link,$sql);
			$i=1;
			while($r=mysqli_fetch_assoc($rs))
			{
      ?>
    	<div class="product">
        	<h2><?=$r['name']?></h2>
            <img src="images/sanpham/<?=$r['img_url']?>" alt="<?=$r['name']?>">
            <h3> <?=number_format($r['price'])?> VND </h3>
            <input type="button" value="Mua">

        </div>
       <?php

			}

	   ?>
       <?php
	   		$sql="SELECT COUNT(*) AS total FROM `nn_product` WHERE `category_id` = {$cid}";
			$rs=mysqli_query($link,$sql);
			//echo var_dump($rs);
			//Lay dong theo chi so
			$r = mysqli_fetch_row($rs);
			//echo $r[0];
			// Tinh so trang
			$number_of_pages = ceil($r[0]/15);

	   ?>
		 			<!-- JS de dieu huong trang qua event onChange-->
        	<select onChange="window.location.assign('?cid=<?= $cid ?>&page=' + this.value);">
            <?php
            	for ($i=1; $i <= $number_of_pages; $i++) {?>
					<option <?= $i == $page ? 'selected' : '' ?> value="<?= $i ?>">Trang <?= $i ?></option>
            <?php
				}
			?>

			<?php
				//So trang truoc va so trang sau hien tai number of pre and next to the current page
				//Page display should be an odd number_format, so trang hien thi nen la so le
				$page_display = 9;
				$numberOfPrePages = ($page_display - 1)/2;
			?>

            </select>
            <ul class="pagination">
            	<li title="Trang đầu"><a href="?cid=<?= $cid ?>&page=1">&lt;&lt;</a></li>
							<!-- Nhom trang truoc, group of pre-pages -->
                <li title="Trang trước"><a href="?cid=<?=$cid?>&page=<?=max($page - $page_display, 1)?>">&lt;</a></li>
            		<?php
					//So trang khong duoc nho hon 1
					$i = max($page - $numberOfPrePages,1);
					// - 1 la tru trang hien tai
					while ($i <= min($page + $numberOfPrePages, $number_of_pages)) { ?>
                    <li class="<?=$i==$page ? "active" : '' ?>" id="page<?= $i ?>">
											<a href="?cid=<?= $cid ?>&page=<?=$i?>"><?=$i?></a>
										</li>
                    <?php
					$i++;
					}
					?>
								<!-- Nhom trang sau, group of next-pages -->
                 <li title="Trang kế"><a href="?cid=<?=$cid?>&page=<?=min($page+$page_display,$number_of_pages)?>">&gt;</a></li>
            	<li title="Trang cuối"><a a href="?cid=<?=$cid?>&page=<?=$number_of_pages?>">&gt;&gt;</a></li>

            </ul>

       </div>
       <div id="right">5</div>


    <div id="footer">6</div>
</div>
</body>
</html>
