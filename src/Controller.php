<?php

Class Controller {

	public $config;
	//default array for handling data to views
	public $data;

	public function __construct(){
		
		//load the view class
		$this->view = new View;

		//autoload libraries
		if(!empty($this->config['autoload_libs'])){
			$this->autoload($this->config['autoload_libs']);	
		}

	}	private function autoload($libraries){
		foreach ($libraries as $lib){
			loadLibrary($lib);
		}	
	}
	function loadLibrary($library, $autoload_class = TRUE){
		loadLibrary($library);

		/**
		 *Autoloads the class of the library if it has the same name as the library file.
		 *If the class name is different than the library name and you want it autoloaded
		 *just set the $autoload_class to the class's name
		 *
		 *Example: 
		 *$autoload_class = 'Myclassisdifferent';
		 *
		 *If you don't wish to autoload classes set $autoload_class to FALSE
		**/
		if ($autoload_class === TRUE){
			$this->$library = new $library;
		} else if ($autoload_class !== FALSE){
			$this->$library = new $autoload_class;
			}
		
		}
	}
