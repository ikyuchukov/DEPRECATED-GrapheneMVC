<?php

Class Home extends Controller{

	function index(){
		//example how to store variables to $this->data	
		$this->data['config'] = $this->config;
	
		//loading example Model
		$this->example = $this->model->load('Example');
		
		//loading example views in sequence	
		//the second parameter are the variables which we want to sent to the views
		$this->view->load('Header', $this->data);
		$this->view->load('Home', $this->data);
		$this->view->load('Footer', $this->data);
	}
	

}
