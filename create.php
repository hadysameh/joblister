<?php include_once 'config/net.php';?>
	
<?php

$job = new job;

$job_id = isset($_GET['job_id']) ? $_GET['job_id']: null;

if(isset($_POST['submit']))
{

	$data = array();

	$data['job_title'] = $_POST['job_title'];
	$data['company'] = $_POST['company'];
	$data[':category_id'] = $_POST['category_id'];
	$data['description'] = $_POST['description'];
	$data['salary'] = $_POST['salary'];
	$data['location'] = $_POST['location'];
	$data['contact_user'] = $_POST['contact_user'];
	$data['contact_email'] = $_POST['contact_email'];
	echo '<pre>';
	print_r($data);
	echo '</pre>';


	if($job->create($data))
	{
		//the redirect func is accessable because of the first line
		redirect('index.php','your job has been listed','success');
	}else
	{
		redirect('index.php','something went wrong','error');
	}

}

$template = new template('templates/job-create.php');

//var_dump($template->jobs);
$template->categories=$job->getCategories();

echo $template;//this line is possible because of the __toString() method

