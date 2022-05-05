<?php
?>
<div class="container">
	<?php foreach ($categories as $category) { ?>
		<div class="row">
			<div class="col mb-5">
				<h4><?php echo $category['title'] ?></h4>
			</div>
			<div class="col">
				<h4><?php echo Status_helper::isActive($category['status']) ?></h4>
			</div>
			<?php if (!$category['status']) { ?>
				<div class="col">
					<button type="button" class="btn btn-success">✔</button>
				</div>
			<?php } ?>
			<div class="col">
				<button type="button" class="btn btn-danger">x</button>
			</div>
		</div>
	<?php } ?>

	<?php echo validation_errors(); ?>
	<form action="category/index" method="post">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="title">Category title</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="" value="" required="">
				<div class="invalid-feedback">
					Valid first name is required.
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="add item">
	</form>
</div>
