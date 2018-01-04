        	<h4 class="heading colr">SẢN PHẨM ĐƯỢC XEM NHIỀU NHẤT</h4>
            <div id="prod_scroller">
            <a href="javascript:void(null)" class="prev">&nbsp;</a>
       	  <div class="anyClass scrol">
                <ul>
                <?php

					$sql = 'SELECT * FROM `nn_product` WHERE `active` = 1 ORDER BY `view` DESC LIMIT 0,8';
					$rs = mysqli_query($link,$sql);
					while ($r = mysqli_fetch_assoc($rs)) {
						$pid = $r['id'];
				?>

                    <li>
                    	<a href="?mod=detail&pid=<?= $pid ?>"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="<?= $r['name'] ?>" ></a>
                        <h6 class="colr"><?= $r['name'] ?></h6>
                        <p class="price bold"><?= number_format($r['price']/1000000,3,',', '.') ?> Tr</p>
                        <a href="cart.html" class="adcart">Add to Cart</a>
                    </li>
                <?php
					}
				?>

                </ul>
			</div>
            <a href="javascript:void(null)" class="next">&nbsp;</a>
        </div>
            <div class="clear"></div>
            <div class="listing">
            	<h4 class="heading colr">SẢN PHẨM MỚI NHẤT NĂM 2018</h4>
                <ul>
                <?php
				$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 ORDER BY `id` DESC LIMIT 0,20";
					$rs = mysqli_query($link,$sql);
					while ($r = mysqli_fetch_assoc($rs)) {
						$pid = $r['id'];
				?>
                	<li>
                    	<a href="?mod=detail&pid=<?= $pid ?>" class="thumb"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="<?= $r['name'] ?>" ></a>
                        <h6 class="colr"><?= $r['name'] ?></h6>
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
                            <p class="price"><?= number_format($r['price']/1000000,3,',', '.') ?> Tr</p>
                        </div>
                    </li>
                <?php
					}
				?>

                 </ul>
            </div>
