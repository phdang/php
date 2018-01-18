<h4 class="heading colr">Featured Products</h4>
<div id="prod_scroller">
<a href="javascript:void(null)" class="prev">&nbsp;</a>
<div class="anyClass scrol">
    <ul>
<?php
$sl3="select * from nn_product where active=1 order by `view` DESC limit 0,8";
$kq3=mysqli_query($link,$sl3);
while($d3=mysqli_fetch_assoc($kq3))
{
?>      
        <li>
            <a href="?mod=detail&id=<?php echo $d3['id'];?>"><img src="images/sanpham/<?php echo $d3['img_url'];?>" alt="" ></a>
            <h6 class="colr"><?php echo $d3['name'];?></h6>
            <p class="price bold"><?php echo number_format($d3['price']);?></p>
            <a href="?mod=cart_process&act=1&id=<?php echo $d3['id'];?>" class="adcart">Add to Cart</a>
        </li>
<?php }?>         
    </ul>
</div>
<a href="javascript:void(null)" class="next">&nbsp;</a>
</div>
<div class="clear"></div>
<div class="listing">
    <h4 class="heading colr">New Products for March 2010</h4>
    <ul>
<?php
$sl4="select * from nn_product where active=1 order by id DESC limit 0,20";
$kq4=mysqli_query($link,$sl4);
$i=1;
while($d4=mysqli_fetch_assoc($kq4))
{
?>        	
        
        <li <?php if($i%4==0) echo 'class="last"';?> >
            <a href="?mod=detail&id=<?php echo $d4['id'];?>" class="thumb"><img src="images/sanpham/<?php echo $d4['img_url'];?>" alt="" ></a>
            <h6 class="colr"><?php echo $d4['name'];?></h6>
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
                <a href="?mod=cart_process&act=1&id=<?php echo $d4['id'];?>" class="adcart">Add to Cart</a>
                <p class="price"><?php echo number_format($d4['price']/1000000,2);?>Tr</p>
            </div>
        </li>
<?php $i++;}?>         
    </ul>
</div>