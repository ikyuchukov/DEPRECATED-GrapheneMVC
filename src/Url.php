<?php

Class Url{
	public $current_url;


	public function __construct(){	

	//we check if HTTP or HTTPS is used
	if ($this->httpCheck()) {
	$this->current_url = 'http://';
}else{
	$this->current_url = 'https://';
}
	$this->current_url = $this->getCurrentUrl(). $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}	
	//functions here can be called globally
	public function globalFunctions(){
		function currentUrl(){
			$url = (new Url())->getCurrentUrl();
			return $url;	
	}

	}
	
	//make the URL into segments
	public function getSegments($url){
	$url_segments =  parse_url($url);
	//set the path into different segments and set the host as segment[0]
	$url_segments['segment'] = explode("/", $url_segments['path']);
	$url_segments['segment'][0] = $url_segments['host'];
	return $url_segments;
}
	//check if http or https is used
	public function httpCheck(){
	if(!isset($_SERVER['HTTPS'])){
	//http is used
	return true;
	} else {
	//https is used
	return false;
}
}
	public function getCurrentUrl()
	{
		return $this->current_url;
	} 

}
