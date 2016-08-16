<div class="ui raised very padded text container segment">
	<div id="dashboard">

        <h2 class="ui header">Pedido #<?=$idOrder?> (<?=status_order($status)?>)</h2>

        <div class="ui segment">

        	<div class="ui grid">
				<div class="ten wide column">
					<strong>Cliente:</strong> <?=$name?>
					<br />
					<strong>Total de peças:</strong> <?=$qty?>
					<input type="hidden" value="<?=$qty?>" id="total_itens" />
				</div>
				<div class="six wide column">
					<strong>Registro:</strong> <?=dateTimetoDate($dtRegister)?>
					<br />
					<strong>Atualização:</strong> <?=dateTimetoDate($dtUpdate)?>
				</div>
			</div>
			
        </div>

        <div class="ui segment">

        	<h3 class="ui header">Itens</h2>

        	<?php if($status == 1){ ?>
	        	<div class="ui small form">
				  <div class="two fields">
				    <div class="field">
				    	<label>Tipo</label>
				    	<select id="itemType" name="itemType">
					    	<option value="">---</option>
					    	<?php foreach (productType() as $pk => $pv) { ?>
					    		<option value="<?=$pk?>"><?=$pv?></option>
					    	<?php } ?>
					    </select>
				    </div>
				    <div class="field">
				      <label>Quantidade</label>
				      <input id="itemQtd" name="itemQtd" placeholder="Total para o item" type="text">
				    </div>
				    <i class="plus square outline icon bt-add-item"></i>
				  </div>
				</div>
				<table class="ui definition table">
				  <thead>
				    <tr><th></th>
				    <th>Tipo</th>
				    <th>Qtd</th>
				    <th>Detalhes</th>
				    <th>Ação</th>
				  </tr></thead>	
				  <tbody class="orderItems">
				</tbody></table>
			<?php }else{  ?>
				<table class="ui definition table">
				  <thead>
				    <tr><th></th>
				    <th>Tipo</th>
				    <th>Qtd</th>
				    <th>Detalhes</th>
				  </tr></thead>	
				  <tbody>
				  	<?php foreach ($orderItem as $k) { ?>

				  	<tr>
				    	<td <?=(count($k['orderDetail']) > 0 ? 'rowspan="2" ><i class="warning sign icon">' : '><i class="check circle icon">')?></i></td>
				    	<td><?=productType($k['idType'])?></td>
				    	<td><?=$k['qty']?></td>
				    	<td><?=count($k['orderDetail'])?></td>
				    </tr>
				    <?php if(count($k['orderDetail']) > 0) {?>
				  	<tr>
				    	<td colspan="4">
				    		<h5>Detalhes do item</h5>
				    		<?php foreach ($k['orderDetail'] as $d) { ?>
				    		<div class="ui divider"></div>
				    		<div class="show-detail">
							  	<strong>Marca:</strong> <?=$d['brand']?> &nbsp;
							  	<strong>Tipo:</strong> <?=detailType($d['type'])?>
							  	<span>
							  		<div class="info-detail-box" data-content="<?=($d['obs'] !== null ? $d['obs'] : 'Nenhuma observação')?>" data-position="left center">
							  			<i class="info circle icon"></i>
							  		</div>
							  	</span>
							</div>
				    		<?php } ?>
				    	</td>
				    </tr>
				    <?php } } ?>
				</tbody></table>
			<?php } ?>

        </div>

        <div class="ui segment">

        	<h3 class="ui header">Observação</h2>

        	<p>
        		<?=($obs !== null ? $obs : 'Nenhuma observação inserida pelo cliente')?>
        	</p>
			
        </div>

        <div class="ui grid">
				<div class="twelve wide column">
				</div>
				<div class="four wide column">
					<button class="ui yellow button bt-order-action" opt-id="<?=$idOrder?>" opt-action="<?=actionToOrder($status)['action']?>"><?=actionToOrder($status)['label']?></button>
				</div>
			</div>

     </div>
</div>

<div class="ui modal small modalMessage">
  <i class="close icon"></i>
  <div class="header">
  </div>
  <div class="image content">
    <div class="description">
      <p></p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Ok
    </div>
  </div>
</div>

<div class="ui modal small modalDetail first modalDetailForm">
  <i class="close icon"></i>
  <div class="header">
  </div>
  <div class="image content">
    <div class="description">
      <div class="ui equal width form">
		  <div class="fields">
		    <div class="field">
		      <label>Marca</label>
		      <input type="text" id="detailBrand" name="detailBrand" placeholder="Ex.: NewMarca">
		    </div>
		    <div class="field">
		      <label>Tipo do Detalhe</label>
		      <select id="detailType" name="detailType">
			    	<option value="">---</option>
			    	<?php foreach (detailType() as $dk => $dv) { ?>
			    		<option value="<?=$dk?>"><?=$dv?></option>
			    	<?php } ?>
			    </select>
		    </div>
		  </div>
		  <div class="fields">
		    <div class="field">
		      <label>Observação</label>
		      <textarea rows="2" id="detailObs" name="detailObs"></textarea>
		    </div>
		  </div>
		</div>
    </div>
  </div>
  <div class="actions">
    <div class="ui basic deny button">
      Cancelar
    </div>
    <div class="ui violet button bt-add-detail">
      Adicionar
    </div>
  </div>
</div>

<div class="ui modal small modalDetail second modalDetailMessage">
  <i class="close icon"></i>
  <div class="header">
  		Detalhes do item
  </div>
  <div class="image content">
    <div class="description">
      <p>É preciso adicionar a marca e o tipo de detalhe do item</p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Ok
    </div>
  </div>
</div>