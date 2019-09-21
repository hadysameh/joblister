<?php 
//start session
	
session_start();

//config file
require_once 'config.php';
//include helpers

require_once 'helpers/system_helper.php';

//auto loader
function __autoload($class_name)
{
	require_once 'lip/'.$class_name.'.php';
}

// echo 'test';

