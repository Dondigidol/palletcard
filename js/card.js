function logout(){
    $.ajax({
		type: "POST",
		url: "aj/logout.php",
		success: function(data){
			if (data.length>0){
				$("#alerts").html(data);
			}
		}
	});
}