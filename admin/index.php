<?php session_start();

	require './config.php';
	require '../functions.php';

	validateSession();

	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	$numberPost = 5;
	$posts = getPosts($numberPost, $connection);

	require '../views/admin_index.view.php';

?>
