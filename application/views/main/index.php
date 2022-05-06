<?php
?>
<div class="container">
	<div id="items">
		<?php foreach ($items as $item) { ?>
			<div class="row">
				<div class="col mb-5">
					<h4><?php echo $item['title'] ?></h4>
				</div>
				<div class="col">
					<h4><?php echo Status_helper::isBuy($item['status']) ?></h4>
				</div>
				<div class="col">
					<h4><?php echo Status_helper::whichCategory($item['category_id']) ?></h4>
				</div>
				<div class="col">
					<h4><?php echo Status_helper::whichTime($item['time']) ?></h4>
				</div>
				<?php if (!$item['status']) { ?>
					<div class="col">
						<button type="button" class="btn btn-success">✔</button>
					</div>
				<?php } ?>
				<div class="col">
					<button type="button" class="btn btn-danger">x</button>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php echo validation_errors(); ?>
	<form id="itemForm">
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="title">Product title</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="" value="" required="">
				<div class="invalid-feedback">
					Valid first name is required.
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<label for="category_id">Category</label>
				<!--			<input type="text" class="form-control" id="category" placeholder="" value="" required="">-->
				<select class="custom-select d-block w-100" id="category_id" name="category_id" required="">
					<?php foreach ($categories as $category) { ?>
						<option><?php echo $category['id'] ?></option>
					<?php } ?>
				</select>
				<div class="invalid-feedback">
					Valid last name is required.
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="add item">
	</form>
</div>
