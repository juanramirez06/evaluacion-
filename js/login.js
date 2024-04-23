$(document).ready(function(){
	 
	
});
 
function fn_login(){
	$.ajax({
		url:'ajax_login.php',
		data: {"cel":$("#cel").val(),"password":$("#password").val()},
		success:function(data){
			if (data == "0")
			{
				alert("NO TIENE ACCESO AL SISTEMA");
			}
			else
			{
				location.href="modify-property.php";
			}
		}
	})
}
