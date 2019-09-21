<?php include_once 'inc/header.php';?>
<div class="container">
	<h2 class="page-header">Create Job Listing</h2>
	<form method="post" action="create.php">
		<div class="form-group">
			<label>company</label>
			<input type="text" class="form-control" name="company">

			<label>Category</label>
			<select class="form-control" name="category_id">
				<option value="0">Choose Category</option>
	            <?php foreach($categories as $category): ?>
	            <option value=<?php echo $category->id ; ?> >
	            <?php echo $category->name; ?> 
	            </option>
           		<?php endforeach; ?>
       		</select>


			<label>Job Title</label>
			<input type="text" class="form-control" name="job_title">

			<label>Description</label>
			<textarea class="form-control" name="description"></textarea>  

			<label>Location</label>
			<input type="text" class="form-control" name="location">

			<label>Salary</label>
			<input type="text" class="form-control" name="salary">

			<label>Contact User</label>
			<input type="text" class="form-control" name="contact_user">

			<label>Contact Email</label>
			<input type="text" class="form-control" name="contact_email">

		</div>
		<input type="submit" class="btn btn-success" value="submit" name="submit">
	</form>
	<br>
<?php include_once 'inc/footer.php';?>