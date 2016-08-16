<?php

class zipcodeModule extends CI_Controller{

	private $child;

	private $viacep = "://viacep.com.br/ws/_ZIPCODE_/json/";

	private $fill = array();
	
	function __construct($child){

		parent::__construct();

		$this->child = $child;

		$this->viacep = (isset($_SERVER['HTTPS']) ? 'https' : 'http').$this->viacep;

		$this->load->library('lavamosnos');

		$this->fill = array(
				        	'zipcode'		=> 'cep',
				        	'address'		=> 'logradouro',
				        	'complement'	=> 'complemento',
				        	'neighborhood'	=> 'bairro',
				        	'city'			=> 'localidade',
				        	'estate'		=> 'uf'
				        );

	}

	public function getInfo($data){

		if(!isset($data['zipcode']) || empty($data['zipcode']))
			return 'Failure of arguments';

		$url = str_replace('_ZIPCODE_', $data['zipcode'], $this->viacep);

		$arrReturn['data'] = $this->lavamosnos->curl($url, 'array');

		if($this->child == 'client'){

			$areaOn = $this->checkDelivery($arrReturn['data']);

			if($areaOn === false){

				$this->load->model('Laundry');

				$arrTemp = [];

				foreach ($this->fill as $key => $value)
					$arrTemp[$key] = @$arrReturn['data'][$value];

				$this->Laundry->arrData($arrTemp);

				$this->Laundry->failDelivery();

			}

			$arrReturn['delivery'] = $areaOn;

		}

		return $arrReturn;
		
	}	

	private function checkDelivery($data){

		$address = urlencode($data['logradouro'] . ',' . $data['bairro'] . ',' . $data['localidade'] . ',' . $data['uf']);

		$latlon = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyDADiZRFjHx2LNEAiGy0d1cvcXPK6w0q6w', 'array');

		$polygon = json_decode(file_get_contents('./service/core/data/area.json'),true);

		$latlon = json_decode($latlon,true)['results'][0]['geometry']['location'];

		$point = [$latlon['lat'],$latlon['lng']];

		$laundry = false;

		for ($c = 0; $c < count($polygon); $c++){

			$areaOn = $this->lavamosnos->pointPolygon($polygon[$c]['loc'],$point);

			if($areaOn !== false){
				$areaOn = $polygon[$c]['laundry'];
				break;
			}

		}

		return $areaOn;

	}

}