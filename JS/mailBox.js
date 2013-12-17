function goToMailBoxRightContent(type){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/messRightContent.php',
		type :'POST', 
		data : {etat : type},
		dataType : 'text',
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Tous les messages");	
		}
	});
}

function goToMailBoxLeftContent(){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/messLeftContent.php',
		type :'POST', 
		success:function(data) 
		{
			$('#LeftContent').html(data);
			$('#titleLeftContent').html("Messagerie");
		}
	});
}