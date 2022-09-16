<?php

	if(!isset($_GET['id']) || $_GET['id'] == '') {
		header('Location: index.php');
	}

	$id = $_GET['id'];

	require './functions.php';
	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	try {
		$statement = $connection->prepare('SELECT * FROM blog_php WHERE id = :id LIMIT 1;');
		$statement->execute([':id' => $id]);
		$post = $statement->fetch();

		if(!$post) header('Location: index.php');
	} catch (PDOException $e) {
		die();
	}

	require './admin/config.php';
	require './views/post.view.php';

?>
