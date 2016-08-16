<?php

class orderModule extends CI_Controller{

	private $child;

	private $fill = [];
	
	function __construct($child){

		parent::__construct();

		$this->child = $child;

		$this->fill['make'] = array(
					        	'idClient'	=> 'regIdClient',
					        	'idLaundry'	=> 'regIdLaundry',
					        	'qty'		=> 'regQty'
					        );

		$this->fill['historic'] = array(
					        	'id'		=> 'usrId',
					        	'user'		=> 'usrType',
					        	'limit'		=> 'limit',
					        	'offset'	=> 'offset'
					        );

		$this->fill['detail'] = array(
					        	'idOrder'		=> 'ordId',
					        	'idOrderItem'	=> 'ordItem',
					        	'brand'			=> 'ordBrand',
					        	'note'			=> 'ordNote',
					        	'type'			=> 'ordtype'
					        );

		$this->fill['laundry'] = array(
					        	'idLaundry'		=> 'lauId'
					        );

		$this->fill['user'] = array(
					        	'id'		=> 'usrId'
					        );

		$this->fill[$this->child] = array(
							        	'idOrder'		=> 'ordId'
							        );

	}

	public function deliveryPending($data){

		$this->fill['user']['id'.ucfirst($data['usrType'])] = 'usrId';

		unset($this->fill['user']['id']);
		unset($data['usrType']);

		$arrReturn = $this->run($data, 'user', 'deliveryPending');

		if($arrReturn === false)
			return 'Error to get informations of '.$this->child;

		return $arrReturn;

	}

	public function changeDelivery($data){

		$this->fill['changeDelivery']['id'.ucfirst($data['usrType'])] = 'usrId';
		$this->fill['changeDelivery']['idOrder'] = 'ordId';
		$this->fill['changeDelivery']['statusDelivery'] = 'delStatus';

		unset($data['usrType']);

		$arrReturn = $this->run($data, 'changeDelivery', 'changeDelivery');

		if($arrReturn === false)
			return 'Error to get informations of '.$this->child;

		return $arrReturn;

	}

	public function make($data){

		$arrReturn = $this->run($data, 'make', 'register');

		if(!$arrReturn)
			return 'Error to make '.$this->child;

		return $arrReturn;
		
	}	

	public function historic($data){

		$common = 'historic';

		if(!isset($data['usrType']))
			return 'Failure of arguments';

		$this->fill[$common]['id'.ucfirst($data['usrType'])] = 'usrId';

		unset($this->fill[$common]['id']);

		unset($this->fill[$common]['user']);

		$arrReturn = $this->run($data, $common, $common);

		if(!$arrReturn)
			return 'Error to get historic of '.$this->child;

		return $arrReturn;
		
	}

	public function dashboard($data){

		$arrReturn = $this->run($data, 'laundry', 'dashboard');

		if(!$arrReturn)
			return 'Error to get dashboard of '.$this->child;

		return $arrReturn;

	}

	public function insertItem($data){

		$this->fill[$this->child]['items'] = 'ordItems';

		$arrReturn = $this->run($data, $this->child, 'insertItem');

		if(!$arrReturn)
			return 'Error to insert item of '.$this->child;

		return $arrReturn;
		
	}

	public function insertDetail($data){

		$arrReturn = $this->run($data, 'detail', 'insertDetail');

		if(!$arrReturn)
			return 'Error to insert detail of '.$this->child;

		return $arrReturn;
		
	}

	public function getDetail($data){

		$this->fill[$this->child]['id'.ucfirst($data['usrType'])] = 'usrId';

		unset($data['usrType']);
		
		$arrReturn = $this->run($data, $this->child, 'getDetail');

		if(!$arrReturn)
			return 'Error to get detail of '.$this->child;

		return $arrReturn;
		
	}	

	public function status($data){

		$this->fill[$this->child]['status'] = 'ordStatus';

		$this->fill[$this->child]['id'.ucfirst($data['usrType'])] = 'usrId';

		unset($data['usrType']);

		$arrReturn = $this->run($data, $this->child, 'changeStatus');

		if(!$arrReturn)
			return 'Error to set status of '.$this->child;

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