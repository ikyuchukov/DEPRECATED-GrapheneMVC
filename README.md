#GrapheneMVC 

GrapheneMVC is a lightweight "barebones" MVC Framework for PHP. It provides the developer with the basic MVC package without too much "bloat", besides the obvious Models, Controllers, Views it provides basic functions such as Library loader, URL checker/segmenter, Pagination library, prettier var_dumps and some input sanization. 

##Why the name?

Well like graphene the framework is pretty light, small (archive is under 15kb) and robust. Also I think it sounds semi-original.

##Requirements 

PHP 5.5+

Apache with mod_rewrite

Note:

If you can emulate the mod_rewrite rules in the .htaccess on another web server(nginx), go for it!

##Installation 

1. Extract the archive / Clone this repo.

2. Change the base_url in config/config.php 

3. That's it, you are done!

##Usage 

By default controllers/Home_controller.php is loaded, if you wish to change this, you can do so from the $home_controller var in the config file.

The configuration file is located at 
	config/config.php

From the controller you can load your models and views as needed, an example is includes in the default controller.

Loading models:

```php
//we set the model object in a var
$this->example = $this->model->load('Example');
```
We can pass data to the model as well (even if rarely needed), it works the same as the below example with the views.

Loading views is just:
```php
$this->view->load('Example');
```
If you wish to pass data to the view (which you will most likely), you can set the data array as the second argument:
```php
$this->view->load('Example', $this->data);
```
Note:

The data array will be extracted for easier usage, for example if we have the following:

```php
$this->data = array (
	'users' => array (
		'1' => 'Winston Smith',
		'2' => 'Henry Case',
		'n' => 'Ben Kenobi',		
		),
	);
```

The users var will be available in the view by just $users.

##Global variables 

Global variables can be set via the config file, they will be made available to the controller at $this->config;

##Creating Controllers, Models, Views

To create Controllers or Models just navigate to the Controllers/Model folder and create a file with the class name followed by a underscore and the type of the structure you are creating. After that in the file extend either the Controller class or Model class. 

Example controller named Login:

File would be:

	/controllers/Login_controller.php

In the file we see:

```php
<?php

Class Login extends Controller {

}
```

That's it!

For models it would be:


	/models/Login_model.php
```php
<?php

Class Login extends Model {

}
```

Creating views is even simpler, just create the file and load it in your controller as mentioned above:

	/views/Login_view.php	


##Database Configuration

The database details can be found at the config file and are pretty straith forward, note that if the default database user isn't changed a connection to the database will not be attempted.

The database connection is made via PDO and the PDO instance is available at the model with:
```php
$this->db 
```
As PDO is used, you can use the framework with any type of database supported by your PHP's PDO extensions.

Note:

SQLite isn't currenly supported as the PDO details function must be tweaked a bit, will do this on next update.

No database abstraction is made outside this, as PDO's functions are most of the time enough. However if you wish to make your own functions database abstraction functions which are then available in all models you can create them at src/Model.php.


##Loading Libraries

External libraries can be added in the lib folder and loaded from your controller via:

Library file is at:

```
/lib/Security.php
```
in the controller we have:

```php
$library_name = 'Security';
$this->loadLibrary($library_name);
```

The library will be loaded as well with a class object of it at $this->library_name;

If the library's name is not the same as it's class you can load it with a second argument which is the name of the class.

Example:

```php
$library_name = "Security";
```

The library's class is "Secure":

```php
$this->loadLibrary($library_name, 'Secure');
```

The object will now be 

```php
$this=>secure.
```

##Autoloading Libraries

You will most likely want a library that should be autoloaded for every class.

If you wish to autload a library, just add it to the autoload in the config file and Graphene will do it for you.

##Other Functions

If you are debugging something and want the variables to be shown in a formatted matter you can use:

```php
//dumps the current var
prettyDump($var);

//dumps the var and die()s.
prettyDie($var);
```

Sanization functions:

```php
//sanitize variable for special chars and whitespace
//leaves underscore '_'
alphaNum($var);


//sanitize multidimensional array for special chars and whitespace
//leaves underscore '_'
alphaNumArray($array);
```

Current URL can be gotten via:

	getCurrentUrl();

You can make the URL into an array with segments via:

	getSegments($url);


For the Pagination library, please check my repo for it:

https://github.com/ikyuchukov/iziPagination

##Extending the basic Controller and Model

If you wish to extend the basic controller and model so that all of your new ones have the new functions, you can do this from src/Controller.php and src/Model.php.

##To be added

Full PSR-2 Compliance.

Autoloader to be PSR-4 compliant.

SQLite connection without user workaround.


##Version 1.01

Added autoloading of Libraries with different class names. Check config/autoload.php for more details.

##License 

GrapheneMVC is licensed under BSD 3.0





