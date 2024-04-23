$(document).ready(function(){
	
   $("#buscarpro").change(function () {  
   		$("#buscarpro option:selected").each(function () {
				elegido=$(this).val();
				$.post("combo1.php", { elegido: elegido }, function(data){
				 $(".mostrar_propiedad").html(data).fadeIn('slow');
				 mostrar_detalles(1);
				
			});			
        });
   })	 
	 
});
function fn_cerrar(){
	parent.$.fn.colorbox.close();
};

function fn_agregar(){
var respuesta = confirm("Esta seguro de grabar la propiedad?");
  if (respuesta)
	{		
		var str = $("#forreg").serialize();

		$.ajax({
			url: 'ajax_modificar.php',
			data: str,
			type: 'post',
			success: function(data){
				alert(data);
			}
		});	

	}	
	};


function fn_cambiarest(){
	var str = $("#forreg").serialize();
	$.ajax({
		url: 'ajax_cambiar.php',
		data: str,
		type: 'post',
		success: function(data){
			$("#estadop").html(data);
		}
	});	
};

function fn_mostrarpropiedad(){
	var str = $("#forreg").serialize();
	$.ajax({
		url: 'combo1.php',
		data: str,
		type: 'post',
		success: function(data){
			$(".mostrar_propiedad").html(data).fadeIn('slow');
		}
	});	
};

function fn_detalles(){
var respuesta = confirm("Esta seguro de modificar el detalle?");
  if (respuesta)
	{		
		var str = $("#forreg").serialize();

		$.ajax({
			url: 'ajax_detallemod.php',
			data: str,
			type: 'post',
			success: function(data){
				 mostrar_detalles(1);
 
			}
		});	

	}	
	};
function load(page){
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'ajax_listar.php',
		data: {"full-name":$("#full-name").val(),"property-status":$("#property-status").val(),"location":$("#location").val(),"area-from":$("#area-from").val(),"action":"ajax","page":page},
		 beforeSend: function(objeto){
		$("#loader").html("<img src='loader.gif'>");
		},
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$("#loader").html("");
		}
	})
}
function mostrar_detalles(page){
	$("#loader2").fadeIn('slow');
	$.ajax({
		url:'listar_detmod.php',
		data: {"action":"ajax","page":page},
		 beforeSend: function(objeto){
		$("#loader").html("<img src='loader.gif'>");
		},
		success:function(data){
			$(".outer_div2").html(data).fadeIn('slow');
			$("#loader2").html("");
		}
	})
}