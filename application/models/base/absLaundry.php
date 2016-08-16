<?php

abstract class absLaundry extends CI_Model {

    protected $__table = 'laundry';
    protected $__fillable = ['cnpj','name','email','clave','phone','image','status'];
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

    abstract protected function register();

    abstract protected function login();

    abstract protected function checkCookie();

    abstract protected function redefine();

    abstract protected function remember();

    abstract protected function checkRemember();
    
    abstract protected function secureEdit();

    abstract protected function edit();

    abstract protected function address();

    abstract protected function failDelivery();

    abstract protected function getInfo();

    abstract protected function registerImage();

}