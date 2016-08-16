<?php

final class autoloader {

	private $custom_status = false;
	private $custom_path;
        
    public static function load() {

    	$self = new self();
    	
        spl_autoload_register(array($self, 'Register'));

    }

    private function Register($class) {

    	if(class_exists($class) || interface_exists($class))
    		return;

	    if(file_exists('service/core/'. $class .'.class.php'))
	        require_once 'service/core/'. $class .'.class.php';

    }

}