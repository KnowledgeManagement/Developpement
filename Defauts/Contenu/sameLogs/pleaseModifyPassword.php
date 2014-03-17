<div id="shadowing" style="display: none;"></div>
<div id="box" style="height:260px">
	<span id="boxtitle"></span>
	<form method="post" id="formSameLogs" name="formSameLogs" action="Defauts/Contenu/sameLogs/modificationOfPassword.php">
		<p>
			Attention !<br/>
			Votre mot de passe et votre login sont identiques.<br/>
			Nous vous invitons à le modifier :
			<br /><br />
			Nouveau mot de passe : <input type="password" class="form-label" id="password" name="password"/>
		</p>
		<p class="btn-group btn-group-sm"> 
			<input type="button" class="btn btn-primary" onclick="javascript:validModif()" name="submit" value="Modifier"/>
			<input type="button" class="btn btn-primary" name="cancel" value="Plus tard" onclick="closebox('box', 'shadowing')"/>
		</p>
	</form>
</div>