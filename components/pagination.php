<section class="pagination container">
	<ul class="pagination__ul">
		<?php $numberPages = numberPages($numberPost, $connection); ?>
		<li class="pagination__li <?php if(currentPage() == 1) echo '--disabled' ?>">
			<a href="<?php if(currentPage() == 1)
				{
					echo '#';
				} else {
					echo './';
				};
			?>">
				<i class="bi bi-caret-left-fill"></i>
			</a>
		</li>
		<?php for($i = 1; $i <= $numberPages; $i++): ?>
			<li class="pagination__li">
				<a href="<?php echo "./?page=$i"; ?>">
					<?php echo $i; ?>
				</a>
			</li>
		<?php endfor ?>
		<li class="pagination__li <?php if(currentPage() == $numberPages) echo '--disabled' ?>">
			<a href="<?php if(currentPage() == $numberPages)
				{
					echo '#';
				} else {
					echo "./?page=$numberPages";
				};
			?>">
				<i class="bi bi-caret-right-fill"></i>
			</a>
		</li>
	</ul>
</section>
