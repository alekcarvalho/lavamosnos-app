<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/index');
		$this->load->view('app/templates/footer');
	}

	public function fazer_pedido()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/fazer-pedido');
		$this->load->view('app/templates/footer');
	}

	public function cadastro_cartao()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/cadastro-cartao');
		$this->load->view('app/templates/footer');
	}

	public function confirmacao_pedido()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/confirmacao-pedido');
		$this->load->view('app/templates/footer');
	}

	public function meus_pedidos()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/meus-pedidos');
		$this->load->view('app/templates/footer');
	}

	public function tabela_precos()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/tabela-precos');
		$this->load->view('app/templates/footer');
	}

	public function perguntas_frequentes()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/perguntas-frequentes');
		$this->load->view('app/templates/footer');
	}

	public function minha_conta()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/minha-conta');
		$this->load->view('app/templates/footer');
	}

	public function meus_cartoes()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/meus-cartoes');
		$this->load->view('app/templates/footer');
	}

	public function meus_cartoes_edit()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/meus-cartoes-edit');
		$this->load->view('app/templates/footer');
	}

	public function meus_cartoes_add()
	{
		$this->load->view('app/templates/header');
		$this->load->view('app/meus-cartoes-add');
		$this->load->view('app/templates/footer');
	}

}
