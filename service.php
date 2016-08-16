<?php

	define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

	// ini_set('display_errors', 0);

	// if (version_compare(PHP_VERSION, '5.3', '>=')){

	// 	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	// }else{

	// 	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		
	// }

	$customer = $_SERVER['HTTP_HOST'];

	if(strstr($_SERVER['HTTP_HOST'], ':8080'))
		$customer = $_SERVER['SERVER_NAME'];

	$tmp = explode(".", $customer);

	$app = ( ( (ENVIRONMENT == 'development') && ($tmp[0] !== 'localhost') ) ? 'dev_' : '') . $tmp[0];

	switch ($app) {

		case 'delivery':
			$app = 'delivery';
			break;

		case 'dev_lavanderia':
			$app = 'laundry';
			break;

		case 'localhost':
			$app = 'delivery';
			break;

		default:
			$app = 'client';
			break;
	}

	$system_path = 'system';

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
		chdir(dirname(__FILE__));

	if(($_temp = realpath($system_path)) !== FALSE){

		$system_path = $_temp.DIRECTORY_SEPARATOR;

	}else{
		// Ensure there's a trailing slash
		$system_path = strtr(
			rtrim($system_path, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;

	}

	// Is the system path correct?
	if ( ! is_dir($system_path)){

		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG

	}

	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system directory
	define('BASEPATH', $system_path);

	// Path to the front controller (this file) directory
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	// Name of the "system" directory
	define('SYSDIR', basename(BASEPATH));

	define('APPPATH', 'application/');

	define('VIEWPATH', '');

	define('APPTYPE', $app);

require_once BASEPATH.'core/LavamosServicos.php';
