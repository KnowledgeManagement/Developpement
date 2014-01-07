function goToFunction(sousCategorie){
	getLink(sousCategorie);
	goToFunctionLeftContent(sousCategorie, 'aucun');
	goToFunctionRightContent(sousCategorie);
}

function getLink(sousCategorie){
	$.ajax({
		url : 'Defauts/Contenu/functions/getLink.php',
		type :'POST', 
		data : {sousCate : sousCategorie},
		dataType : 'text',
		success:function(data) 
		{
			var doc = eval('(' + data + ')');
			$('#titleRightContent').html(doc['nomCat']+" > "+doc['nomSousCat']);
			$('#titleLeftContent').html(doc['nomSousCat']);
		}
	});
}

function goToFunctionRightContent(sousCategorie){
	$.ajax({
		url : 'Defauts/Contenu/functions/rightContent.php',
		type :'POST', 
		data : {sousCate : sousCategorie},
		dataType : 'text',
		success:function(data) 
		{
			$('#RightContent').html(data);
		}
	});
}

function goToFunctionLeftContent(sousCategorie, fct){
	$.ajax({
		url : 'Defauts/Contenu/functions/leftContent.php',
		type :'POST', 
		data : {sousCate : sousCategorie, fct : fct},
		dataType : 'text',
		success:function(data) 
		{
			$('#LeftContent').html(data);
		}
	});
}

function seeFunction(intitule, sousCategorie, idReference){
	$.ajax({
		url : 'Defauts/Contenu/functions/seeFunction.php',
		type :'POST', 
		data : {idReference : idReference},
		dataType : 'text',
		success:function(data) 
		{
			$.ajax({
				url : 'Defauts/Contenu/functions/getLink.php',
				type :'POST', 
				data : {sousCate : sousCategorie},
				dataType : 'text',
				success:function(data) 
				{
					var doc = eval('(' + data + ')');
					$('#titleRightContent').html(doc['nomCat']+" > "+doc['nomSousCat']+" > "+intitule);
				}
			});
			goToFunctionLeftContent(sousCategorie, idReference);
			$('#RightContent').html(data);
		}
	});
}