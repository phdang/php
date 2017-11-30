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

	<title>php playground</title>


     </head>




     <body>

	<div class="container code">

    <form action="action.php" method="post">

    <select id="day" required value="">

        <option value="">Ngày</option>

		<?php

    for ($i=1; $i<32; $i++){

    ?>
      <option value="<?php echo $i ?>">Ngày <?php echo $i ?></option>

    <?php
    }
    ?>

  </select>

  <select id="month" required>

    <option value="">Tháng</option>

    <?php

        $i=1;
        while ($i < 13) {
    ?>
        <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
          <?php
          $i++;
        }
     ?>
  </select>

  <select id="year" required>

    <option value="">Năm</option>

    <?php

        $i=2017;
        while ($i > 1916) {
    ?>
        <option value="<?php echo $i?>">Năm <?php echo $i?></option>
          <?php
          $i--;
        }
     ?>
  </select>

<input type="submit" value="Submit">

</form>

	</div>

     </body>


</html>
