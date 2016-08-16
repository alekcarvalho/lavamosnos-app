<?php

class notificationModule{

	private $child;
	
	function __construct($child){

		require_once $child.'/'.$child.'.class.php';

		$this->child = $child;

	}

	public function send($data){

		$cls = new $this->child($data);

		return $cls->send();
		
	}

	public function getInbox($data){

		$cls = new $this->child($data);

		return $cls->getInbox();
		
	}

}