<?php

	require './admin/config.php';
	require './functions.php';
	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	$numberPost = $blog_config['number_post'];
	$posts = getPosts($numberPost, $connection);

	require './views/index.view.php';

?>
