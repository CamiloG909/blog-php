<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="theme-color" content="#1CCC5B" />
		<link rel="stylesheet" href="../styles/styles.css" />
		<link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Gallery images with PHP and SASS">
		<title>Panel | PHP</title>
	</head>
	<body>
		<?php require '../components/header.php'; ?>
		<main>
			<section class="container margin-top panel">
				<h1 class="panel__title">Control panel</h1>
				<a class="panel__links" href="<?php echo ROUTE . 'admin/new.php'; ?>"><i class="bi bi-plus-circle-fill"></i> New post</a>
				<a class="panel__links" href="<?php echo ROUTE . 'logout.php'; ?>"><i class="bi bi-door-open-fill"></i> Logout</a>
				<?php foreach($posts as $post): ?>
					<article class="post">
						<p class="post__title"><?php echo $post['id'].'- '.$post['title']; ?></p>
						<p class="post__date"><?php echo formatDate($post['date']); ?></p>
						<div>
							<a class="post__link" href="<?php echo ROUTE.'admin/edit.php?id='.$post['id']; ?>">Edit</a>
							<a class="post__link" href="<?php echo ROUTE.'post.php?id='.$post['id']; ?>">Read</a>
							<a class="post__link" href="<?php echo ROUTE.'admin/delete.php?id='.$post['id']; ?>">Delete</a>
						</div>
					</article>
				<?php endforeach; ?>
			</section>
			<?php require '../components/pagination.php'; ?>
		</main>
	</body>
</html>
