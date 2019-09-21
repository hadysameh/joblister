<?php include_once 'config/net.php';?>
	
<?php

$job = new job;

if(isset($_POST['del_id']))
{
	$del_id=$_POST['del_id'];
	if($job->delete($del_id))
	{
		redirect('index.php','job Deleted','success');
	}
	else
	{
		redirect('index.php','job not Deleted','error');
	}

}

$template = new template('templates/job-single.php');

$job_id = isset($_GET['job_id']) ? $_GET['job_id']: null;
//echo $job_id;
$template->job = $job->getJob($job_id);


 //var_dump($template->job);

echo $template;//this line is possible because of the __toString() method

