<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Contents -->
<div id="app-minha-conta">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Minha Conta</h1>
<span class="sub-titulo">Edite ou atualize suas informações aqui</span>
</div>

<div class="ui doubling two column centered grid center-coluna">
  <div class="column">

    <div class="ui top attached tabular menu menu-tabs">
      <a class="item active" data-tab="first"><span>Meu Perfil</span></a>
      <a class="item" data-tab="second"><span>Endereço</span></a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="first">
      <form class="ui form" method="post" action="<?php echo site_url('app/minha_conta'); ?>">
          <div class="field box-form-upload">
      <label>Faça o upload de sua foto no botão abaixo</label>
              <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
              <label class="upload" for="file-1">  <i class="upload icon"></i> <span>Escolher arquivo&hellip;</span></label>
              </div>
      <div class="field">
        <label>Nome Completo</label>
          <input type="text" name="nome-completo" placeholder="Nome Completo" value="Francisco Santos da Silva">
      </div>
      <div class="field">
        <label>Email</label>
          <input type="email" name="email" placeholder="Email" value="francisco@gmail.com">
      </div>
      <div class="field">
        <label>Senha</label>
          <input type="password" name="senha" placeholder="Senha" value="******">
      </div>
      <div class="field">
        <label>Repetir Senha</label>
          <input type="password" name="senha" placeholder="Repetir Senha" value="******">
      </div>
          <div class="field">
            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="Telefone" value="11 4422-7754">
          </div>
      <div class="field-submit">
      <button id="submit" class="ui btn-padrao-verde" type="submit">Atualizar</button>
        </div>
      </form>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        <form class="ui form" method="post" action="<?php echo site_url('app/minha_conta'); ?>">
      <div class="two fields">
          <div class="field">
            <label>CEP</label>
            <input type="text" name="cep" placeholder="CEP" value="08050-070">
          </div>
          <div class="field">
            <label>Local</label>
            <select class="ui fluid search dropdown" name="local">
              <option value="casa">Casa</option>
              <option value="apartamento">Apartamento</option>
              <option value="escritorio">Escritório</option>
            </select>
          </div>
        </div>
<div class="field">
<label>Endereço</label>
<input type="text" name="endereco" placeholder="Endereço" value="Rua Brasil">
</div>
  <div class="two fields">
      <div class="field">
        <label>Número</label>
        <input type="text" name="numero" placeholder="Número" value="246">
      </div>
      <div class="field">
        <label>Complemento</label>
        <input type="text" name="complemento" placeholder="Complemento" value="">
      </div>
    </div>
    <div class="field">
      <label>Observações</label>
      <input type="text" name="observacoes" placeholder="Observações" value="">
    </div>
    <div class="field-submit">
    <button id="submit" class="ui btn-padrao-verde" type="submit">Atualizar</button>
      </div>
    </form>
    </div>

</div>
</div>


</div>
</div>
