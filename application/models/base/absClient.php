<?php

abstract class absClient extends CI_Model {

    protected $__table = 'client';
    protected $__fillable = ['idFacebook','name','email','clave','phone','mobile','status'];
    protected $__protected = ['clave','idFacebook'];
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

    abstract protected function login();

    abstract protected function edit();

    abstract protected function address();

}