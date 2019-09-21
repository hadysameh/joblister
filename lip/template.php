<?php 


class template{
	// path to template (path to this file)
	protected $template;
	//vars passed in 
	protected $vars = array();
	//construcor

	public function __construct($template)
	{
		$this->template=$template;
	}

	public function __get($key)
	{
		return $this->vars[$key];
		//__get is just used to return what you want
	}

	public function __set($key,$value)
	{
		//__get and __set are independent on each other
		/*
		is run when you waht to set a value*/ 
		$this->vars[$key]=$value;
	
	}

	

	

	public function __toString()
	/*
	The __toString() method allows a class to decide how it will react when it is treated like a string. For example, what echo $obj; will print. This method must return a string, as otherwise a fatal E_RECOVERABLE_ERROR level error is emitted.
	*/
	{
		//print_r($this->vars);
		extract($this->vars);
		//this line is possible beacause of the function__get()
		/*extract is used to deal with the keys of the array as if they were independent variables
		*/
		chdir(dirname($this->template));
		//chdir :changing direcrtory takes string
		//dirname() firectory name 
		ob_start();
		//output buffering strart
		//helps function header()
		//contains the current HTTP address after changing the dir
		//Think of ob_start() as saying "Start remembering everything that would normally be outputted, but don't quite do anything with it yet."
		include basename($this->template);
		//The basename() function returns the filename from a path.not the folder
		//for garentee only
		return ob_get_clean();
		//ob_get_clean() cleans the output buffering

	}


}