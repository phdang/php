<?php

require_once('lib/config.php');

$vote_id = $_REQUEST['vote'];

$sql = 'UPDATE `nn_answer` SET `vote` = `vote` + 1 WHERE `id` = ' . $vote_id;

mysqli_query($link,$sql) or die($sql);

?>
