<?php
include 'config/security.php';

spl_autoload_register('Autoload');

function Autoload($classname){
	$fullPath = 'config/'.$classname.'.config.php';

	if(!file_exists($fullPath)){
		return false;
	}

	include_once($fullPath);
}