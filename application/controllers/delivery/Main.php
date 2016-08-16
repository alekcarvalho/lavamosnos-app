<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

		parent::__construct();
      
      	$this->load->library(['session', 'lavamosnos']);

		$this->lavamosnos->authUser($this->session);

	}

	public function index(){

		$data = array(
						'usrId' 	=> $this->session->user['ln-delivery']['idDelivery'],
						'usrType' 	=> APPTYPE
					 );

		$orders = json_decode($this->lavamosnos->service('order','order','deliveryPending',$data),true);

		$this->load->view('templates/header',['delivery_name' => $this->session->user['ln-delivery']['name']]);
		$this->load->view('dashboard', ['orders' => $orders['response']]);
		$this->load->view('templates/footer');

	}

	public function changeStatus(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		$data = array(
						'usrId' 	=> $this->session->user['ln-delivery']['idDelivery'],
						'usrType' 	=> APPTYPE,
						'ordId' 	=> $this->input->post('id'),
						'delStatus' => ((int)$this->input->post('sts') + 1)
					 );

		$status = json_decode($this->lavamosnos->service('order','order','changeDelivery',$data),true);

		echo json_encode($status['response']['change']);

	}

	public function logout(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		$this->input->set_cookie('ln-'.APPTYPE.'-connect');

		$this->session->sess_destroy();

	}
}
