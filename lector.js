
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
          var datos = JSON.parse(resultado);
          console.log(datos.p_nombre);
            $('#nombre').val(datos.p_nombre);
            $('#codigo').val(datos.p_codigo);
            $('#categoria').val(datos.p_departamento);
            $('#precioAnt').val(datos.p_precioAnt);
            $('#precioAct').val(datos.p_precioAct);
            $('#activo').val(datos.p_activo);
            $('#registradoen').val(datos.p_regitradoEn);
            $('#modificadoen').val(datos.p_modificadoEn);
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


