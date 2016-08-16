$(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;


      // show dropdown on hover
           $('.ui.dropdown').dropdown({
             on: 'hover'
           });

    // show accordion
           $('.ui.accordion')
  .accordion()
;

           $("#inputTextBox").keypress(function(event){
                  var inputValue = event.which;
                  // allow letters and whitespaces only.
                  if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
                      event.preventDefault();
                  }
              });

    });

  // show modal
    function modal_termos() {
      $('.ui.modal.termos')
    .modal('show')
  ;
    }

    function modal_politica() {
      $('.ui.modal.politica')
    .modal('show')
  ;
    }

  function modal_pedido_endereco() {
    $('.small.modal')
  .modal('show')
;
  }

  function modal_nao_entendi() {
    $('.small.modal-nao-entendi')
  .modal('show')
;
  }

  // show stepper button
    $(function () {
    // Document ready
    $('.input-stepper').inputStepper();
});

// tabs
$('.menu-tabs .item')
  .tab()
;


/*
Upload File
*/

'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
