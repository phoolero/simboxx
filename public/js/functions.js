
        //almacena qué formulario está ocupando el usuario
    var tipo_accion_seleccionada = "";

function getDatosCuenta(cuenta, from){
		var Ruta = Routing.generate('datosCuenta');
		var nombrecapa = "#datosCuenta" + from;
		$.ajax({
			type: 'POST',
			url: Ruta,
			data: ({cuenta: cuenta}),
			async: true,
			dataType: "json",
			success: function(data){
				$(nombrecapa).html(data['nombre'] + '<img id="firma-img" src="../../img/firmas/' + data['firma'] + '" width="130">');
			}
		});
	}
	
	function setPuntaje(datos){
		//se agarra el texto de ese div que sirve para la ruta
		lista = $('#listaEjercicios').text();
		$.ajax({
			type: 'POST',
			url: 'http://localhost/simboxx/public/puntaje',
			data: ({datos: datos}),
			async: true,
			dataType: "json",
			success: function(data){
			   //console.log(data['url']);
 				
				 location.reload();
			}
		});
	}
	function setTraspaso(datos, valor){
		//se agarra el texto de ese div que sirve para la ruta
		lista = $('#listaEjercicios').text();
		$.ajax({
			type: 'POST',
			url: 'http://localhost/simboxx/public/traspaso-tesoreria',
			data: ({datos: datos, valor: valor}),
			async: true,
			dataType: "json",
			success: function(data){
			  // console.log(data['mnsj']);
			   location.reload();
			}
		});
	}
    function esconderFormulariosMenos(id_mantener){
        
        //escondemos instrucciones
        $("#instrucciones").hide();

        $("#form_pago_cheque").hide();
        $("#form_deposito_cheque_mismo_banco").hide(); 
        $("#form_deposito_cheque_otro_banco").hide();
        $("#form_traspaso_a_tesoreria").hide(); 
        $("#form_traspaso_de_tesoreria").hide();

         $(id_mantener).show();
         tipo_accion_seleccionada = id_mantener.id;

    }
    function esconderFormularios(){

        //escondemos instrucciones
        $("#instrucciones").hide();

        $("#form_pago_cheque").hide();
        $("#form_deposito_cheque_mismo_banco").hide(); 
        $("#form_deposito_cheque_otro_banco").hide();
        $("#form_traspaso_a_tesoreria").hide(); 
        $("#form_traspaso_de_tesoreria").hide();

        tipo_accion_seleccionada = "";
    }



	//funciones para comparar respuestas del usuario con las que debieran ser, y se entrega el puntaje del ejercicio,
	//en caso de que la respuesta correcta fuera realizar la operacion.
	function compararResultadosPch(){
		//comparamos serie
		var datos = { };
		
			
		if($("#serie-cheque-input-pch").val() == $("#serie").html()){
			if($("#monto-cheque-input-pch").val() == $("#montonumero").html().replaceAll(".","")){
				alert("is the same! Y está correcto el ejercicio, así que te ganaste los puntos.");	
					//push datos
					datos["registro"] = 1;
					datos["puntaje"] = 5;
					datos["transaccion"] = 680;
					datos["estado"]='A';
					datos["cuenta"]=$('#numero-cuenta-pch').val();
					datos["serie"]=$('#serie-cheque-input-pch').val();
					datos["entrada_salida"]= "salida";
					datos["monto"]=$('#monto-cheque-input-pch').val();
					datos["tipo_operacion"]=$(".linkmenu")[0].text;;
				setPuntaje(datos);
			}
		}
		else{
			alert("La operación no está correcta.");
		}
	}

    //TODO: ver todo lo de la papeleta. Necesitamos que se muestre.
    function compararResultadosDcmb(){
		//comparamos serie
		var datos = { };
		if($("#numero-cuenta-dcmb").val() == $("#depo-numero-cuenta").html()){
			if($("#monto-doctos-dcmb").val() == $("#depo-total").html().replaceAll(".","")){
                if($("#serie-papeleta-dcmb").val() == $("#depo-serie").html()){
				    alert("is the same! Y está correcto el ejercicio, así que te ganaste los puntos.");
					datos["registro"] = 1;
					datos["puntaje"] = 5;
					datos["transaccion"] = 700;
					datos["estado"]='A';
					datos["cuenta"]=$('#numero-cuenta-dcmb').val();
					datos["serie"]=$('#serie-papeleta-dcmb').val();
					datos["entrada_salida"]= "entrada";
					datos["monto"]=$('#monto-doctos-dcmb').val();
					datos["tipo_operacion"]=$(".linkmenu")[1].text;;
					setPuntaje(datos);
				}
				else{
					alert("Error papeleta");
				}
			}
			else{
				alert("Error monto");
			}
		}
		else{
			alert("Error numero cuenta.");
		}
	}

    //TODO: ver todo lo de la papeleta. Necesitamos que se muestre.
    function compararResultadosDcob(){
		//comparamos serie
		var datos = { };
		if($("#numero-cuenta-dcob").val() == $("#depo-numero-cuenta").html()){
			if($("#monto-doctos-dcob").val() == $("#depo-total").html().replaceAll(".","")){
                if($("#serie-papeleta-dcob").val() == $("#depo-serie").html()){
				    alert("is the same! Y está correcto el ejercicio, así que te ganaste los puntos.");
					datos["registro"] = 1;
					datos["puntaje"] = 5;
					datos["transaccion"] = 720;
					datos["estado"]='A';
					datos["cuenta"]=$('#numero-cuenta-dcob').val();
					datos["serie"]=$('#serie-papeleta-dcob').val();
					datos["entrada_salida"]= "entrada";
					datos["monto"]=$('#monto-doctos-dcob').val();
					datos["tipo_operacion"]=$(".linkmenu")[2].text;;
					setPuntaje(datos);
				}
				else{
					alert('error papeleta')
				}
			}
			else{
				alert('error monto');
			}
		}
		else{
			alert("Error serie cheque.");
		}
	}

	//ahora, si la persona clickea "rechazar operación", corroboramos que el cheque efectivamente venga con error
	function compararError(){
		if($("#error").html()!=""){
			var datos = { };
			alert("Bien! La operación tenía un error: " + $("#error").html());
			datos["puntaje"] = 5;
			setPuntaje(datos);
		}
		else{
			alert("Te has equivocado. La operación estaba correcta.");
		}
	}


