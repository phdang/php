<?php
	require_once('lib/db.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet">
<link href="css/sdmenu.css" rel="stylesheet">
<script src="js/sdmenu.js"></script>
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
        	<li><a href="#">Trang chủ</a></li>
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
                                		<li><a href="?cid=<?=$r['id']?>"><?=$r['name']?></a></li>
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
            	<a href="?cid=<?=$r['id']?>"><?=$r['name']?></a>
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
			//Lay loai san pham tren duong dan
			if(isset($_GET['cid']))$cid=$_GET['cid'];
			else $cid=1;
			
			if(isset($_GET['page']))$page=$_GET['page'];
			else $page=1;
			
			//Trang toi thieu la 1
			if ($page < 1)
			{
				$page = 1;
			}
			
		?>
    	<div class="page"> Trang 
        <a href="?cid=<?=$cid ?>&page=1" title="Trang đầu">&lt;&lt;</a>
        <a href="?cid=<?=$cid ?>&page=<?=$page-9?>" title="Nhóm trang trước">&lt;</a>
        <?php
			//Lay gia tri tham so tren URL
	  		//$cid=$_GET['cid'];
			//if($cid=='')$cid=1;			
			/*
			*Tinh so trang = So san pham / so san pham 1 trang
			*/
			
			//Tinh so san pham
			$sql = 'select count(1) as `cnt` from `nn_product` where `category_id`='.$cid;
			$rs = mysqli_query($link, $sql);
			$r = mysqli_fetch_row($rs);
			
			$noi = $r[0];//number of items
			
			//Tinh so trang
			$nop = ceil($noi/15);//number of pages			
			
			//Trang toi da la $nop
			if ($page > $nop)
			{
				$page = $nop;
			}
			
			//Tao danh sach cac trang
			for ($i = $page-4; $i <= $page + 4; $i++)
				if ($i >= 1 && $i <= $nop)
				{
		?> 	
            		<a <?php if($i==$page)echo 'class="current"' ?> href="?cid=<?=$cid ?>&page=<?=$i?>"><?=$i?></a>
        <?php
				}
		?>              						
        <a href="?cid=<?=$cid ?>&page=<?=$page+9?>" title="Nhóm trang sau">&gt;</a>
        <a href="?cid=<?=$cid ?>&page=<?=$nop?>" title="Trang cuối">&gt;&gt;</a>
        
        <select onChange="window.location='?cid=<?=$cid ?>&page='+this.value">
        <?php
			for ($i = 1; $i <= $nop; $i++)
            {
		?>
        	<option <?=($i == $page)?'selected':''?> value="<?=$i?>">Trang <?=$i?></option>
        <?php
            }
        ?>
        </select>
        
        </div>
	  <?php  		
			
			$pos=($page-1)*15;
			
			echo $sql="SELECT `id`, `name`, `price`, `img_url`, `create_at` FROM `nn_product` WHERE `category_id`={$cid} limit {$pos},15";
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
    </div>
    <div id="right">5</div>
    <div id="footer">6</div>
</div>
</body>
</html>

