<?php
	namespace NetspherePiratesWeb
	{
		spl_autoload_register(function($class){
			$filename = __DIR__.DIRECTORY_SEPARATOR.str_replace(__NAMESPACE__, '', $class).'.php';

			if(file_exists($filename))
			{
				require_once $filename;
			}
			else
			{
				die('Failed to load class '.$class);
			}
		});
	}
?>