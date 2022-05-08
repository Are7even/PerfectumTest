<?php
?>
<div class="container">
	<div class="row">
		<div class="col-md-5 mb-3">
			<label for="country">Status</label>
			<select class="custom-select d-block w-100" id="js-status-filter" required="">
				<option value="all">All</option>
				<option value="status1">bought</option>
				<option value="status0">need to buy</option>
			</select>
			<div class="invalid-feedback">
				Please select a valid country.
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label for="state">Category</label>
			<select class="custom-select d-block w-100" required="" id="js-category-filter">
				<option value="all">All</option>
				<?php foreach ($categories as $category) { ?>
					<option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
				<?php } ?>
			</select>
			<div class="invalid-feedback">
				Please provide a valid state.
			</div>
		</div>
	</div>
	<div id="items">
		<?php foreach ($items as $item) { ?>
			<div class="row <?php echo $item['category_id'] ?> status<?php echo $item['status'] ?>" id="js-item">
				<input id="js-itemId" type="hidden" value="<?php echo $item['id'] ?>"/>
				<div class="col mb-5">
					<h4><?php echo $item['title'] ?></h4>
				</div>
				<div class="col" id="js-status-label">
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
						<button id="js-status" type="button" class="btn btn-success">✔</button>
					</div>
				<?php } ?>
				<div class="col">
					<button id="js-delete" type="button" class="btn btn-danger">x</button>
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
						<option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
					<?php } ?>
				</select>
				<div class="invalid-feedback">
					Valid last name is required.
				</div>
			</div>
		</div>
		<input type="submit" name="submit" value="add item">
	</form>
	<a class="btn btn-outline-primary m-5" href="<?php echo base_url()?>category">Create category</a>
</div>
