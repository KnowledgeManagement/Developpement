function goToManageMenusRightContent(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/manageMenuRightContent.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Gérer les menus");	
		}
	});
}

function goToManageMenusLeftContent(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/manageMenuLeftContent.php',
		type :'POST', 
		success:function(data) 
		{
			$('#LeftContent').html(data);
			$('#titleLeftContent').html("Menus");
		}
	});
}