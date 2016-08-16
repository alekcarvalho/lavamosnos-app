//# Cria objeto primario caso não exista
if(typeof lavamosnos == 'undefined') lavamosnos = new Object();

//# Cria objeto secundário relacionado à classe quando não existir
if(typeof lavamosnos.delivery == 'undefined') lavamosnos.delivery = new Object();

//# Decladração das funções dentro do objeto criado
lavamosnos.delivery = {

	init: function(){

		$('.ui.accordion').accordion();


		$('.show-map').click(function(){

			if($('#map_delivery div').length > 0)
				window.directionsDisplay.setMap(null);

			var initPosition = {lat: parseFloat($(this).parent().attr('opt-piLat')), lng: parseFloat($(this).parent().attr('opt-piLng'))};
			var endPosition = {lat: parseFloat($(this).parent().attr('opt-peLat')), lng: parseFloat($(this).parent().attr('opt-peLng'))};

			lavamosnos.delivery.initMap(initPosition,endPosition,$(this).attr('opt-type'));

			$('.box-map').modal('show');

		});

		$('#bt-logout').click(function(){

			lavamosnos.general.loader();

			$.post(lavamosnos.general.url('main/logout'),function(){

				window.location.href = lavamosnos.general.url();

			});

		});

		$('.bt-change-status').click(function(){

			lavamosnos.general.loader();

			$.post(lavamosnos.general.url('main/changeStatus'),{id:$(this).attr('opt-id'),sts:$(this).attr('opt-sts')},function(){

				window.location.href = lavamosnos.general.url();

			});

		});

	},
	
	initMap: function(initPosition, endPosition, type) {

		if($('#map_delivery div').length == 0){

			window.map = new google.maps.Map(document.getElementById('map_delivery'), {
	 			scrollwheel: false,
	    		zoom: 7
		  	});

		}

		window.directionsDisplay = new google.maps.DirectionsRenderer({
		    map: window.map
		});



		// Set destination, origin and travel mode.
		var request = {
		    destination: endPosition,
		    origin: initPosition,
		    travelMode: (type == 'bicycling' ? google.maps.TravelMode.BICYCLING : google.maps.TravelMode.DRIVING) 
		};

		// Pass the directions request to the directions service.
		var directionsService = new google.maps.DirectionsService();

		directionsService.route(request, function(response, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		    	window.directionsDisplay.setDirections(response);

		    }
		});

	}

}

$(document).ready(lavamosnos.delivery.init);