<?php

abstract class absOrder extends CI_Model {

    protected $__table = 'order';
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

    abstract protected function deliveryPending();

    abstract protected function historic();

    abstract protected function dashboard();

    abstract protected function changeDelivery();

    abstract protected function changeStatus();

    abstract protected function insertItem();

    abstract protected function insertDetail();

    abstract protected function getDetail();

}