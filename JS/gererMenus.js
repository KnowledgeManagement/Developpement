function goToGererMenusRightContent(){
	$.ajax({
		url : 'Defauts/Contenu/gestionMenus/gerer_menu_droit.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Gérer les menus");	
		}
	});
}

function goToGererMenusLeftContent(){
	$.ajax({
		url : 'Defauts/Contenu/gestionMenus/gerer_menu_gauche.php',
		type :'POST', 
		success:function(data) 
		{
			$('#LeftContent').html(data);
			$('#titleLeftContent').html("Menus");
		}
	});
}