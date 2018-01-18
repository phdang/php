<?php

		//error
		error_reporting(E_ALL);

		//configuration

		$host = 'localhost';
		$user = 'shop';
		$pass = 'phd_shop 123';
		$db   = 'shop';

		//connect

		$link = mysqli_connect($host,$user,$pass,$db) or die('Ket noi loi');

		//UTF8

		mysqli_set_charset($link, 'utf8');

		//Set timezone

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		 ?>
