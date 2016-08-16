<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Contents -->
<div id="app-home">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Bem vindo! Faça o seu pedido</h1>
<span class="sub-titulo">Comece a fazer o seu pedido clicando no botão logo abaixo</span>
</div>
</div>
<div class="bg-fazer-pedido text-centered">
	<div class="ui container">
<a class="home-fazer-pedido-btn" href="<?php echo site_url('app/fazer_pedido'); ?>">
<button class="btn-padrao-verde-big">FAZER PEDIDO</button>
</a>
</div>
</div>
<div class="ui container">
	<div class="text-centered">
<div class="links-rapidos">
<h2 class="titulo-h2">Links Rápidos</h2>

<div class="links-rapidos-content">
<div class="ui two column centered grid">
<div class="column"></div>
<div class="four column centered row">
	<div class="column"></div>
	<div class="column"></div>
</div>
</div>

<div class="ui two column centered grid">
<div class="four column centered row">
<div class="column">
	<a href="<?php echo site_url('app/minha_conta'); ?>">
	<div class="ui segment">
		<i class="user icon"></i>
		<p>Minha Conta</p>
	</div>
	</a>
</div>
<div class="column">
	<a href="<?php echo site_url('app/meus_pedidos'); ?>">
	<div class="ui segment">
		<i class="asterisk icon"></i>
		<p>Meus Pedidos</p>
	</div>
		</a>
</div>
<div class="column">
	<a href="<?php echo site_url('app/meus_cartoes'); ?>">
	<div class="ui segment">
		<i class="payment icon"></i>
		<p>Meus Cartões</p>
	</div>
		</a>
</div>
<div class="column">
	<a href="<?php echo site_url('app/tabela_precos'); ?>">
	<div class="ui segment">
	<i class="dollar icon"></i>
		<p>Tabela de Preços</p>
	</div>
		</a>
</div>
<div class="column">
	<a href="<?php echo site_url('app/perguntas_frequentes'); ?>">
	<div class="ui segment">
	<i class="help icon"></i>
		<p>Perguntas Frequentes</p>
	</div>
		</a>
</div>
<div class="column">
	<a href="">
	<div class="ui segment">
		<i class="sign out icon"></i>
		<p>Sair</p>
	</div>
		</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
