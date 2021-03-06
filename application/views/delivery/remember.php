<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lavamos Nós - Login</title>

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
				    <form class="ui large form" id="form-remember">
				    	<div class="ui stacked segment">
				    		<h2>Delivery</h2>
				    		<h4>Insira o e-mail para redefinição de senha</h4>
				        	<div class="field">
				          		<div class="ui left icon input">
				            		<i class="user icon"></i>
				            		<input type="text" name="remEmail" id="remEmail" placeholder="delivery@lavanderia.com.br">
				          		</div>
				        	</div>
				        <div class="ui fluid large teal submit button" id="bt-remember">Validar</div>
				    	<div class="ui error message">
				    		<div class="header">
						    	Verifique os campos:
							</div>
							<ul class="list">
							</ul>
				    	</div>
				    </form>
				</div>
			</div>
		</div>

	<div class="ui dimmer active loader-page" style="display:none;">
	    <div class="ui loader"></div>
	</div>

	<script src="<?php echo asset_url();?>js/vendor.js"></script>
	
	<script src="<?php echo asset_url();?>js/general.js"></script>
	<script src="<?php echo asset_url();?>js/delivery-login.js"></script>

	<script src="<?php echo asset_url();?>js/semantic.min.js"></script>

	</body>
</html>