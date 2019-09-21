<?php include_once 'config/net.php';?>
	
<?php

$job = new job;

$template = new template('templates/frontpage.php');

$category = isset($_GET['category'])? $_GET['category']: null;

if($category)
{
	$template->jobs=$job->getByCategory($category);
	$template->title='Jobs In '.$job->getCategory($category)->name;
}
else
{
	$template->title='latest jobs';
	//title here is an index
	$template->jobs=$job->getAlljobs();
}



//var_dump($template->jobs);
$template->categories=$job->getCategories();

echo $template;//this line is possible because of the __toString() method
//this line make the var $categories exists to
//be used in the front page

