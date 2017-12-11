<!DOCTYPE html>

<html>

     <head>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel= "stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<link href="animate.css" rel="stylesheet">

	<script src="jquery-3.2.1.min.js"></script>

	<script src="bootstrap.min.js"></script>

	<style type="text/css">







	</style>

	<meta charset ="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>               </title>


     </head>




     <body>

	<div class="container code">

		<?php

    //Show error

    error_reporting(E_ALL);

    //Configuration

    $host = 'localhost' ;
    $user = 'shop' ;
    $pass = 'phd_shop 123' ;
    $db   = 'shop';

    //Create connection

    $link = mysqli_connect($host, $user, $pass, $db) or die("Connect to DB failed");

    //Enconding UTF8

    mysqli_set_charset($link, 'utf8');

    //SQL Query

    $sql = 'SELECT `id`, `name`, `category_id` FROM `nn_product` ORDER BY `name` LIMIT 0,10';

    // Fetch rowsheet

    $rs = mysqli_query($link, $sql);

    //Fetch a row in rowsheet

    $r = mysqli_fetch_assoc($rs);

    //Display a row on screen

    ?> <p> <?= $r['name'];?></p>



    <?php

    //Fetch the rest

    while ($r = mysqli_fetch_assoc($rs)) {

      ?> <p> <?= $r['name'] ; ?></p>

      <?php

    };


//Single insert
    // $sql = 'INSERT INTO `nn_product` (`name`) VALUES ("Test3")';
    //
    // mysqli_query($link, $sql);
    // //Get the last id inserted
    //
    // $last_id = mysqli_insert_id($link);
    //
    // echo $last_id;

//Multiple query
  // $sql = 'INSERT INTO `nn_product` (`name`) VALUES ("Test 4");';
  // $sql .= 'INSERT INTO `nn_product` (`name`) VALUES ("Test 5");';
  // $sql .= 'INSERT INTO `nn_product` (`name`) VALUES ("Test 6");';
  // $sql .= 'INSERT INTO `nn_product` (`name`) VALUES ("Test 7");';
  // $sql .= 'INSERT INTO `nn_product` (`name`) VALUES ("Test 8")';

//Multiple insert records

  // mysqli_multi_query($link, $sql) or die("Insert failed");
  //
  // $last_id = mysqli_insert_id($link);
  //
  // echo $last_id;

  //Prepare and bind

  $stmt = $link->prepare("INSERT INTO `nn_product` (`category_id`, `name`, `price`) VALUES (?,?,?)");
  $stmt->bind_param("isi",$category_id,$name,$price);

  //Set parameters and execute
  // $name  = "Test10";
  // $price = 1000;
  // $stmt->execute();
  //
  // $name  = "Test11";
  // $price = 1200;
  // $stmt->execute();
  //
  // $name  = "Test12";
  // $price = 900;
  // $stmt->execute();

  $i = 0;

  while ($i<1000) {
    $category_id = 9;
    $name        = 'Object'.$i;
    $price       =  1000 + 1000*$i;
    $stmt->execute();
    $i++;
  }

  echo "New records created successfully";

  //Close connection

  $stmt->close();
  $link->close();
		?>

	</div>

     </body>


</html>
