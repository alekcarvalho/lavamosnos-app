<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // teste
?>
<!-- Page Contents -->
<div id="app-pedido">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Realize seu pedido</h1>
<span class="sub-titulo">Preencha as informações do seu pedido</span>
<div class="ui doubling two column centered grid center-coluna">
  <div class="column">
<form class="ui form" method="post" action="<?php echo site_url('app/cadastro_cartao'); ?>">
  <div class="field pedido-pecas">
        <label>Por favor informe o número de peças que você quer lavar</label>
    <div class="input-stepper">
    <button data-input-stepper-decrease class="button-form button--addOnLeft">-</button>
    <input type="text" name="pedido-pecas" placeholder="Número de peças" value="0" class="input-pecas">
    <button data-input-stepper-increase class="button-form button--addOnRight">+</button>
  </div>
  </div>
  <div class="field pedido-endereco">
    <label>Seu pedido será retirado no seguinte endereço</label>
    <input type="text" name="pedido-endereco" value="Rua Brasil 246, Vila Marina - São Paulo - 07590-020" readonly="">
    <a onclick="modal_pedido_endereco()" class="btn-alterar-endereco">
    Alterar Endereço
  </a>
  </div>
  <div class="field">
    <label>Digite aqui caso tenha alguma observação sobre o seu pedido</label>
    <textarea placeholder="Ex: lavagem a seco, cuidados especiais, devolver roupas dobradas, não em cabides, etc"></textarea>
  </div>
  <div class="field-submit">
  <button id="submit" class="ui btn-padrao-verde" type="submit">Enviar Pedido</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="ui small modal modal-pedido-endereco">
  <div class="header">Alterar Endereço</div>
  <div class="content">
    <p>Digite no campo abaixo o seu novo endereço</p>
    <form class="ui form">
      <div class="field">
    <input type="text" name="pedido-endereco" placeholder="Digite aqui o novo endereço">
  </div>
  </div>
  <div class="actions">
    <div class="ui negative button">Cancelar</div>
    <button class="ui positive right labeled icon button" type="submit">
      Confirmar
<i class="checkmark icon"></i>
    </button>
  </form>
  </div>
</div>
