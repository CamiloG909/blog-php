<?php

	function connectionDb() {
		try {
			$connection= new PDO('mysql:host=containers-us-west-75.railway.app:6341;dbname=railway;', 'root', 'Yhmk6TE8xwaJ8vfBWkZT');
			return $connection;
		} catch (PDOException $e) {
			return false;
		}
	}

	function clearData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function currentPage() {
		return isset($_GET['page']) ? (int)$_GET['page'] : 1;
	}

	function getPosts($postPerPage, $connection) {
		$index = (currentPage() > 1) ? currentPage() * $postPerPage - $postPerPage : 0;
		try {
			$statement = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM blog_php LIMIT $index, $postPerPage;");
			$statement->execute();
			return $statement->fetchAll();
		} catch (PDOException $e) {
			return false;
		}
	}

	function formatDate($date) {
		$timestamp = strtotime($date);
		$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		$day = date('d', $timestamp);
		$month = date('m', $timestamp) - 1;
		$year = date('Y', $timestamp);

		$result = "$months[$month] $day, $year";
		return $result;
	}

	function numberPages($postPerPage, $connection) {
		$totalPosts = $connection->prepare('SELECT FOUND_ROWS() as count');
		$totalPosts->execute();
		$totalPosts = $totalPosts->fetch()['count'];

		$numberPages = ceil($totalPosts / $postPerPage);
		return $numberPages;
	}

	function validateSession() {
		if(!isset($_SESSION['admin'])) {
			return header('Location: ' . ROUTE);
		}
	}

?>
