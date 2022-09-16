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

	$statement = $connection->prepare('DELETE FROM blog_php WHERE id = :id;');
	$statement->execute([':id' => $id]);
	header('Location: ./');

?>
