//# Cria objeto primario caso não exista
if(typeof lavamosnos == 'undefined') lavamosnos = new Object();

//# Cria objeto secundário relacionado à classe quando não existir
if(typeof lavamosnos.general == 'undefined') lavamosnos.general = new Object();

//# Decladração das funções dentro do objeto criado
lavamosnos.general = {

	register: function(){

	},

	url: function(val){

        if(typeof val == 'undefined')
            var val = '';

        var url = window.location.origin; 

        return $.trim(url+'/'+val);

	},

	email: function (valor) {

        var rx = new RegExp("\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*");
        var matches = rx.exec(valor);

        if(matches != null && valor == matches[0]){

            var validandox = valor.split("@");
            validando = validandox[1].split(".");

            if(validando[0].length < 2){

                return false;

            }else{

                return true;

            }

        }else{

            return false;
            
        }

    },

    cnpj: function (valor) {
        
        valor = jQuery.trim(valor);
        valor = valor.replace('/', '');
        valor = valor.replace('.', '');
        valor = valor.replace('.', '');
        valor = valor.replace('-', '');

        var numeros, digitos, soma, i, resultado, pos, tamanho, digitosIguais;
        digitosIguais = 1;

        if (valor.length < 14 && valor.length < 15)
            return false;

        for (i = 0; i < valor.length - 1; i++) {
            if (valor.charAt(i) != valor.charAt(i + 1)) {
                digitosIguais = 0;
                break;
            }
        }

        if (!digitosIguais) {
            tamanho = valor.length - 2;
            numeros = valor.substring(0, tamanho);
            digitos = valor.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;

                if (pos < 2) {
                    pos = 9;
                }
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            if (resultado != digitos.charAt(0))
                return false;

            tamanho = tamanho + 1;
            numeros = valor.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;

                if (pos < 2)
                    pos = 9;
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

            if (resultado != digitos.charAt(1))
                return false;

            return true;
        }
        else
            return false;

    },

    loader: function(){

        $('.loader-page').toggle();

    }

}

$(document).ready(lavamosnos.general.register);