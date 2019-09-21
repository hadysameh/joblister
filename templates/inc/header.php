<!DOCTYPE html>
<html>
<head>
	<title>jobLister</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
	<div class="container">
	 <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-capitalize" href="create.php">create listing</a>
            </li>
            <li class="nav-item">
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"><?php echo site_title ;?> </h3>
      </div>
     </div>
     <?php displayMessage()?>