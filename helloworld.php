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

	<title>First PHP</title>


     </head>




     <body>

	<div class="container code">

		<?php

            echo '<h1>Hello World!</h1>';

            //phpinfo();

            //Encrypt

            echo hash('sha512', hash('sha512', '123')), '<br>';

            echo '4f22a5b713259a8b3e6d47c9073d7eef25e6ced4c20cbe49abaaa2e80b01e4e37c1a7c16891810668dd9a6bd88f259bbf8b7a672d37e785c3f2f3aa0b7169b54'
        ?>

	</div>

     </body>


</html>
