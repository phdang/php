<?php
	require_once('lib/config.php');
	$pid = isset($_GET['pid']) ? $_GET['pid'] : 1;
	//Increase views
	$sql = "UPDATE `nn_product` SET `view` = `view` + 1 WHERE `id` = {$pid}";
	$rs = mysqli_query($link,$sql);
	//Check views
	//$sql = "SELECT `view` FROM `nn_product` WHERE `id` = {$pid}";
	//$rs = mysqli_query($link,$sql);
	//$r = mysqli_fetch_assoc($rs);
	//echo $view = $r['view'] ;

	$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 AND `id` = {$pid}";
	$rs = mysqli_query($link,$sql);
	$r = mysqli_fetch_assoc($rs)
?>
        	<h4 class="heading colr"><?= $r['name'] ?></h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                	<div id="slider2">
                        <div class="contentdiv">

                        	<img src="images/sanpham/<?= $r['img_url'] ?>" alt="" >

                            <a rel="example_group" href="images/sanpham/<?= $r['img_url'] ?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                        <div class="contentdiv">
                            <img src="images/sanpham/<?= $r['img_url'] ?>" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                            <img src="images/detail_img3.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img4.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img5.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                      <div class="contentdiv">
                        	<img src="images/detail_img6.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> In stock</p>
                          <h6 class="black">Quick Overview</h6>
                        <p>
                        	<?= $r['desc'] ?>
                        </p>
                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold"><?=number_format($r['price']/1000000,3,',', '.') ?> Tr</h4>
                            <div class="clear"></div>
                            <ul class="margn addicons">
                                <li>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Add to Compare</a>
                                </li>
                        	</ul>
                            <div class="clear"></div>
                        <ul class="left qt">
                   	    <li class="bold qty">QTY</li>
                            <li><input name="qty" type="text" class="bar" ></li>
                            <li><a href="cart.html" class="simplebtn"><span>Add To Cart</span></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Giới Thiệu Sản Phẩm</h4>
                    <p>
                    	<?= $r['detail'] ?>
                    </p>
                </div>
            </div>
            <div class="listing">
            	<h4 class="heading colr">SẢN PHẨM MỚI CÙNG LOẠI</h4>
                <ul>
                <?php
				$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 AND `id` = {$pid}";
				$rs = mysqli_query($link,$sql);
				$r = mysqli_fetch_assoc($rs);
				$sql = "SELECT * FROM `nn_product` WHERE `active` = 1 AND `category_id` = {$r['category_id']} AND `id` != {$pid} ORDER BY `id` DESC LIMIT 0,20";
					$rs = mysqli_query($link,$sql);
					while ($r = mysqli_fetch_assoc($rs)) {?>
                    <li>
                    	<a href="?mod=detail&pid=<?= $r['id'] ?>" class="thumb"><img src="images/sanpham/<?= $r['img_url'] ?>" alt="<?= $r['name'] ?>" ></a>
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
            <div class="tags_big">
            	<h4 class="heading">Product Tags</h4>
                <p>Add Your Tags:</p>
                <span><input name="tags" type="text" class="bar" ></span>
                <div class="clear"></div>
                <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
                <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
            </div>
            <div class="clear"></div>
