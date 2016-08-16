<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller {

	public function __construct(){

		parent::__construct();
      
      	$this->load->library(['session', 'lavamosnos']);

		$this->lavamosnos->authUser($this->session);

	}

	public function lavamosnos(){

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-laundry']['name']]);
		$this->load->view('../general/lavamosnos');
		$this->load->view('templates/footer');

	}

	public function solucoes(){

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-laundry']['name']]);
		$this->load->view('../general/solucoes');
		$this->load->view('templates/footer');

	}

	public function termos_uso(){

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-laundry']['name']]);
		$this->load->view('../general/termos-uso');
		$this->load->view('templates/footer');

	}

	public function politica_privacidade(){

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-laundry']['name']]);
		$this->load->view('../general/politica-privacidade');
		$this->load->view('templates/footer');

	}

	public function ajuda(){

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-laundry']['name']]);
		$this->load->view('../general/ajuda');
		$this->load->view('templates/footer');

	}

}