//tesoreria 

function compararResultadosTs(){
	var datos = { };
	var ope = "";
	valor = $("#valor-20000-tat").val();
	limite = $("#monto-saldo").text().replace("$","").trim();
	if(parseFloat(valor) > parseFloat(limite)){
		alert("Excedes el limite del dinero que posees")
	}else{
		datos["monto"] = valor;
		ope = "negativo";
		setTraspaso(datos, ope);
	}

}
function compararResultadosdTs(){
	var datos = { };
	var ope = "";
	var tx ="";
	var valor20 = parseInt($("#valor-20000-tdt").val())*20000;
	var valor10 = parseInt($("#valor-10000-tdt").val())*10000;
	var valor5 = parseInt($("#valor-5000-tdt").val())*5000;
	var valor2 = parseInt($("#valor-2000-tdt").val())*2000;
	var valor1 = parseInt($("#valor-1000-tdt").val())*1000;
	var total = valor20+valor10+valor5+valor2+valor1;
	var c =	confirm("¿Seguro que desea solicitar?");
		if( c == true){
			datos["monto"] = total;
			ope = "positivo";
			tx = "Se ha traspasado con exito";
		}else{
			tx = "El traspaso se ha cancelado";
		}
		
		setTraspaso(datos, ope);
}

function addClassActive(){

	$(".carousel-item.active").removeClass("active")
	$(".carousel-item").first().addClass("active");
}