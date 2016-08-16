//# Cria objeto primario caso não exista
if(typeof lavamosnos == 'undefined') lavamosnos = new Object();

//# Cria objeto secundário relacionado à classe quando não existir
if(typeof lavamosnos.laundry == 'undefined') lavamosnos.laundry = new Object();

//# Decladração das funções dentro do objeto criado
lavamosnos.laundry = {

	init: function(){

		$('.ui.accordion').accordion();


		$('.show-map').click(function(){

			if($('#map_delivery div').length > 0)
				window.directionsDisplay.setMap(null);

			var initPosition = {lat: parseFloat($(this).parent().attr('opt-piLat')), lng: parseFloat($(this).parent().attr('opt-piLng'))};
			var endPosition = {lat: parseFloat($(this).parent().attr('opt-peLat')), lng: parseFloat($(this).parent().attr('opt-peLng'))};

			initMap(initPosition,endPosition,$(this).attr('opt-type'));

			$('.box-map').modal('show');

		});

		if($('#itemQtd').length > 0)
			$('#itemQtd').mask('000');

		if($('#locZipcode').length > 0)
			$('#locZipcode').mask('00000-000');

		if($('#regPhone').length > 0)
			$('#regPhone').mask('(00) 0000-00000');

		if($('#regCnpj').length > 0)
			$('#regCnpj').mask('00.000.000/0000-00', {reverse: true});

		lavamosnos.laundry.initSemantic();
		lavamosnos.laundry.initEvents();

		var settings =  {
				            url: lavamosnos.general.url("main/saveImage"),
				            dragDrop: false,
				            fileName: "fileLaundry",
				            returnType: "json",
				            maxFileSize: 2097152,
				            allowedTypes: 'jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG',
				            onSubmit: function(){
				            	lavamosnos.general.loader();
				            },
				            onSuccess: function (files, data, xhr){

				            	$('.info-image img').removeAttr('src').attr('src',data);


				               lavamosnos.general.loader();
				            }
				        };

        $("#fileuploader").uploadFile(settings);

	},

	initSemantic: function(){

		$('#dashboard .menu .item').tab({
		    context: 'parent'
		});

		$('.modalDetail.modal').modal({
		    allowMultiple: true
		});

		$('.info-detail-box').popup({
		    inline: true
		});
		
		$('.tabular.menu .item').tab();

	},

	initEvents: function(){

		$('#bt-logout').click(function(){

			lavamosnos.general.loader();

			$.post(lavamosnos.general.url('main/logout'),function(){

				window.location.href = lavamosnos.general.url();

			});

		});

		$('.bt-order-action').click(function(){

			lavamosnos.laundry.actionStatus($(this).attr('opt-id'), $(this).attr('opt-action'));

		});

		$('.bt-add-item').click(lavamosnos.laundry.addItem);
		$('.bt-add-detail').click(lavamosnos.laundry.addDetail);

		$('#bt-config-info').click(function(){
			lavamosnos.laundry.validateForm('info');
		});
		$('#bt-config-address').click(function(){
			lavamosnos.laundry.validateForm('address');
		});
		$('#bt-config-secure').click(function(){
			lavamosnos.laundry.validateForm('secure');
		});

	},

	validateForm:function(type){

		var send = true;
		var field = [];

		switch(type){

			case 'info':

				if($('#regName').val().length < 4){
			
					send = false;
					field.push('Nome da Lavanderia deve conter no mínimo 3 caracteres');

				}

				if(!lavamosnos.general.email($('#regEmail').val())){
					
					send = false;
					field.push('E-mail inválido');
					
				}

				if(!lavamosnos.general.cnpj($('#regCnpj').val())){
					
					send = false;
					field.push('CNPJ inválido');
					
				}

				if($('#regPhone').val().length < 14){
					
					send = false;
					field.push('Telefone com DDD');
					
				}

			break;

			case 'address':

				if($('#locZipcode').val().length < 9){
			
					send = false;
					field.push('CEP inválido');

				}

				$('.require-address').each(function(){

					if($(this).val().length < 1){
						send = false;
						field.push('Campos de endereço inválido');
					}

				});

			break;

			case 'secure':

				if( ( ($('#secNewPass').val().length > 0) || ($('#secNewPassConfirm').val().length > 0) ) && 
				  ( $('#secNewPass').val() != $('#secNewPassConfirm').val() ) ) {
					
					send = false;
					field.push('E-mail secundário inválido');
					
				}

				if( ($('#regEmailSecundary').val().length > 0) && (!lavamosnos.general.email($('#regEmailSecundary').val())) ) {
					
					send = false;
					field.push('As senhas não conferem');
					
				}

			break;

		}

		if(send !== false){

			lavamosnos.laundry.edit(type);

		}else{

			$('.modalConfig .content .description li').each(function(){
				$(this).remove();
			});

			$.each(field, function(i,j){
				$('.modalConfig .content .description').append('<li>' + j + '</li>');
			});
		
			$('.modalConfig').modal('show');

		}

	},

	edit: function(type){

		var object = {
						type : type,
						data : $('#form-config-' + type).serializeArray()
					 };

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('main/editConfig'), object,function(data){

			lavamosnos.general.loader();

			window.location.href = lavamosnos.general.url('main/configuracoes');

		},'json');

	},

	addItem: function(){

		if( ($('#itemType').val() > 0) && ($('#itemQtd').val() > 0) ){

			$('.orderItems').append('<tr class="item-added">'+
								      '<td><i class="check circle icon"></i></td>'+
								      '<td class="itemType" opt-id="' + $("#itemType").val() + '">' + $("#itemType option:selected").text() + '</td>'+
								      '<td class="itemQtd" opt-qtd="' + $("#itemQtd").val() + '">' + $('#itemQtd').val() + '</td>'+
								      '<td>0</td>'+
								      '<td><i class="tags icon item-detail"></i> <i class="remove icon item-remove"></i></td>'+
								    '</tr>'+
								    '<tr class="detail-add off">'+
								    	'<td colspan="4">'+
								    		'<h5>Detalhes do item</h5>'+
								    	'</td>'+
								    '</tr>');

			lavamosnos.laundry.removeItem();
			lavamosnos.laundry.modalDetail();

			$('#itemType option:eq(0)').prop('selected', true);
			$('#itemQtd').val('');

		}else{

			lavamosnos.laundry.showMessage('Adicionar Itens','Selecione o tipo e a quantidade de itens antes de adicionar.');

		}

	},

	removeItem: function(){

		$('.item-remove').unbind('click').click(function(){

			var el = $(this).parent()
						    .parent();
			
			el.next()
			  .remove();

			el.remove();

		});

	},

	addDetail: function(){

		if( ($('#detailType').val() > 0) && ($('#detailBrand').val().length > 3) ){

			lavamosnos.general.loader();

			var edit = $('.bt-add-detail').attr('edt-dtl');

			if (typeof edit !== typeof undefined && edit !== false) {
			    
				$('.bt-add-detail').removeAttr('edt-dtl').text(' Adicionar ');

				$('.detail-open').attr('opt-brand',$('#detailBrand').val())
								 .attr('opt-type',$('#detailType').val())
								 .attr('opt-obs',$('#detailObs').val())
								 .removeClass('detail-open')
								 .find('.brandTemp')
								 .html($('#detailBrand').val())
								 .parent()
								 .find('.typeTemp')
								 .html($("#detailType option:selected").text())
								 .parent()
								 .find('.info-detail-box')
								 .attr('data-content',$("#detailObs").val());

			}else{

				$('.detail-open').removeClass('off');
				$('.detail-open td').append('<div class="ui divider"></div>'+
								    		'<div class="show-detail" opt-brand="' + $('#detailBrand').val() + '" opt-type="' + $('#detailType').val() + '" opt-obs="' + $('#detailObs').val() + '">'+
											  	'<strong>Marca:</strong> <span class="brandTemp">' + $('#detailBrand').val() + '</span> &nbsp; '+
											  	'<strong>Tipo:</strong>  <span class="typeTemp">' + $("#detailType option:selected").text() + ' </span>'+
											  	'<span>'+
											  		'<div class="info-detail-box" data-content="' + ($('#detailObs').val().length > 0 ? $('#detailObs').val() : 'Nenhuma Observação') + '" data-position="left center">'+
											  			'<i class="info circle icon"></i>'+
											  		'</div>'+
											  		'<i class="edit icon detail-edit"></i>'+
											  		'<i class="remove icon detail-remove"></i>'+
											  	'</span>'+
											'</div>')
									.parent()
									.removeClass('detail-open')
									.prev()
									.children()
									.first()
									.attr('rowspan',2)
									.html('<i class="warning sign icon"></i>');

				lavamosnos.laundry.removeDetail();
				lavamosnos.laundry.editDetail();

			}

			$('.modalDetailForm.modal').modal('hide');

			$('#detailType option:eq(0)').prop('selected', true);
			$('#detailBrand').val('');
			$('#detailObs').val('');


			$('.info-detail-box').popup({
			    inline: true
			});

			lavamosnos.general.loader();

		}else{


			$('.modalDetailMessage.modal').modal('show');

		}

	},

	removeDetail: function(){

		$('.detail-remove').unbind('click').click(function(){

			var el = $(this).parent()
						    .parent();

			var box = el.parent();

			if($(box).find('.show-detail').length == 1){

				$(box).parent().prev().children().first().removeAttr('rowspan').html('<i class="check circle icon"></i>');
				box.parent().addClass('off');

			}

			el.prev()
			  .remove();

			el.remove();

		});

	},

	editDetail: function(){

		$('.detail-edit').unbind('click').click(function(){

			var el = $(this).parent().parent();

			$('#detailBrand').val(el.attr('opt-brand'));
			$('#detailType').val(el.attr('opt-type'));
			$('#detailObs').val(el.attr('opt-obs'));

			$('.bt-add-detail').text(' Editar ').attr('edt-dtl','true');

			el.addClass('detail-open');

			$('.modalDetailForm.modal .header').text('Detalhe do Item');

			$('.modalDetailForm.modal').modal('show');

		});


	},

	modalDetail: function(){

		$('.item-detail').unbind('click').click(function(){

			$(this).parent().parent().next().addClass('detail-open');

			$('.modalDetailForm.modal .header').text('Detalhe do Item');

			$('.modalDetailForm.modal').modal('show');

		});

	},

	actionStatus: function(id, action){

		lavamosnos.general.loader();

		switch(action){

			case 'historic':
				window.location.href = lavamosnos.general.url('pedido/historico');
				return false;

			case 'save':
				if($('.item-added').length > 0){

					var total_item = 0;

					$('.item-added .itemQtd').each(function(){

						total_item = total_item + parseInt($(this).attr('opt-qtd'));

					});

					if(total_item != parseInt($('#total_itens').val())){

						lavamosnos.laundry.showMessage('Salvar Pedido','Verifique a quantidade de itens adicionados, pois não é a mesma da quantidade total de itens do pedido.');
						return false;
						
					}else{

						var items = [];

						var revision = false;

						$('.item-added').each(function(){

							var details = [];

							if(!$(this).next().is(':hidden')){

								$(this).next().find('td .show-detail').each(function(){

									revision = true;

									var detailTemp = {
														'brand' : $(this).attr('opt-brand'),
														'type' : parseInt($(this).attr('opt-type')),
														'obs' : $(this).attr('opt-obs')
													};

									details.push(detailTemp);

								});
    
  							}

							var itemTemp = {
												'idType' : parseInt($(this).find('.itemType').attr('opt-id')),
												'qty' : parseInt($(this).find('.itemQtd').attr('opt-qtd')),
												'details' : details
											};

							items.push(itemTemp);

						});

						var object = {
										'id' : id,
										'action' : (revision !== false ? 'revision' : action),
										'items' : items
									 };

					}

				}else{

					lavamosnos.laundry.showMessage('Salvar Pedido','Adicione os itens do pedido antes de salvar.');
					return false;

				}
				break;

				default: var object = {
										'id' : id,
										'action' : action
									 };
				break;
		}

		$.post(lavamosnos.general.url('pedido/changeStatus'),object,function(data){

			window.location.href = lavamosnos.general.url();

		});

	},

	showMessage: function(title, desc){

		lavamosnos.general.loader();

		$('.modalMessage .header').text(title);
		$('.modalMessage .content .description p').text(desc);

		$('.modalMessage').modal('show');

	}

}

$(document).ready(lavamosnos.laundry.init);