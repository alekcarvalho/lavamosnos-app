<div class="ui raised very padded text container segment">
	<div id="dashboard">
        <div class="ui segment">

        	<h2 class="ui header">Histórico de Pedidos</h2>

	        <table class="ui compact celled definition table">
			  <thead class="full-width">
			    <tr>
			      <th class="center aligned">ID</th>
			      <th>Cliente</th>
			      <th class="center aligned">Qtde</th>
			      <th class="center aligned">Status</th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php 

			  		if(count($data) > 0){ 
			  			foreach ($data as $o) { ?>

					  	<tr>
					      <td class="center aligned"><?=$o['idOrder']?></td>
					      <td><?=$o['name']?></td>
					      <td class="center aligned"><?=$o['qty']?></td>
					      <td class="center aligned"><?=status_order($o['status'])?></td>
					      <td class="center aligned">
					      	<a href="<?=site_url('pedido/detalhe/'.$o['idOrder'])?>">
					      		<i class="search icon"></i>
					      	</a>
					      </td>
					    </tr>

			  	<?php } }else{ ?>

				  		<tr>
					      <td colspan="5">A sua lavanderia ainda não possue pedidos</td>
					    </tr>

			  	<?php } ?>
			    
			  </tbody>

			</table>
        </div>
     </div>
</div>
