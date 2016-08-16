<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Contents -->
<div id="app-cadastro-cartao">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Cadastre seu cartão</h1>
<span class="sub-titulo">Fique Tranquilo! O pagamento será debitado somente após a lavagem</span>
<div class="ui doubling two column centered grid center-coluna">
  <div class="column">
<form class="ui form" method="post" action="<?php echo site_url('app/confirmacao_pedido'); ?>">
  <div class="field">
      <label>CPF do Titular</label>
      <input type="text" name="card[cpf]" placeholder="Insira o cpf do titular do cartão" data-mask="000.000.000-00">
</div>
    <div class="field">
        <label>Nome do Titular do Cartão</label>
        <input id="inputTextBox" type="text" name="card[nome]" placeholder="Insira o nome do titular do cartão">
</div>
    <div class="field">
        <label>Número do Cartão</label>
        <input type="text" name="card[numero]" placeholder="Preencha com o número do cartão" data-mask="0000 0000 0000 0000" >
</div>
      <div class="field">
        <label>Validade</label>
        <div class="three fields">
          <div class="three wide field cadastro-cartao-mes">
            <select class="ui fluid search dropdown" name="card[expire-month]">
              <option value="">mm</option>
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
            <input type="text" name="card[expire-year]" placeholder="aa" data-mask="00">
          </div>
          <div class="eight wide field cadastro-cartao-cvc">
<label>Código de Segurança</label>
            <input type="text" name="card[cvc]" placeholder="123" data-mask="000">
          </div>
        </div>
      </div>
        <div class="field nao-entendi">
          <p><a class="popup" onclick="modal_nao_entendi()"><span><i class="help icon"></i></span>Não Entendi!</a></p>
        </div>
  <div class="field-submit">
  <button id="submit" class="ui btn-padrao-verde" type="submit">Finalizar Pedido</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>

<div class="ui small modal modal-nao-entendi">
  <div class="content">
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur volutpat, elit at condimentum efficitur, sem neque porta magna, et venenatis quam mi id odio. Donec enim lectus, posuere gravida felis et.
    </p>
  </div>
  <div class="actions">
    <button class="ui positive right labeled icon button">
      Entendi
<i class="checkmark icon"></i>
    </button>
  </form>
  </div>
</div>
