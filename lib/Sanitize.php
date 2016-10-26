<?php

Class Sanitize{
	//sanitize variable for special chars and whitespace
	//leaves underscore '_'
	public static function alphaNum($value){
		$value = htmlspecialchars($value);
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		$value = preg_replace("/[^a-zA-Z0-9_\s]/", "", $value);
		return $value;	
	}
	//special function in order to use array_walk, sets value by reference
	public static function alphaNumWalk(&$value, $key){
		$value = htmlspecialchars($value);
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		$value = preg_replace("/[^a-zA-Z0-9_\s]/", "", $value);
	}
	//sanitize multidimensional array for special chars and whitespace
	//leaves underscore '_'
	function alphaNumArray($arr = array()){
		
		array_walk_recursive($arr, array($this , 'alphaNumWalk'));
		return $arr;
	}
}
