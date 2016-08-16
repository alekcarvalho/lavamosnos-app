<div class="ui raised very padded text container segment">
	<h2 class="ui header">Configurações</h2>
		

	<div class="ui grid">
		<div class="four wide column">
			<div class="ui tabular vertical fluid menu">
				<div class="item active" data-tab="tab-info">Informações</div>
				<div class="item" data-tab="tab-address">Endereço</div>
				<div class="item" data-tab="tab-image">Imagem</div>
				<div class="item" data-tab="tab-secure">Segurança</div>
			</div>
		</div>
		<div class="twelve wide stretched column">
			<div class="ui tab active" data-tab="tab-info">
				<form class="ui form" id="form-config-info">
				  <h4 class="ui dividing header">Informações da Lavanderia</h4>
				    <label>Nome</label>
				      <div class="field">
				        <input type="text" name="regName" id="regName" placeholder="Nome da Lavanderia" value="<?=$info['name']?>" />
				      </div>
				    <label>Email</label>
				      <div class="field">
				        <input type="text" name="regEmail" id="regEmail" placeholder="E-mail" value="<?=$info['email']?>" />
				      </div>
				    <label>CNPJ</label>
				      <div class="field">
				        <input type="text" name="regCnpj" id="regCnpj" placeholder="CNPJ" value="<?=$info['cnpj']?>" />
				      </div>
				    <label>Telefone</label>
				      <div class="field">
				        <input type="text" name="regPhone" id="regPhone" placeholder="Telefone" value="<?=$info['phone']?>" />
				      </div>
	  				<div class="ui button" id="bt-config-info">Salvar informações</div>
				</form>
			</div>
			<div class="ui tab" data-tab="tab-address">
				<form class="ui form" id="form-config-address">
				  <h4 class="ui dividing header">Endereço da Lavanderia</h4>
				    <label>CEP</label>
				      <div class="field">
				        <input type="text" name="locZipcode" id="locZipcode" placeholder="xxxxx-xxx" value="<?=@$address['zipcode']?>" />
				      </div>
				    <label>Endereço</label>
				      <div class="field">
				        <input class="require-address" type="text" name="locAddress" id="locAddress" placeholder="Endereço da lavanderia" value="<?=@$address['address']?>" />
				      </div>
				    <label>Número</label>
				      <div class="field">
				        <input class="require-address" type="text" name="locNumber" id="locNumber" placeholder="Número" value="<?=@$address['number']?>" />
				      </div>
				    <label>Complemento</label>
				      <div class="field">
				        <input type="text" name="locComplement" id="locComplement" placeholder="Complemento" value="<?=@$address['complement']?>" />
				      </div>
				    <label>Bairro</label>
				      <div class="field">
				        <input class="require-address" type="text" name="locNeighborhood" id="locNeighborhood" placeholder="Cidade" value="<?=@$address['neighborhood']?>" />
				      </div>
				    <label>Cidade</label>
				      <div class="field">
				        <input class="require-address" type="text" name="locCity" id="locCity" placeholder="Cidade" value="<?=@$address['city']?>" />
				      </div>
				    <label>Estado</label>
				      <div class="field">
				        <input class="require-address" type="text" name="locEstate" id="locEstate" placeholder="Estado" value="<?=@$address['estate']?>" />
				      </div>
	  				<div class="ui button" id="bt-config-address">Salvar endereço</div>
				</form>
			</div>
			<div class="ui tab" data-tab="tab-image">

				<h4 class="ui dividing header">Imagem da lavanderia</h4>
				<div class="ui small image info-image">
				  <img src="<?=($info['imagem'] !== null ? urlS3('laundry',$info['imagem']) : asset_url().'images/placeholder.png')?>">
				</div>
				<div class="info-image-text">
					<p>
						Você pode carregar uma imagem
						Você pode carregar uma imagem
						Você pode carregar uma imagem
					</p>

					<div id="fileuploader" class="ui button">Carregar Imagem</div>

				</div>
			</div>
			<div class="ui tab" data-tab="tab-secure">
				<form class="ui form" id="form-config-secure">
				  <h4 class="ui dividing header">Dados de segurança</h4>
				    <label>Email secundário</label>
				      <div class="field">
				        <input type="text" name="regEmailSecundary" id="regEmailSecundary" placeholder="E-mail secunrário" value="<?=$info['emailSecundary']?>" />
				      </div>
				    <div class="ui divider"></div>
				    <div class="field">
				    <label>Alterar Senha</label>
				    <div class="two fields">
				      <div class="field">
				        <input type="password" name="secNewPass" id="secNewPass" placeholder="Nova senha">
				      </div>
				      <div class="field">
				        <input type="password" name="secNewPassConfirm" id="secNewPassConfirm" placeholder="Confirme a senha">
				      </div>
				    </div>
				  </div>
	  				<div class="ui button" id="bt-config-secure">Salvar dados</div>
	  			</form>
			</div>
		</div>
	</div>

</div>

<div class="ui modal small modalConfig">
  <i class="close icon"></i>
  <div class="header">
  		Salvar Configurações
  </div>
  <div class="image content">
    <div class="description">
      <p>Não conseguimos salvar os dados, verifique as seguintes notificações:</p>
    </div>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Ok
    </div>
  </div>
</div>