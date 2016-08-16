<?php

class userModule extends CI_Controller{

	private $child;

	private $fill = [];
	
	function __construct($child){

		parent::__construct();

		$this->child = $child;

		$this->fill['client'] = array(
					        	'name'		=> 'regName',
					        	'email'		=> 'regEmail',
					        	'clave'		=> 'regClave',
					        	'Phone'		=> 'regPhone',
					        	'Mobile'	=> 'regMobile'
					        );

		$this->fill['laundry'] = array(
					        	'name'		=> 'regName',
					        	'cnpj'		=> 'regCnpj',
					        	'phone'		=> 'regPhone',
					        	'email'		=> 'regEmail'
					        );

		$this->fill['login'] = array(
					        	'email'		=> 'lgEmail',
					        	'clave'		=> 'lgClave',
					        	'code_auth'		=> 'autoconnect'
					        );

		$this->fill['info'] = array(
					        	'id'		=> 'usrId'
					        );

		$this->fill['address'] = array(
					        	'zipcode'		=> 'locZipcode',
					        	'address'		=> 'locAddress',
					        	'number'		=> 'locNumber',
					        	'complement'	=> 'locComplement',
					        	'neighborhood'	=> 'locNeighborhood',
					        	'city'	 		=> 'locCity',
					        	'estate'	 	=> 'locEstate'
					        );
		
	}

	public function checkCookie($data){

		$this->fill['cookie'] = array(
							        	'code_auth'		=> 'code_auth'
							        );

		$arrReturn = $this->run($data, 'cookie', 'checkCookie');

		if(!$arrReturn)
			return 'Error to find  '.$this->child;

		return $arrReturn;

	}

	public function remember($data){

		$this->fill['remember'] = array(
							        	'email'		=> 'remEmail'
							        );

		$arrReturn = $this->run($data, 'remember', 'remember');

		if(!$arrReturn)
			return 'Error to find  '.$this->child;

		return $arrReturn;

	}

	public function checkRemember($data){

		$this->fill['remember'] = array(
							        	'id'.ucfirst($data['type'])		=> 'id',
							        	'remember'				=> 'code'
							        );

		unset($data['type']);

		$arrReturn = $this->run($data, 'remember', 'checkRemember');

		if(!$arrReturn)
			return 'Error to find  '.$this->child;

		return $arrReturn;

	}

	public function redefine($data){

		$this->fill['remember'] = array(
							        	'id'.ucfirst($data['type'])		=> 'id',
							        	'remember'				=> 'code',
							        	'clave'					=> 'redClave'
							        );

		unset($data['type']);

		$arrReturn = $this->run($data, 'remember', 'redefine');

		if(!$arrReturn)
			return 'Error to find  '.$this->child;

		return $arrReturn;

	}

	public function register($data){

		$arrReturn = $this->run($data, $this->child, 'register');

		if(!$arrReturn)
			return 'Error to register '.$this->child;

		return $arrReturn;
		
	}

	public function registerImage($data){

		$this->fill['info']['id'.ucfirst($this->child)] = 'usrId';
		$this->fill['info']['imagem'] = 'usrImage';

		unset($this->fill['info']['id']);

		$arrReturn = $this->run($data, 'info', 'registerImage');

		if(!$arrReturn)
			return 'Error to register '.$this->child;

		return $arrReturn;

	}

	public function edit($data){

		$this->fill[$this->child]['id'.ucfirst($this->child)] = 'regId';

		$arrReturn = $this->run($data, $this->child, 'edit');

		if(!$arrReturn)
			return 'Error to edit '.$this->child;

		return $arrReturn;

	}

	public function secureEdit($data){

		$this->fill['info']['id'.ucfirst($this->child)] = 'usrId';
		$this->fill['info']['clave'] = 'usrNewClave';
		$this->fill['info']['email'] = 'usrEmailSecundary';

		$arrReturn = $this->run($data, 'info', 'secureEdit');

		if(!$arrReturn)
			return 'Error to update security infos of '.$this->child;

		return $arrReturn;

	}

	public function address($data){

		if($this->child == 'client')
			$this->fill['address']['type'] = 'locType';

		$this->fill['address']['id'.ucfirst($this->child)] = 'locId';

		$arrReturn = $this->run($data, 'address', 'address');

		if(!$arrReturn)
			return 'Error to register the address of '.$this->child;

		return $arrReturn;

	}

	public function login($data){

		$arrReturn = $this->run($data, 'login', 'login');

		if(!$arrReturn)
			return 'Error login to '.$this->child;

		return $arrReturn;
		
	}

	public function getInfo($data){


		$this->fill['info']['id'.ucfirst($data['usrType'])] = 'usrId';

		unset($this->fill['info']['id']);
		unset($data['usrType']);

		$arrReturn = $this->run($data, 'info', 'getInfo');

		if(!$arrReturn)
			return 'Error to get informations of '.$this->child;

		return $arrReturn;

	}

	private function run($data, $fill, $action, $arrAdd = array()){

		$arrTemp = [];

		foreach ($this->fill[$fill] as $key => $value)
			$arrTemp[$key] = @$data[$value];

		foreach ($arrTemp as $k)
			if(empty($k))
				return 'Failure of arguments';

		$this->load->model(ucfirst($this->child));

		$this->{ucfirst($this->child)}->arrData($arrTemp);

		return $this->{ucfirst($this->child)}->{$action}();

	}

}