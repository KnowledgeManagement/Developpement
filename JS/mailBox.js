function goTomailBoxRightContent(){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/messagerie_droit.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Tous les messages");	
		}
	});
}

function goTomailBoxLeftContent(){
	$.ajax({
		url : 'Defauts/Contenu/mailBox/messagerie_gauche.php',
		type :'POST', 
		success:function(data) 
		{
			$('#LeftContent').html(data);
			$('#titleLeftContent').html("Messagerie");
		}
	});
}