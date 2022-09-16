<?php session_start();

	require './config.php';
	require '../functions.php';

	validateSession();

	$id = clearData($_GET['id']);
	if(empty($id)) {
		header('Location: ./');
	}

	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = clearData($_POST['title']);
		$extract = clearData($_POST['extract']);
		$text = clearData($_POST['text']);

		if(empty($title) || empty($extract) || empty($text)) {
			return header('Location: ./');
		}

		try {
			$statementUpdate = $connection->prepare('UPDATE blog_php SET title = :title, extract = :extract, text = :text WHERE id = :id;');
			$statementUpdate->execute([':title' => $title, ':extract' => $extract, ':text' => $text, ':id' => $id]);
			header('Location: ./');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return;
	}

	$edit = true;

	try {
		$statement = $connection->prepare("SELECT * FROM blog_php WHERE id = $id LIMIT 1;");
		$statement->execute();
		$post = $statement->fetch();

		if(!$post) {
			header('Location: ./');
		}
	} catch (PDOException $e) {
		header('Location: ./');
	}

	require '../views/admin_edit.view.php';

?>
