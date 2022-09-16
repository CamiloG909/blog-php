<header class="header">
	<div class="header__container container">
		<section class="header__left" onclick="window.location.href='<?php echo ROUTE; ?>'">
			<img src="<?php echo ROUTE; ?>assets/php.png" alt="Logo header" />
			<p class="header__title">BLOG</p>
		</section>
		<section class="header__right">
			<form name="search" class="header__form-search" action="<?php echo ROUTE; ?>search.php" method="GET">
				<input class="header__input" type="text" name="q" placeholder="Search..." value="<?php if(isset($_GET['q'])) echo $search; ?>">
				<button class="header__btn-search"><i class="bi bi-search"></i></button>
			</form>
			<a href="https://www.linkedin.com/in/camilog90/" target="_blank">
				<i class="bi bi-linkedin"></i>
			</a>
			<a href="https://github.com/CamiloG909" target="_blank">
				<i class="bi bi-github"></i>
			</a>
			<a href="mailto:cgalindorivera@gmail.com" title="cgalindorivera@gmail.com"><i class="bi bi-envelope-fill"></i> Contact</a>
			<a href="<?php echo ROUTE; ?>login.php" title="Sign in">
				<i class="bi bi-person-circle"></i>
			</a>
		</section>
	</div>
</header>
