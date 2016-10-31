<?php

Class Autoload {
	/*add the libraries you wish to autload in your controllers
	 if the library's class has the same name as the library, set the autoload_class parameter to TRUE.
	 if the class has a different name set it instead 
	 if you don't wish for a new class object to be made set autoload_class to FALSE.
	 Example loading a lib normally, loading a lib with a different class name and loading a library without autoloading the class:
	 public $autoload_libs = array(
		'Security' => TRUE,
		'Login' => 'Authentication',
		'Email' => FALSE,
	);
					
	*/	
	public $autoload_libs = array();	
}
