//# Cria objeto primario caso não exista
if(typeof lavamosnos == 'undefined') lavamosnos = new Object();

//# Cria objeto secundário relacionado à classe quando não existir
if(typeof lavamosnos.login == 'undefined') lavamosnos.login = new Object();

//# Decladração das funções dentro do objeto criado
lavamosnos.login = {

	init: function(){

		$('#bt-login').click(lavamosnos.login.validateLogin);

		$('#lgClave').keypress(function(e) {
		    if(e.which == 13) 
		    	lavamosnos.login.validateLogin();
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

		$('.ui.checkbox').checkbox();

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