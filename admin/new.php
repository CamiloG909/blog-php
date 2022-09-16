<?php session_start();

	require './config.php';
	require '../functions.php';

	validateSession();

	$connection = connectionDb();

	if(!$connection) {
		die();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = clearData($_POST['title']);
		$extract = clearData($_POST['extract']);
		$text = $_POST['text'];
		$thumb = $_FILES['thumb']['tmp_name'];

		$file = '../' . $blog_config['images_dir'] . $_FILES['thumb']['name'];

		if(empty($title) || empty($extract) || empty($text)) {
			return header('Location: ./');
		}

		move_uploaded_file($thumb, $file);

		try {
			$statementUpdate = $connection->prepare('INSERT INTO blog_php (title, extract, text, thumb) VALUES (:title, :extract, :text, :thumb);');
			$statementUpdate->execute([':title' => $title, ':extract' => $extract, ':text' => $text, ':thumb' => $_FILES['thumb']['name']]);
			header('Location: ./');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return;
	}


	require '../views/admin_new.view.php';

?>
