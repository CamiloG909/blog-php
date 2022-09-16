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
		<title>Login | PHP</title>
	</head>
	<body>
		<?php require 'components/header.php'; ?>
		<main>
			<form class="margin-top login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<p class="login__title">Login</p>
				<input class="login__input" type="text" name="user" placeholder="Username (admin)" required>
				<input class="login__input" type="password" name="password" placeholder="Password (admin)" required>
				<button class="login__btn">Sign in <i class="bi bi-door-open-fill"></i></button>
				<?php if(isset($error)) echo "<p class='login__error'><i class='bi bi-exclamation-triangle-fill'></i> $error</p>"; ?>
			</form>
		</main>
	</body>
</html>
