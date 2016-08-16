<div class="ui raised very padded text container segment">
	<div id="dashboard">

		<div class="ui four item menu">
		  <a class="item active" data-tab="open">
		    <i class="asterisk icon"></i>
		    Abertos
		  </a>
		  <a class="item" data-tab="revision">
		    <i class="warning sign icon"></i>
		    Nova Revisão
		  </a>
		  <a class="item" data-tab="approved">
		    <i class="checkmark icon"></i>
		    Aprovado
		  </a>
		  <a class="item" data-tab="delivery">
		    <i class="shipping icon"></i>
		    Retirada
		  </a>
		</div>

        <div class="ui tab segment active" data-tab="open">
	        <table class="ui compact celled definition table">
			  <thead class="full-width">
			    <tr>
			      <th class="center aligned">ID</th>
			      <th>Cliente</th>
			      <th class="center aligned">Qtde</th>
			      <th class="center aligned">Checagem</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 

			  		if(count($open) > 0){ 
			  			foreach ($open as $oo) { ?>

					  	<tr>
					      <td class="center aligned"><?=$oo['idOrder']?></td>
					      <td><?=$oo['name']?></td>
					      <td class="center aligned"><?=$oo['qty']?></td>
					      <td class="center aligned">
					      	<a href="<?=site_url('pedido/detalhe/'.$oo['idOrder'])?>">
					      		<i class="search icon"></i>
					      	</a>
					      </td>
					    </tr>

			  	<?php } }else{ ?>

				  		<tr>
					      <td colspan="4">Nenhum pedido em aberto</td>
					    </tr>

			  	<?php } ?>
			    
			  </tbody>
			</table>
        </div>
        <div class="ui tab segment" data-tab="revision">
	        <table class="ui compact celled definition table">
			  <thead class="full-width">
			    <tr>
			      <th class="center aligned">ID</th>
			      <th>Cliente</th>
			      <th class="center aligned">Qtde</th>
			      <th class="center aligned">Revisar</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 

			  		if(count($revision) > 0){ 
			  			foreach ($revision as $or) { ?>

					  	<tr>
					      <td class="center aligned"><?=$or['idOrder']?></td>
					      <td><?=$or['name']?></td>
					      <td class="center aligned"><?=$or['qty']?></td>
					      <td class="center aligned">
					      	<a href="<?=site_url('pedido/detalhe/'.$or['idOrder'])?>">
					      		<i class="search icon"></i>
					      	</a>
					      </td>
					    </tr>

			  	<?php } }else{ ?>

				  		<tr>
					      <td colspan="4">Nenhum pedido exige uma nova revisão</td>
					    </tr>

			  	<?php } ?>
			    
			  </tbody>
			</table>
        </div>
        <div class="ui tab segment" data-tab="approved">
	        <table class="ui compact celled definition table">
			  <thead class="full-width">
			    <tr>
			      <th class="center aligned">ID</th>
			      <th>Cliente</th>
			      <th class="center aligned">Qtde</th>
			      <th class="center aligned">Visualizar</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 

			  		if(count($approved) > 0){ 
			  			foreach ($approved as $oa) { ?>

					  	<tr>
					      <td class="center aligned"><?=$oa['idOrder']?></td>
					      <td><?=$oa['name']?></td>
					      <td class="center aligned"><?=$oa['qty']?></td>
					      <td class="center aligned">
					      	<a href="<?=site_url('pedido/detalhe/'.$oa['idOrder'])?>">
					      		<i class="search icon"></i>
					      	</a>
					      </td>
					    </tr>

			  	<?php } }else{ ?>

				  		<tr>
					      <td colspan="4">Nenhum pedido liberado para lavagem</td>
					    </tr>

			  	<?php } ?>
			    
			  </tbody>
			</table>
        </div>
        <div class="ui tab segment" data-tab="delivery">
	        <table class="ui compact celled definition table">
			  <thead class="full-width">
			    <tr>
			      <th class="center aligned">ID</th>
			      <th>Cliente</th>
			      <th class="center aligned">Qtde</th>
			      <th class="center aligned">Visualizar</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 

			  		if(count($delivery) > 0){ 
			  			foreach ($delivery as $od) { ?>

					  	<tr>
					      <td class="center aligned"><?=$od['idOrder']?></td>
					      <td><?=$od['name']?></td>
					      <td class="center aligned"><?=$od['qty']?></td>
					      <td class="center aligned">
					      	<a href="<?=site_url('pedido/detalhe/'.$od['idOrder'])?>">
					      		<i class="search icon"></i>
					      	</a>
					      </td>
					    </tr>

			  	<?php } }else{ ?>

				  		<tr>
					      <td colspan="4">Nenhum pedido pronto para entrega</td>
					    </tr>

			  	<?php } ?>
			    
			  </tbody>
			</table>
        </div>
     </div>
</div>
