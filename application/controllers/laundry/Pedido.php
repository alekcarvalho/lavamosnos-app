<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function __construct(){

		parent::__construct();
      
      	$this->load->library(['session', 'lavamosnos']);

		$this->lavamosnos->authUser($this->session);

	}

	public function historico(){

		$data = array(
						'usrId' 	=> $this->session->user['ln-'.APPTYPE]['idLaundry'],
						'usrType' 	=> APPTYPE,
						'limit' 	=> 100,
						'offset' 	=> 'null'
					 );

		$orders = json_decode($this->lavamosnos->service('order','order','historic',$data),true);

		$data = array(
						'data' 		=> $orders['response']['data'],
						'page' 		=> 1,
						'tt_pages' 	=> 1
					 );

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-'.APPTYPE]['name']]);
		$this->load->view('historic',$data);
		$this->load->view('templates/footer');

	}

	public function detalhe($id){

		$data = array(
						'usrId' 	=> $this->session->user['ln-'.APPTYPE]['idLaundry'],
						'usrType' 	=> APPTYPE,
						'ordId' 	=> $id
					 );

		$order = json_decode($this->lavamosnos->service('order','order','getDetail',$data),true);

		if(empty($order['response']['data']))
			redirect('/');

		$this->load->view('templates/header',['laundry_name' => $this->session->user['ln-'.APPTYPE]['name']]);
		$this->load->view('detail',$order['response']['data']);
		$this->load->view('templates/footer');

	}

	public function changeStatus(){

		if(!$this->lavamosnos->validaPost()) 
			die;

		header('Content-Type: application/json');

		if( isset($_POST['items']) )
			$this->addItems($this->input->post('id'), $this->input->post('items'));

		$data = array(
						'usrId' 	=> $this->session->user['ln-'.APPTYPE]['idLaundry'],
						'usrType' 	=> APPTYPE,
						'ordId' 	=> $this->input->post('id')
					 );

		switch ($this->input->post('action')) {

			case 'revision':
					$data['ordStatus'] = 2;
				break;

			case 'save':
					$data['ordStatus'] = 4;
				break;

			case 'liberaded':
					$data['ordStatus'] = 4;
				break;

			case 'delivery':
					$data['ordStatus'] = 5;
				break;

		}

		$order = json_decode($this->lavamosnos->service('order','order','status',$data),true);

		echo json_encode(true);

	}

	private function addItems($id, $items){

		$data = array(
						'ordId' 	=> $id,
						'ordItems' 	=> $items
					 );

		$this->lavamosnos->service('order','order','insertItem',$data);

	}

}
