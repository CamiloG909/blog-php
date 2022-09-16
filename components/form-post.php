<form class="margin-top form-post" enctype="multipart/form-data" action="<?php if(isset($edit)) echo htmlspecialchars($_SERVER['PHP_SELF'].'?id='.$post['id']); ?><?php if(!isset($edit)) echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h1 class="form-post__title"><?php echo isset($edit) ? 'Edit' : 'New' ?> post</h1>
	<input class="form-post__input" type="text" name="title" placeholder="Title" value="<?php if(isset($edit)) echo $post['title']; ?>" required>
	<input class="form-post__input" type="text" name="extract" placeholder="Extract from text" value="<?php if(isset($edit)) echo $post['extract']; ?>" required>
	<textarea class="form-post__input --textarea" name="text" placeholder="Text" required><?php if(isset($edit)) echo $post['text']; ?></textarea>
	<?php if(!isset($edit)): ?>
		<input class="form-post__input" type="file" name="thumb" title="Select your image">
	<?php endif ?>
	<button class="form-post__btn">
	<?php echo isset($edit) ? 'Update <i class="bi bi-arrow-clockwise"></i>' : 'Create <i class="bi bi-cloud-plus-fill"></i>' ?>
	</button>
</form>
