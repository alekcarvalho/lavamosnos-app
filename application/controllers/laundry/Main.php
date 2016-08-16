<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

		parent::__construct();
      
      	$this->load->library(['session', 'lavamosnos']);

		$this->lavamosnos->authUser($this->session);

	}

	public function index(){

		$data['lauId'] = $this->session->user['ln-'.APPTYPE]['idLaundry'];

		$orders = json_decode($this->lavamosnos->service('order','order','dashboard',$data),true);

		$data = array(
						'open' 		=> [],
						'revision' 	=> [],
						'approved' 	=> [],
						'delivery' 	=> []
					 );

		if(count($orders['response']['data']) > 0){

			foreach ($orders['response']['data'] as $o) {

				if($o['status'] == 1)
					$data['open'][] = $o;

				if($o['status'] == 3)
					$data['revision'][] = $o;

				if($o['status'] == 4)
					$data['approved'][] = $o;

				if($o['status'] == 5)
					$data['delivery'][] = $o;

			}

		}

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-'.APPTYPE]['name']]);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');

	}

	public function configuracoes(){

		$data['usrId'] = $this->session->user['ln-'.APPTYPE]['idLaundry'];
		$data['usrType'] = APPTYPE;

		$data = json_decode($this->lavamosnos->service('user',APPTYPE,'getInfo',$data),true);

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-'.APPTYPE]['name']]);
		$this->load->view('configuration',$data['response']);
		$this->load->view('templates/footer');

	}

	public function editConfig(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		$dataTemp = $this->input->post('data');

		$data = [];

		foreach ($dataTemp as $d)
			$data[$d['name']] = (empty($d['value']) ? 'null' : $d['value']);

		switch ($this->input->post('type')) {

			case 'info':
				$data['regId'] = $this->session->user['ln-'.APPTYPE]['idLaundry'];
				$action = 'edit';
				break;

			case 'address':
				$data['locId'] = $this->session->user['ln-'.APPTYPE]['idLaundry'];
				$action = 'address';
				break;

			case 'secure':
				$data['usrId'] = $this->session->user['ln-'.APPTYPE]['idLaundry'];
				$data['usrNewClave'] = base64_encode($data['secNewPass']);
				$data['usrEmailSecundary'] = $data['regEmailSecundary'];

				unset($data['secNewPass']);
				unset($data['secNewPassConfirm']);
				unset($data['regEmailSecundary']);

				$action = 'secureEdit';
				break;

		}

		$result = json_decode($this->lavamosnos->service('user',APPTYPE,$action,$data),true);

		echo json_encode($result);

	}

	public function inbox(){

		$data = array(
						'id' 	=> $this->session->user['ln-'.APPTYPE]['idLaundry'],
						'type' 	=> APPTYPE
					 );

		$notifications = json_decode($this->lavamosnos->service('notification','system','getInbox',$data),true);

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-'.APPTYPE]['name']]);
		$this->load->view('notification', $notifications);
		$this->load->view('templates/footer');

	}

	public function saveImage(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		$fieldName = 'fileLaundry';

		if(isset($_FILES[$fieldName])){

			$img = $_FILES[$fieldName]['tmp_name'];

	        $data = file_get_contents($img);

	        $mime = strtolower($_FILES[$fieldName]['type']); 

	        $ext = explode('.', $_FILES[$fieldName]['name']);

	        $name = $this->session->user['ln-'.APPTYPE]['idLaundry'] . '-' . date('YmdHs') . '.' . end($ext);

			$base64 = 'data:' . $mime . ';base64,' . base64_encode($data);

			$this->lavamosnos->salveFileS3($base64,APPTYPE, $name);

			$this->registerImage($name);

			echo json_encode(urlS3(APPTYPE,$name));

		}else{

			echo json_encode(false);

		}

	}

	private function registerImage($image = null){

		if(!$this->lavamosnos->validaPost() && is_null($image)) 
			die;

		header('Content-Type: application/json');

		$data = array(
						'usrId' 	=> $this->session->user['ln-'.APPTYPE]['idLaundry'],
						'usrImage' 	=> (is_null($image) ? 'null' : $image)
					 );

		$register = json_decode($this->lavamosnos->service('user',APPTYPE,'registerImage',$data),true);

		if(is_null($image))
			echo json_encode($register);

	}

	public function logout(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		$this->session->sess_destroy();

	}

}
