<?php

Class Model{
	
	//here we store our PDO connection
	public $db = Null;

	//this is filled by the main controller from config/config.php
	public $db_config;

	//what we actually use for the PDO connection details
	public  $dsn = Null;	

	function __construct($dbConnect = Null){
		//this is given at src/Initialise in order to be available for child models
		$this->db = $dbConnect;
	}
	//we use this to load the needed model
	function load($model, $data = null){
	
		//load the needed model
		//the model in question extends this class 
		loadModel($model, $data, $this->db);
		return new $model($this->db);				
	}
	function setDsn(){
		$db_config = $this->db_config;
		$this->dsn = $db_config['db_type'] . ':host=' . $db_config['db_host'] . ';dbname=' . $db_config['db_name'] . ';charset=' . $db_config['db_charset'];	

	}
	function dbConnect(){
		$this->db = new PDO($this->dsn, $this->db_config['db_user'], $this->db_config['db_pass'], $this->db_config['opt']);

	}	
}
