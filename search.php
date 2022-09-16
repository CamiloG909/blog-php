<?php

	require './admin/config.php';
	if(!isset($_GET['q']) || $_GET['q'] == '') {
		header('Location: ' . ROUTE);
	}

	require './functions.php';
	$search = clearData($_GET['q']);
	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	try {
		$statement = $connection->prepare("SELECT * FROM blog_php WHERE title LIKE :search;");
		$statement->execute([':search' => "%$search%"]);
		$posts = $statement->fetchAll();

		if(empty($posts)) {
			$titlePage = 'Sorry, your search returned zero results for: "'.$search.'"';
		} else {
			$titlePage = count($posts).' results for your search: "'.$search.'"';
		}
	} catch (PDOException $e) {
		die();
	}

	require './views/search.view.php'

?>
