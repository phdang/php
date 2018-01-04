<?php
	require_once('lib/config.php');
	$cid = isset($_GET['cid']) ? $_GET['cid'] : 1;
	$page = (isset($_GET['page']) && $_GET['page'] >0) ? $_GET['page'] : 1 ;
	$sort = isset($_GET['sort']) ? $_GET['sort'] : 1;
	$sql = "SELECT COUNT(*) AS `total` FROM `nn_product` WHERE `active` = 1 AND `category_id` = {$cid} ORDER BY `id`";
	$rs = mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
	//echo $r['total'];
	$itemsPerPage = 8;
	$totalPages = ceil($r['total']/$itemsPerPage);
	$pos = ($page-1) * 8;

	$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 AND `category_id` = {$cid} ORDER BY `id` LIMIT {$pos},{$itemsPerPage}";
		$rs = mysqli_query($link,$sql);
		$r = mysqli_fetch_assoc($rs)
?>
        	<h4 class="heading colr">Featured Products</h4>
            <div class="small_banner">
            	<a href="#"><img src="images/small_banner.gif" alt="" ></a>
            </div>
            <div class="sorting">
            	<p class="left colr">4 Item(s)</p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a href="?mod=product&=<?= $cid ?>&page=1&sort=<?= $sort == 3 ? 4 : 3 ?>" class="colr <?= $sort > 2 ? 'current' : '' ?>">Name
                        <?php
						if ($sort == 3) {
							echo '<img src="images/desc.png" alt="asc">';
							}
						if ($sort == 4) {
							echo '<img src="images/asc.png" alt="asc">';
							} ?>

							 |
                        </a>
                        <a href="?mod=product&=<?= $cid ?>&page=1&sort=<?= $sort == 1 ? 2 : 1 ?>" class="colr <?= $sort < 3 ? 'current' : '' ?>">Price
                        <?php
						if ($sort == 1) {
							echo '<img src="images/desc.png" alt="asc">';
							}
						if ($sort == 2) {
							echo '<img src="images/asc.png" alt="asc">';
							} ?>
                        </a>
                    </li>
                    <li class="text">Trang
                    <?php
						$pageDisplay = 9;
						$increment = ($pageDisplay-1)/2;

					?>
                    <a href="?mod=product&=<?= $cid ?>&page=1" class="colr">&lt;&lt;</a>
                    <a href="?mod=product&=<?= $cid ?>&page=<?= max($page - $increment, 1) ?>" class="colr">&lt;</a>
                    	<?php

						$pageDisplay = 9;
						$increment = ($pageDisplay-1)/2;
						$i =  max($page - $increment,1);
						while ($i <= min($page+$increment,$totalPages)) {
						?>
                        <a class="<?= $i == $page ? "current" : "" ?>" href="?mod=product&cid=<?= $cid ?>&page=<?= $i ?>"><?= $i ?></a>
                        <?php
						$i++;
						}
						?>
                        <a href="?mod=product&=<?= $cid ?>&page=<?= min($page + $increment, $totalPages) ?>" class="colr">&gt;</a>
                        <a href="?mod=product&=<?= $cid ?>&page=<?= $totalPages ?>" class="colr">&gt;&gt;</a>

                        <a href="#" class="colr">/ All</a>
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a href="#" class="colr">Name </a>
                        <a href="#" class="colr">Price</a>
                    </li>
                </ul>
          	</div>
            <div class="listing">
            	<h4 class="heading colr">SẢN PHẨM MỚI NHẤT NĂM 2018</h4>
                <ul>
                <?php
				if ($sort == 1) {

					$order = '`price` DESC';
				} elseif ($sort == 2) {
					$order = '`price` ASC';
				} elseif ($sort == 3) {
					$order = '`name` DESC';
				} else {
					$order = '`name` ASC';
				}

					$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 AND `category_id` = {$cid} ORDER BY {$order} LIMIT {$pos},{$itemsPerPage}";
					$rs = mysqli_query($link,$sql);
					while ($r = mysqli_fetch_assoc($rs)) { ?>
                	<li>
                    	<a href="?mod=detail&pid=<?= $r['id'] ?>" class="thumb"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a>
                        <h6 class="colr"><?= $r['name'] ?>r</h6>
                        <div class="stars">
                        	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                            <a href="#">(3) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price"><?= number_format($r['price']) ?></p>
                        </div>
                    </li>
                <?php
					}
				?>
                </ul>
            </div>
