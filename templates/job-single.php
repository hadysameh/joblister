<?php include_once 'inc/header.php';?>

<div class="container">
<h2 class="page-header"><?php echo $job->job_title;?>
	(<?php echo $job->location; ?>)
</h2>

<small>posted by <?php echo $job->contact_user?> on <?php echo $job->post_date; ?></small>

<hr>
<p class="lead">
	<?php echo $job->discription;  ?>
</p>
<ul class="list-group">
	<li class="list-group-item"><strong>company:</strong> <?php echo $job->company; ?> </li>
	<li class="list-group-item"><strong>salary:</strong> <?php echo $job->salary; ?> </li>
	<li class="list-group-item"><strong>Contact Email:</strong> <?php echo $job->contact_email; ?> </li>
</ul>
<br><br>
<a href="index.php" class='btn btn-outline-success'>Go Back</a>
<br><br>

<div class="">
	<a href="edite.php?id=<?php echo $job->id ;?>" class='btn btn-success'>Edite</a>
	<form style="display: inline;" method="post" action="job.php">
		<input type="hidden" name="del_id" value='<?php echo $job->id ; ?>'>
		<input type="submit" class="btn btn-danger" value="delet">
	</form>
</div>


<?php include_once 'inc/footer.php';?>