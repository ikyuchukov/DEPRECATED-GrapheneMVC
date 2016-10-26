<?php

Class Initialise{
	
	public $config;
	public function __construct(){
		//load the config
		$this->config = (array) new Config;
		$this->config += (array) new Autoload;
	}
	
	public function start(){
		//intiatelise the basic classes
		$debug = new Debug();
		$debug->globalFunctions();
		$url = new Url();
		$url->globalFunctions();
		//add current url to config
		$this->config += $url->getSegments($url->current_url);
		$config = $this->config;
		
		//we check the environment and set the error reporting accordingly
		$this->setErrors($config['production']);
	
		//load default controller src/Controller.php	
		loadDefController();

		//load the default model src/Model.php
		loadDefModel();
		//we create a new Model and pass the db config to it
		//the model object is later passed into the requested controlled and is available via $this->model
		$model = new Model;
		$model->db_config = $this->config['db_config'];

		//if db_user is left default in config/config don't attempt a DB connection
		if ($model->db_config['db_user'] != 'dbuser')
		{	
			$model->setDsn();
			$model->dbConnect();
		}	
		//check which is the requested controller and function
		$request = $this->checkRequest($this->config['segment'],$this->config['home_controller']);
		//we load the requested controller and function
		$this->load($request[0], $request[1], $this->config, $model);
	
	}
	public function load($controller, $function = 'index',  $config, $model){
		//TODO must set error messages if controller/function not found	
		//load the needed controller		
		loadController($controller);
		$load_controller = new $controller; 
		//load the config into the controller
		$load_controller->config = $config;

		//pass the model object to the loaded controller
		$load_controller->model = $model;	

		//load the needed function
		//if no function is selected the index one is executed
		$load_controller->$function();
	}
	
	//check if we should load a specific controller/function or the default ones
	public function checkRequest($segments, $default_controller){
	
	//we load the default controller if no other controller is called
	if ($segments['1'] == null){
	$segments['1'] = $default_controller;
	}
	
	//we load the index function if no other function is called
	if (!isset($segments['2'])){
	$segments['2'] = 'index';
	}
	
	//set the first character to uppercase in order to load the
	//controller correctly	
	$segments['1'] = ucfirst($segments['1']);
	
	$result = array();
	$result[0] = $segments['1'];
	$result[1] = $segments['2'];
	return $result;
	}
	public function setErrors($production)
	{
		if ($production == TRUE){
			ini_set('display_errors', 0);
			ini_set('log_errors', 1);	
		} else {
			ini_set('display_errors', 1);
		}
	}
}

	
