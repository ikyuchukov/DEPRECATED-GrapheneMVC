<?php
//load controllers
function loadController($className)
{
	$filename = "controllers/" . $className . "_controller.php";
	if (is_readable($filename))
	{
		require_once $filename;
	}
}
function loadModel($className, $data = null, $db_config)
{
	//extract the data array, so it can be accessed easier in the model
	if(!empty($data)){
		extract($data);
	}
	
	$filename = "models/" . $className . "_model.php";
	if (is_readable($filename))
	{
		require_once $filename;	
	} else {
		die ("ERROR: Model " . $className . " not found"); 
	}
}
//load views with data
function loadView($view, $data = null)
{
	//extract the data array, so it can be accessed easier in the view
	if(!empty($data)){
		extract($data);
	}

	$filename = "views/" . $view . "_view.php";
	if (is_readable($filename))
	{
		require_once $filename;
	}else{
		die("ERROR: View " . $view . " not found!");
	}
}
//load libraries (lib)
function loadLibrary($library)
{
	$library = ucfirst($library);
	$filename = "lib/" . $library . ".php";
	if (is_readable($filename))
	{
		require_once $filename;
	}else{
		die("ERROR: Library ".$library. " not found!");
	}
}

function loadDefController()
{
	if (is_readable("src/Controller.php"))
	{
		require_once "src/Controller.php";
	} else {
		echo "Error src/Controller.php cannot be loaded, something is VERY WRONG!";
	}

}
function loadDefModel()
{
	if (is_readable("src/Model.php"))
	{
		require_once "src/Model.php";
	} else {
		echo "Error src/Model.php cannot be loaded, something is VERY WRONG!";
	}

}
//autload main libs (src)
function autoloadMainLibs($className)
{
	$filename = "src/" . $className . ".php";
	if (is_readable($filename))
	{
		require_once $filename;
	}
}
spl_autoload_register("autoloadMainLibs");
//autoload config 
function autoloadConfig($className)
{
	$filename = "config/". $className . ".php";
	$filename =strtolower($filename);
	try {
		if (is_readable($filename))
		{
			require_once $filename;
		} else {
			throw new Exception("Class ($className) not found at $filename !");
		}
	} catch (Exception $e){
		echo "Error: " . $e->getMessage();
	}
}
spl_autoload_register("autoloadConfig");



