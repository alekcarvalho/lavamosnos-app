//# Cria objeto primario caso não exista
if(typeof lavamosnos == 'undefined') lavamosnos = new Object();

//# Cria objeto secundário relacionado à classe quando não existir
if(typeof lavamosnos.login == 'undefined') lavamosnos.login = new Object();

//# Decladração das funções dentro do objeto criado
lavamosnos.login = {

	init: function(){

		$('.ui.checkbox').checkbox();

		$('#bt-login').click(lavamosnos.login.validateLogin);

		$('#bt-register').click(lavamosnos.login.validateRegister);

		if($('#regPhone').length > 0)
			$('#regPhone').mask('(00) 0000-00000');

		if($('#regCnpj').length > 0)
			$('#regCnpj').mask('00.000.000/0000-00', {reverse: true});

		$('#lgClave').keypress(function(e) {
		    if(e.which == 13) 
		    	lavamosnos.login.validateLogin();
		});

		$('.label-termos span').click(function(){

			lavamosnos.login.showTerm($(this).attr('opt-type'));

		});

		$('#bt-remember').click(lavamosnos.login.validateRemember);

		$('#remEmail').keypress(function(e) {
		    if(e.which == 13) 
		    	lavamosnos.login.validateRemember();
		});

		$('#bt-remember-redefine').click(lavamosnos.login.validateRedefine);

		$('#redClaveConfirm').keypress(function(e) {
		    if(e.which == 13) 
		    	lavamosnos.login.validateRedefine();
		});

	},

	showTerm: function(type){

		console.log(type);

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('login/getTerms'),{type:type},function(data){

			lavamosnos.general.loader();

			$('.modal.terms .header').html(data.title);
			$('.modal.terms .content').html(data.content);
			$('.modal.terms').modal('show');


		},'json');


	},
	validateRemember: function(){

		var send = true;
		var field = [];

		if(!lavamosnos.general.email($('#remEmail').val())){
			
			send = false;
			field.push('E-mail');
			
		}

		if(send !== false){

			lavamosnos.login.remember();

		}else{

			lavamosnos.login.showError(field);
		}

	},

	remember: function(){

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('login/remember'),$('#form-remember').serialize(),function(data){

			if((typeof data == 'undefined') || !data){

				lavamosnos.general.loader();

				lavamosnos.login.showError(['Verifique o e-mail, o cadastro não existe'],'Erro de definição de senha:');

			}else{

				window.location.href = lavamosnos.general.url('login/esqueci_enviado');

			}


		},'json');

	},

	validateRedefine: function(){

		var send = true;
		var field = [];

		if(($('#redClave').val().length < 6) || ($('#redClave').val() != $('#redClaveConfirm').val())){
			
			send = false;
			field.push('Senhas inválidas');
			
		}

		if(send !== false){

			lavamosnos.login.redefine();

		}else{

			lavamosnos.login.showError(field);
		}

	},

	redefine: function(){

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('login/enviaRedefinicao'),$('#form-remember-redefine').serialize(),function(data){

			if((typeof data == 'undefined') || !data){

				window.location.href = lavamosnos.general.url('login/redefinir/indedefinido');

			}else{

				window.location.href = lavamosnos.general.url('login/redefinicao_realizada');

			}


		},'json');

	},

	validateLogin: function(){

		var send = true;
		var field = [];

		if(!lavamosnos.general.email($('#lgEmail').val())){
			
			send = false;
			field.push('E-mail');
			
		}

		if($('#lgClave').val().length < 6){
			
			send = false;
			field.push('Senha');
			
		}

		if(send !== false){

			lavamosnos.login.validar();

		}else{

			lavamosnos.login.showError(field);
		}

	},

	validar: function(){

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('login/validar'),$('#form-login').serialize(),function(data){

			if((typeof data == 'undefined') || !data){

				lavamosnos.general.loader();

				lavamosnos.login.showError(['Verifique o e-mail e a senha'],'Erro ao logar:');

			}else{

				window.location.href = lavamosnos.general.url();

			}


		},'json');

	},


	validateRegister: function(){

		var send = true;
		var field = [];

		if($('#regName').val().length < 4){
			
			send = false;
			field.push('Nome da Lavanderia');

		}

		if(!lavamosnos.general.email($('#regEmail').val())){
			
			send = false;
			field.push('E-mail');
			
		}

		if(!lavamosnos.general.cnpj($('#regCnpj').val())){
			
			send = false;
			field.push('CNPJ');
			
		}

		if($('#regPhone').val().length < 14){
			
			send = false;
			field.push('Telefone com DDD');
			
		}

		if(!$('#terms-ok').is(':checked')){
			
			send = false;
			field.push('Você precisa estar de acordo com os termos');
			
		}
		if(send !== false){

			lavamosnos.login.cadastrar();

		}else{

			lavamosnos.login.showError(field);
		}

	},

	cadastrar: function(){

		lavamosnos.general.loader();

		$.post(lavamosnos.general.url('login/register'),$('#form-register').serialize(),function(data){

			if((typeof data == 'undefined') || !data){

				lavamosnos.general.loader();

				lavamosnos.login.showError(['Ocorreu alguma falha ao realizar o cadastro'],'Erro:');

			}else{

				window.location.href = lavamosnos.general.url('login/cadastro_sucesso');

			}

		},'json');

	},

	showError: function(fields, title){

		if(typeof title == 'undefined')
			title = 'Verifique os campos:';

		$(".message.error .header").html(title);

		$(".message.error .list li").each(function(){

			$(this).remove();
		
		});

		$.each(fields, function(i,j){

			$(".message.error .list").append('<li>' + j + '</li>');

		});

		$(".message.error").show();

	}

}

$(document).ready(lavamosnos.login.init);