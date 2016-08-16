<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lavamos Nós - Esqueci a senha</title>

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
			    	<div class="ui message">
			    		<div class="header">
					    	Redefinição inválida
						</div>
						<p>Não encontramos nenhuma redefinição a ser feita para você, em caso de dúvida entre em contato.</p>
			    	</div>
				    <div class="ui message">
				      Veja mais informações na nossa página <a href="https://lavamosnos.co">lavamosnos.co</a>
				    </div>
				</div>
			</div>
		</div>

	<script src="<?php echo asset_url();?>js/vendor.js"></script>
	
	<script src="<?php echo asset_url();?>js/general.js"></script>
	<script src="<?php echo asset_url();?>js/laundry-login.js"></script>

	<script src="<?php echo asset_url();?>js/semantic.min.js"></script>

	</body>
</html>