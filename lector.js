
var sonido = new Audio ("sonido/barcode.wav");
$(document).ready(function(){
  barcode.config.start=0.1;
  barcode.config.end = 0.9;
  barcode.config.video = '#barcodevideo';
  barcode.config.canvas= '#barcodecanvas';
  barcode.config.canvasg = '#barcodecanvasg';
  barcode.init();

  barcode.setHandler(function(barcode){
    console.log('El codigo leido es ' + barcode);
    $('#codigobarra').val(barcode);
    sonido.play();
    $('#closemodal').click();
      // el codigo leido debe consultarse en la bd y si existe llenar todo el formulario
      $.ajax({
        method: "POST",
        url: "consultaCodigobarras.php?barcode="+barcode,
        datatype: "json",
        success: function(resultado){
          console.log('El vector es este '+resultado);
         // $('#nombre').val(resultado);
        $('#codigo').val(resultado);
        }
      });
      $.ajax({
        method: "POST",
        url: "consultaCodigobarras1.php?barcode="+barcode,
        datatype: "json",
        success: function(resultado){
          console.log('El vector es este '+resultado);
         // $('#nombre').val(resultado);
        $('#nombre').val(resultado);
        }
      });
  }); 

  



// USAR AJAX PARA CARGAR LOS SELECT
//   $.ajax({
//     url : './consultaCategorias.php',
//  
//   });
/**
 * 
 * hide
 * show
 * attr
 * html
 * val
 * on
 * change
 * blur
 * 
 * 
 * 
 */
});


