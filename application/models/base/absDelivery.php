<?php

abstract class absDelivery extends CI_Model {

    protected $__table = 'delivery';
    protected $__fillable = [];
    protected $__protected = ['clave'];
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

    abstract protected function login();

    abstract protected function checkCookie();

    abstract protected function checkRemember();

    abstract protected function redefine();

    abstract protected function remember();

}