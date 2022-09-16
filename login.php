<?php session_start();

	require './admin/config.php';
	if(isset($_SESSION['admin'])) {
		header('Location: admin/');
	}

	require 'functions.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = clearData($_POST['user']);
		$password = clearData($_POST['password']);

		if($blog_admin['user'] == $user && $blog_admin['password'] == $password) {
			$_SESSION['admin'] = $user;
			header('Location: admin/');
		} else {
			$error = 'Verify your credentials';
		}
	}

	require './views/login.view.php';
?>
