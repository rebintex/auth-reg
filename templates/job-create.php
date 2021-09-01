<?php include 'inc/header.php'; ?>
<h2 class="page-header">Create Job Listing</h2>
<form method="POST" action="create.php">
	<div class="form-group">
		<label for="">Company</label>
		<input type="text" class="form-control" name="company">
	</div>
	<div class="form-group">
		<label for="">Category</label>
		<select class="form-control" name="category">
			<option value="0">Choose the category</option>
            <?php foreach($categories as $category) : ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Job title</label>
		<input type="text" class="form-control" name="job_title">
	</div>
	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-control" name="description">
	</div>
	<div class="form-group">
		<label for="">Location</label>
		<input type="text" class="form-control" name="location">
	</div>
	<div class="form-group">
		<label for="">Salary</label>
		<input type="text" class="form-control" name="salary">
	</div>
	<div class="form-group">
		<label for="">Contact user</label>
		<input type="text" class="form-control" name="contact_user">
	</div>
	<div class="form-group">
		<label for="">Contact email</label>
		<input type="text" class="form-control" name="contact_email">
	</div>
	<input type="submit" class="btn btn-default" value="Submit" name="submit">
</form>

<?php include 'inc/footer.php'; ?>