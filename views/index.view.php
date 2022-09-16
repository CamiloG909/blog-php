<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="theme-color" content="#1CCC5B" />
		<link rel="stylesheet" href="styles/styles.css" />
		<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Gallery images with PHP and SASS">
		<title>Blog | PHP</title>
	</head>
	<body>
		<?php require 'components/header.php'; ?>
		<main>
			<section class="container-posts container margin-top">
				<?php foreach($posts as $post): ?>
					<article class="post">
						<p class="post__title"><?php echo $post['title']; ?></p>
						<p class="post__date"><?php echo formatDate($post['date']); ?></p>
						<img class="post__img" src="<?php echo ROUTE; ?>assets/images/<?php echo $post['thumb']; ?>" alt="">
						<p class="post__text"><?php echo $post['extract']; ?></p>
						<a class="post__link" href="post.php?id=<?php echo $post['id']; ?>">Read more... </a>
					</article>
				<?php endforeach; ?>
			</section>
			<?php require 'components/pagination.php'; ?>
		</main>
	</body>
</html>
