<div class="ui raised very padded text container segment">
  <h2 class="ui header">Inbox</h2>

  	<?php if(count($response)) { ?>

	  	<?php foreach ($response as $k) { ?>

		 	<div class="ui tall stacked segment">
			  <h4 class="ui header">Recebida em: <?=dateTimetoDate($k['dtRegister'])?></h4>
			  <div class="ui divider"></div>
			  <p>
			  	<?=$k['message']?>
			  </p>
			  <a class="ui button" href="<?=site_url('pedido/detalhe/'.$k['idOrder'])?>">
				  Ir para o Pedido
				</a>
			</div>

		<?php } ?>

	<?php }else{ ?>

		<div class="ui tall stacked segment">
		  <p>
		  	Você ainda não possue nenhuma notificação.
		  </p>
		</div>

	<?php } ?>

</div>