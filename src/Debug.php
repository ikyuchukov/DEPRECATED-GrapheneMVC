<?php

Class Debug{
	
	public function __construct()
	{
	
	}
	
	//functions added here can be called globally
	public function globalFunctions()
	{
	 //pretty debug with var_dump
	 function prettyDie($arg)
		{
			echo '<pre>';
			var_dump($arg);
			echo '</pre>';
			die();
		}
	//pretty var_dump
	function prettyDump($arg)
		{
			echo '<pre>';
			var_dump($arg);
			echo '</pre>';
		}

	}	

}
