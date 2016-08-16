<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Contents -->
<div id="app-meus-cartoes-add">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Cadastre seu cartão</h1>
<span class="sub-titulo">Edite suas informações do cartão de crédito</span>
<div class="ui doubling two column centered grid center-coluna">
  <div class="column">
<form class="ui form" method="post" action="<?php echo site_url('app/meus_cartoes'); ?>">
  <div class="field">
      <label>CPF do Titular</label>
      <input type="text" name="card[cpf]" placeholder="Insira o cpf do titular do cartão" data-mask="000.000.000-00" value="222.555.677-42" readonly>
</div>
    <div class="field">
        <label>Nome do Titular do Cartão</label>
        <input id="inputTextBox" type="text" name="card[nome]" placeholder="Insira o nome do titular do cartão" value="Francisco Santos da Silva" readonly>
</div>
    <div class="field">
        <label>Número do Cartão</label>
        <input type="text" name="card[numero]" placeholder="Preencha com o número do cartão" value="XXXX XXXX XXXX 1212" readonly>
</div>
      <div class="field">
        <label>Validade</label>
        <div class="three fields">
          <div class="three wide field cadastro-cartao-mes">
            <select class="ui fluid search dropdown" name="card[expire-month]">
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
          <div class="five wide field cadastro-cartao-ano">
            <input type="text" name="card[expire-year]" placeholder="aa" data-mask="00" value="17">
          </div>
          <div class="eight wide field cadastro-cartao-cvc">
<label>Código de Segurança</label>
            <input type="text" name="card[cvc]" placeholder="123" data-mask="000" value="123">
          </div>
        </div>
      </div>
  <div class="field-submit">
  <button id="submit" class="ui btn-padrao-verde" type="submit">Atualizar Cartão</button>
    </div>
    <div class="field remover-cartao">
    <a href="">Remover Cartão</a>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
