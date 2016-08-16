<div class="ui raised very padded text container segment">
	<div id="dashboard">
		<h2>Pedidos aguardando transporte</h2>

			  	<?php 

			  		if(count($orders) > 0){ 
			  			foreach ($orders as $oo) { ?>

			  			<div class="ui <?=(in_array($oo['statusDelivery'], [1,4]) ? 'yellow' : 'green')?> segment accordion">

			  				<div class="title">
			  					<h3>
    								<i class="dropdown icon"></i>
							    
				  					Pedido #<?=$oo['idOrder']?>

				  					<span>(<?=status_delivery($oo['statusDelivery'])?>)</span>
				  				</h3>
							</div>
	  						<div class="content">

							<div class="ui divider"></div>
	  							<div class="ui grid">
								  <div class="twelve wide column">

									    <h4>Origem</h4>
								      	<p>
								      		<?=($oo['status'] == 1 ? $oo['addressClient'] : $oo['addressLaundry'])?>
								      	</p>

								      	<div class="ui divider"></div>

								      	<h4>Destino</h4>
								      	<p>
								      		<?=($oo['status'] == 1 ? $oo['addressLaundry'] : $oo['addressClient'])?>
								      	</p>
								      	<div class="ui divider"></div>

								  </div>
								  <div class="three wide column como-chegar" opt-piLat="<?=(in_array($oo['statusDelivery'], [1,4]) ? $oo['latCli'] : $oo['latLau'])?>" 
											  								 opt-piLng="<?=(in_array($oo['statusDelivery'], [1,4]) ? $oo['lngCli'] : $oo['lngLau'])?>" 
											  								 opt-peLat="<?=(in_array($oo['statusDelivery'], [1,4]) ? $oo['latLau'] : $oo['latCli'])?>" 
											  								 opt-peLng="<?=(in_array($oo['statusDelivery'], [1,4]) ? $oo['lngLau'] : $oo['lngCli'])?>" >

								  	Como Chegar

								  	<button class="olive circular ui icon button show-map" opt-type="driving">
								  		<i class="fa fa-truck" aria-hidden="true"></i>
								  	</button>
								  	<br />
								  	<button class="teal circular ui icon button show-map" opt-type="bicycling">
								  		<i class="fa fa-bicycle" aria-hidden="true"></i>
								  	</button>

								  </div>
								</div>
						      	
								<button class="ui <?=(in_array($oo['statusDelivery'], [1,4]) ? 'yellow' : 'green')?> button bt-change-status" opt-id="<?=$oo['idOrder']?>" opt-sts="<?=$oo['statusDelivery']?>"><?=($oo['statusDelivery'] == 1 ? 'Marcar como retirado' : 'Marcar como entregue')?></button>

				  			</div>

			  			</div>

			  	<?php } }else{ ?>

					<div class="ui grey segment">Nenhum pedido aguardando retirada</div>

			  	<?php } ?>
			    
        </div>
     </div>
</div>

<div class="ui modal small box-map">
  <i class="close icon"></i>
  <div class="header">
    Mapa do Delivery
  </div>
  <div class="content">
    <div id="map_delivery">
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Fechar
    </div>
  </div>
</div>
