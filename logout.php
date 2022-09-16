<?php session_start();

	require './admin/config.php';
	if(isset($_SESSION['admin'])) {
		$_SESSION = [];
		session_destroy();

		header('Location: '.ROUTE);
	}

?>
