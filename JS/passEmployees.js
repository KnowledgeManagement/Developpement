function goToPage(){
	$.ajax({
		url : 'Defauts/Contenu/passEmployees/listOfEmployees.php',
		type :'POST', 
		success:function(data) 
		{
			$('#LeftContent').html("");
			$('#RightContent').html(data);
			$('#titleRightContent').html("Liste des personnes inscrites");
			$('#titleLeftContent').html("");
		}
	});
}

function reinitPass(idUser){
	if(confirm("Êtes-vous sûr de vouloir réinitialiser le mot de passe de cet utilisateur ?")){
		$.ajax({
			url : 'Defauts/Contenu/passEmployees/listOfEmployees.php',
			data:{idUser:idUser},
			dataType:'TEXT',
			type :'POST', 
			success:function(data) 
			{
				$('#LeftContent').html("");
				$('#RightContent').html(data);
				$('#titleRightContent').html("Liste des personnes inscrites");
				$('#titleLeftContent').html("");
			}
		});
	}	
}