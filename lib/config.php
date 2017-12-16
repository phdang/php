<?php

error_reporting(E_ALL); //show errors

class Config {
	const host = 'localhost';
	const user = 'shop';
	const pass = 'phd_shop 123';
	const db   = 'shop';
}

//connect to MySQl

$link = mysqli_connect(Config::host,Config::user,Config::pass,Config::db) or die("Ket noi that bai");

		//UTF8

		mysqli_set_charset($link, 'utf8');

		//Set timezone

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		 ?>
