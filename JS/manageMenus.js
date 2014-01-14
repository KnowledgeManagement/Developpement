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

function goToManageMenusRightContentCreateMenu(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/ManageMenuRightContentCreateMenu.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Créer un menu");
		}
	});
}

function goToManageMenusRightContentAddSousMenu(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/ManageMenuRightContentAddSousMenu.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Ajouter un sous-menu");
		}
	});
}

function goToManageMenusRightContentEditMenu(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/ManageMenuRightContentEditMenu.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Modifier un menu");
		}
	});
}

function goToManageMenusRightContentEditSousMenu(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/ManageMenuRightContentEditSousMenu.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#titleRightContent').html("Modifier un sous-menu");
		}
	});
}
function contactAdmin(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/contactAdmin.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#LeftContent').html("");
			$('#titleLeftContent').html("Navigation");
			$('#titleRightContent').html("Formulaire de contact");
		}
	});
}

function sendContact(){
	if(document.getElementById('objet').value == "" || document.getElementById('textArea').value == ""){
		alert("Merci de remplir tous les champs.");
	}else{
		$.ajax({
			url : 'Defauts/Contenu/manageMenus/sendContact.php',
			data : {objet : document.getElementById('objet').value, description : document.getElementById('textArea').value},
			dataType : 'TEXT',
			type :'POST', 
			success:function(data) 
			{
				$('#RightContent').html("Votre formulaire a bien été envoyé.");
				$('#LeftContent').html("");
				$('#titleLeftContent').html("Navigation");
				$('#titleRightContent').html("Formulaire de contact");
			}
		});
	}
}

function seeMyAsking(){
	$.ajax({
		url : 'Defauts/Contenu/manageMenus/seeMyAsking.php',
		type :'POST', 
		success:function(data) 
		{
			$('#RightContent').html(data);
			$('#LeftContent').html("");
			$('#titleLeftContent').html("Navigation");
			$('#titleRightContent').html("Mes demandes");
		}
	});
}