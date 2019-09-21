<?php include_once 'inc/header.php';?>
<div class="container">
     

      <div class="jumbotron">
        <h1 class="text-capitalize">find a job</h1>
        <form method="GET" action="index.php">
          <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach($categories as $category): ?>
                <option value=<?php echo $category->id;?>> <?php echo $category->name; ?> </option>
            <?php endforeach; ?>
          </select>
          <br>
          <input type="submit" class="btn btn-lg btn-success" value="FIND">
        </form> 
      </div>
      <h3><?php echo $title ;?></h3>
      <?php foreach($jobs as $job):?>
      <div class="row marketing">
        <div class="col-md-10">

          <h4><?php  echo $job->job_title; ?></h4>
          <p><?php echo $job->discription;?></p>
      	</div>

      	<div class="col-md-2">
      		<a class="btn btn-success" href=<?php echo 'job.php?job_id='.$job->id;?> >view </a>
      	</div>
    </div>
    <?php endforeach ?>
 

     	   
       

      
 <?php include_once 'inc/footer.php';?>