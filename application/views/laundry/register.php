<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lavamos Nós - Cadastro</title>

	    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	    <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url();?>favicon.ico">

	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/semantic.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/laundry.css">

	</head>
	<body class="bd-login">
		<div class="content-login">
			<div class="ui middle aligned center aligned grid">
				<div class="column">
			    	<h2 class="ui teal image header">
			    		<img src="<?php echo asset_url();?>images/logo.png" class="image">
			    	</h2>
				    <form class="ui large form" id="form-register">
				    	<div class="ui stacked segment">
				        	<div class="field">
				          		<div class="ui left icon input">
				            		<i class="building icon"></i>
				            		<input type="text" name="regName" id="regName" placeholder="Nome da Lavanderia">
				          		</div>
				        	</div>
				        	<div class="field">
				          		<div class="ui left icon input">
				            		<i class="browser icon"></i>
				            		<input type="text" name="regCnpj" id="regCnpj" placeholder="CNPJ">
				          		</div>
				        	</div>
				        	<div class="field">
				          		<div class="ui left icon input">
				            		<i class="mail icon"></i>
				            		<input type="text" name="regEmail" id="regEmail" placeholder="lavanderia@email.com.br">
				          		</div>
				        	</div>
				        	<div class="field">
				          		<div class="ui left icon input">
				            		<i class="phone icon"></i>
				            		<input type="text" name="regPhone" id="regPhone" placeholder="Telefone">
				          		</div>
				        	</div>
				        	<div class="field">
					      <div class="ui toggle checkbox terms-ok">
					        <input type="checkbox" id="terms-ok" tabindex="0" class="hidden">
					        
					      </div>
					      <label class="label-termos">Concordo com os <span opt-type="term-use">Termos de Uso</span> e a <span opt-type="policy-privacy">Política de Privacidade</span></label>
					    </div>
				        	<div class="ui fluid large teal submit button" id="bt-register">Cadastrar</div>
				     	</div>
				    	<div class="ui error message">
				    		<div class="header">
						    	Verifique os campos:
							</div>
							<ul class="list">
							</ul>
				    	</div>
				    </form>

				    <div class="ui message">
				      Já tenho cadastro! <a href="<?php echo site_url('login'); ?>">Fazer login!</a>
				    </div>
				</div>
			</div>
		</div>

	<div class="ui dimmer active loader-page" style="display:none;">
	    <div class="ui loader"></div>
	</div>

	<div class="ui modal long terms">
	  <i class="close icon"></i>
	  <div class="header">
	    
	  </div>
	  <div class="content">
	  </div>
	  <div class="actions">
	    <div class="ui black deny button">
	      Fechar
	    </div>
	  </div>
	</div>

	<script src="<?php echo asset_url();?>js/vendor.js"></script>
	<script src="<?php echo asset_url();?>js/jquery.mask.js"></script>
	
	<script src="<?php echo asset_url();?>js/general.js"></script>
	<script src="<?php echo asset_url();?>js/laundry-login.js"></script>

	<script src="<?php echo asset_url();?>js/semantic.min.js"></script>

	</body>
</html>