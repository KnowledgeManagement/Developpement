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

function openMessage(idMessage, objet){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/viewMessage.php',
		data : {id : idMessage},
		dataType : 'text',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Objet : "+objet);
			goToMailBoxLeftContent();
		}
	});
}

function validMessage(idMessage){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/acceptMessage.php',
		data : {id : idMessage},
		dataType : 'text',
		type :'POST', 
		success:function(data) 
		{
			goToMailBoxRightContent('allMessages');
			goToMailBoxLeftContent();
		}
	});
}

function refuseMessage(idMessage){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/refuseMessage.php',
		data : {id : idMessage},
		dataType : 'text',
		type :'POST', 
		success:function(data) 
		{
			goToMailBoxRightContent('allMessages');
			goToMailBoxLeftContent();
		}
	});
}