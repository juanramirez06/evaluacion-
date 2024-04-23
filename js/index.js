$(document).ready(function(){
	 
	load(1);
});
function fn_cerrar(){
	parent.$.fn.colorbox.close();
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
