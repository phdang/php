<?php
	if(isset($_GET['id']))	
		$id=$_GET['id'];
	else
		$id=1;
	
	include("lib/db.php");
	//Tang so luot view
	$sql="update `nn_product` set `view`=`view`+1 where `id`={$id}";
	mysqli_query($link,$sql);
	
	//Lay du lieu	
	$kqsp=mysqli_query($link,"select * from `nn_product` where `id`={$id}");
	$dsp=mysqli_fetch_assoc($kqsp);
?>

<h4 class="heading colr"><?php echo $dsp['name'];?></h4>
<div class="prod_detail">
    <div class="big_thumb">
        <div id="slider2">
        
            <div class="contentdiv">
                <img src="images/sanpham/<?php echo $dsp['img_url'];?>" alt="" >
                <a rel="example_group" href="images/sanpham/<?php echo $dsp['img_url'];?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
          </div>
          
        </div>
        <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
        <div style="float:left; width:189px !important; overflow:hidden;">
        <div class="anyClass" id="paginate-slider2">
            <ul>
                <li><a href="#" class="toc"><img src="images/sanpham/<?php echo $dsp['img_url'];?>" alt="" ></a></li>
                
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
                <p class="avail"><span class="bold">Availability:</span> <?php echo $dsp['qty'];?></p>
                <p class="avail"><span class="bold">Views:</span> <?php echo $dsp['view'];?></p>
              <h6 class="black">Quick Overview</h6>
            <p>
                <?php echo $dsp['desc'];?>
            </p>
        </div>
        <div class="addtocart">
            <h4 class="left price colr bold"><?php echo number_format($dsp['price']);?></h4>
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
                <li><input name="qty" id="qty" type="number" min="1" class="bar" value="1" ></li>
                <li><a href="javascript:window.location='?mod=cart_process&act=1&id=<?=$id?>&qty='+document.getElementById('qty').value" class="simplebtn"><span>Add To Cart</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="prod_desc">
        <h4 class="heading colr">Product Description</h4>
        <p>
            <?php echo $dsp['detail'];?>
        </p>
    </div>
</div>
<div class="listing">
    <h4 class="heading colr">New Products for March 2010</h4>
    <ul>
<?php
$kqlq=mysqli_query($link,"select * from nn_product where active=1 and category_id={$dsp['category_id']} AND `id`!= {$id} order by id DESC limit 0,20");
$i=1;
while($dlq=mysqli_fetch_assoc($kqlq)){
?>         
        
        <li <?php if($i%4==0) echo 'class="last"'; $i++;?>>
            <a href="?mod=detail&id=<?php echo $dlq['id'];?>" class="thumb"><img src="images/sanpham/<?php echo $dlq['img_url'];?>" alt="" ></a>
            <h6 class="colr"><?php echo $dlq['name'];?></h6>
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
                <p class="price"><?php echo $dlq['price'];?></p>
            </div>
        </li>
 <?php }?>       
        
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