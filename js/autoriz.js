$(document).ready(function(){
	$("#submit").on("click",function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "/adminPanels/loginaut.php",
			data: {login: $("#login").val(), password: $("#password").val()},
			dataType: "html",
			success: function(data){
				if(data == "DONE"){
					location.href = "/adminPanels/conflist.php";
				}
				else{
					alert("Неверные данные");
				}
			}			
		});
	});
});