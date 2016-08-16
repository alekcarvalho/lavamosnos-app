<?php


class system extends CI_Controller{

	private $child = 'notification';

	private $fill = [];

	private $data;

	function __construct($data){

		parent::__construct();

		$this->data = $data;

		$this->fill[$this->child] = array(
							        	'idUser'	=> 'id',
							        	'userType'	=> 'type',
							        	'message'	=> 'msg'
							        );

	}

	public function send(){

		$arrReturn = $this->run($this->data, $this->child, 'register');

		if(!$arrReturn)
			return 'Error log notification '.$this->child;

		return $arrReturn;
		
	}

	public function getInbox(){

		unset($this->fill[$this->child]['message']);

		$arrReturn = $this->run($this->data, $this->child, 'getInbox');

		if($arrReturn === false) 
			return 'Error log notification '.$this->child;

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