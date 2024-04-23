$(document).ready(function(){
	 
	 
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
			url: 'ajax_agregar.php',
			data: str,
			type: 'post',
			success: function(data){
				parent.load(1);
				alert(data);
				parent.fn_cerrar();
			}
		});	

	}	
	};

function fn_detalles(){
var respuesta = confirm("Esta seguro de grabar el detalle?");
  if (respuesta)
	{		
		var str = $("#forreg").serialize();

		$.ajax({
			url: 'ajax_detalle.php',
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
		url:'listar_det.php',
		data: {"carac":$("#carac").val(),"cantidad":$("#cantidad").val(),"action":"ajax","page":page},
		 beforeSend: function(objeto){
		$("#loader").html("<img src='loader.gif'>");
		},
		success:function(data){
			$(".outer_div2").html(data).fadeIn('slow');
			$("#loader2").html("");
		}
	})
}