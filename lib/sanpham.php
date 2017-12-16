<?php
$sql='SELECT `id`, `name` FROM `nn_department`';
$rs=mysqli_query($link,$sql);
$i=1;
while($r=mysqli_fetch_assoc($rs))
{


?>
   <li>
       <a href="?cat_id=<?=$r['id']?>"><?= $r['name'] ?></a>
     <ul>
            <?php
               $sql='SELECT `id`, `name` FROM `nn_category` WHERE `department_id` = ' . $r['id'];
               $rsCat=mysqli_query($link,$sql);
               while($r=mysqli_fetch_assoc($rsCat))
               {
            ?>
           <li><a href="?cat_id=<?=$r['id']?>"><?= $r['name'] ?></a></li>

           <?php
           }
           ?>
     </ul>
   </li>
<?php
}
?>
