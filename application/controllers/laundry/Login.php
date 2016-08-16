<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();

      	$this->load->library(['session', 'lavamosnos']);

		$this->lavamosnos->authUserReverse($this->session);

	}

	public function index(){

		$this->load->view('login');

	}

	public function cadastro(){

		$this->load->view('register');
		
	}

	public function register(){

		if(!$this->lavamosnos->validaPost()) 
			die;
		
		header('Content-Type: application/json');

		$data = $this->input->post();

		$validate = json_decode($this->lavamosnos->service('user','laundry','register',$data),true);

		echo json_encode($validate['response']['register']);

	}

	public function cadastro_sucesso(){

		$this->load->view('register-success');
		
	}

	public function getTerms(){

		if(!$this->lavamosnos->validaPost()) 
			die;
		
		header('Content-Type: application/json');

		$type = $this->input->post('type');

		switch ($type) {

			case 'term-use':
				$title = "Termos de Uso";
				$file = "termos-uso.php";
				break;

			case 'policy-privacy':
				$title = "Política de privacidade";
				$file = "politica-privacidade.php";
				break;

		}

		$file = file(APPPATH.'views/general/'.$file);

		$countLine = 0;
		$content = [];

		foreach ($file as $line) {

			$countLine++;

			if(($countLine == 1) || ($countLine == 2) || ($countLine == count($file)))
				continue;

			$content[] = $line;

		}

		$arrReturn = array(
							'title' 	=> $title,
							'content' 	=> $content
						  );

		echo json_encode($arrReturn);

	}

	public function esqueci(){

		$this->load->view('remember');

	}

	public function esqueci_enviado(){

		$this->load->view('remember-success');

	}

	public function redefinicao_realizada(){

		$this->load->view('remember-success');

	}

	public function redefinir($code){

		$data = array(
						'id' 	=> substr($code, 8),
						'type' 	=> APPTYPE,
						'code' 	=> substr($code, 0, 8)
					 );

		$remember = json_decode($this->lavamosnos->service('user',APPTYPE,'checkRemember',$data),true);

		if($remember['response']['check'] !== false){

			$this->load->view('remember-redefine',$data);

		}else{

			$this->load->view('remember-non');

		}

	}

	public function enviaRedefinicao(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		$data = $this->input->post();

		$data['type'] = APPTYPE;

		$data['redClave'] = base64_encode($data['redClave']);

		$validate = json_decode($this->lavamosnos->service('user',APPTYPE,'redefine',$data),true);

		echo json_encode($validate['response']['redefine']);

	}

	public function remember(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		$data = $this->input->post();

		$validate = json_decode($this->lavamosnos->service('user',APPTYPE,'remember',$data),true);

		echo json_encode($validate['response']['remember']);

	}

	public function validar(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		$data = $this->input->post();

		$data['lgClave'] = base64_encode($data['lgClave']);

		$data['autoconnect'] = 'null';

		if(isset($data['lgConnect']))
			$data['autoconnect'] = base64_encode($this->lavamosnos->geraSenha(12).'||'.$data['lgEmail']);

		$validate = json_decode($this->lavamosnos->service('user','laundry','login',$data),true);

		if($validate['response']['authentication'] !== false){

			unset($this->session->user);

			$validate['response']['data']['ln-login'] = true;

			$this->session->user = ['ln-'.APPTYPE => $validate['response']['data']];

			$this->input->set_cookie('ln-'.APPTYPE.'-connect');

			if(isset($data['lgConnect']))
				$this->input->set_cookie('ln-'.APPTYPE.'-connect', $data['autoconnect'], time() + ((86400 * 30) * 3));

		}

		echo json_encode($validate);
		
	}

}
