<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LavamosNós</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url();?>favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/semantic.min.css">
    <link rel="stylesheet" href="<?php echo asset_url();?>css/app.css">
  </head>
  <body>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<header>
  <div class="ui container">
         <a class="toc item">
           <i class="sidebar icon"></i>
         </a>
    <!-- Sidebar Menu -->
<div class="ui left demo vertical inverted sidebar labeled icon menu">
  <a href="<?php echo site_url('app/'); ?>" class="item">
    <i class="home icon"></i>
    Home
  </a>
  <a href="<?php echo site_url('app/minha_conta'); ?>" class="item">
    <i class="user icon"></i>
    Minha conta
  </a>
  <a href="<?php echo site_url('app/meus_pedidos'); ?>" class="item">
    <i class="asterisk icon"></i>
    Meus Pedidos
  </a>
  <a href="<?php echo site_url('app/meus_cartoes'); ?>" class="item">
    <i class="payment icon"></i>
    Meus Cartões
  </a>
  <a href="<?php echo site_url('app/tabela_precos'); ?>" class="item">
    <i class="dollar icon"></i>
    Tabela de Preços
  </a>
  <a href="<?php echo site_url('app/perguntas_frequentes'); ?>" class="item">
    <i class="help icon"></i>
    Perguntas Frequentes
  </a>
  <a class="item">
    <i class="sign out icon"></i>
    Sair
  </a>
</div>
    <div class="logo">
      <a href="<?php echo site_url('app'); ?>">
<img src="<?php echo asset_url();?>images/logo.png" alt="">
</a>
</div>
<div class="usuario-dropdown">
  <img src="<?php echo asset_url();?>images/avatar.jpg" alt="">
<a href="#" class="ui dropdown item">
       Francisco
       <i class="dropdown icon"></i>
       <div class="menu">
         <div class="header">Selecione</div>
         <div class="item" onclick="window.location = '<?php echo site_url('app/minha_conta'); ?>';">Minha Conta</div>
         <div class="item">Sair</div>
       </div>
     </a>
     </div>
</div>

</header>
<content id="conteudo">
