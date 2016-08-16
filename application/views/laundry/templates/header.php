<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lavamos Nós</title>

	    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	    <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url();?>favicon.ico">

	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/semantic.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/laundry.css">

	</head>
	<body>

		<div class="ui fixed inverted menu">
		    <div class="ui container">
		      <a class="item" href="<?=site_url()?>"><i class="home icon"></i></a>
		      <a class="item" href="<?=site_url('pedido/historico')?>"><i class="history icon"></i></a>
		      <a class="item" href="<?=site_url('main/inbox')?>"><i class="inbox icon"></i></a>
		      <a class="ui simple right item header" href="<?=site_url()?>">
		        <img src="<?php echo asset_url();?>images/logo.png" class="logo">
		      </a>
		      <div class="ui simple right dropdown item">
		        <?=$laundry_name?> <i class="dropdown icon"></i>
		        <div class="menu">
		          <a href="<?=site_url('main/configuracoes')?>" class="item">Configurações</a>
		          <div id="bt-logout" class="item">Sair</div>
		        </div>
		      </div>
		    </div>
		 </div>

	<div class="ui main text container">