<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Contents -->
<div id="app-meus-cartoes">
<div class="ui container">
<div class="text-centered">
<h1 class="titulo-h1">Meus Cartões</h1>
<span class="sub-titulo">Edite ou adicione seus cartões para realizar pagamentos</span>
</div>

<div class="ui equal width grid center-coluna">
  <div class="three column row">

  <div class="sixteen wide tablet five wide computer column">
    <a href="<?php echo site_url('app/meus_cartoes_edit'); ?>">
  	<div class="ui segment cartao">
  		<p>XXXX-XXXX-XXXX-1212</p>
      <i class="mastercard icon"></i>
  	</div>
  	</a>
</div>
<div class="sixteen wide tablet five wide computer column">
  <a href="<?php echo site_url('app/meus_cartoes_edit'); ?>">
  <div class="ui segment cartao">
    <p>XXXX-XXXX-XXXX-3470</p>
    <i class="visa icon"></i>
  </div>
  </a>
</div>
<div class="sixteen wide tablet five wide computer column">
  <a href="<?php echo site_url('app/meus_cartoes_add'); ?>">
  <div class="ui segment add-cartao">
    <i class="plus icon"></i>
    <p>Adicionar cartão de crédito</p>
  </div>
  </a>
</div>

</div>
</div>


</div>
</div>
