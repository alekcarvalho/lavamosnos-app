<?php

abstract class absNotification extends CI_Model {

    protected $__table = 'notification';
    protected $__fillable = [];
    protected $__protected = [];
    private   $__arrData = array();

    public function __construct()
    {

        parent::__construct();

        $this->load->database('',FALSE,NULL,$this->__fillable,$this->__protected);

    }

    public function arrData($val = array()){

    	if(!empty($val)) 
    		$this->__arrData = $val;

    	return $this->__arrData;

    }

    abstract protected function register();

    abstract protected function getInbox();

}