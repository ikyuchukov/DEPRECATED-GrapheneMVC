<?php

class Config{
	
	//set your base url 
	//Example:
	//public $base_url = 'http://example.com/';
	public $base_url = '';
	//name of the default loaded controller
	public $home_controller = 'Home';
	
	//database details
	public $db_config = array (
		'db_name' => 'dbname',
		'db_user' => 'dbuser',
		'db_pass' => 'dbpass',
		//localhost is usually the default database host
		'db_host' => 'localhost',
		//3306 is usually the default port for mysql
		'db_port' => '3306',
		'db_charset' => 'utf8',
		//type must be valid for PDO connection
		'db_type' => 'mysql',
		'opt' => array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
			),
		);
	
		//if we are on a production environment
		//sets display errors off and turns on logging if set to TRUE
	public $production = FALSE;
}
