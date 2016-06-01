<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href ="" />
  <title>Login</title>
</head>
<body>
	<div id="connection" style="display:none">
		<h1> Formulaire de connection </h1>
		<form method="post" action="login/login.php">
			<fieldset>
				<legend> Connection </legend>
				<p> 
					<label for="mail">E-mail </label> <br/><br/>
					<input type="email" name="mail" id="mail" placeholder="exemple@gmail.com" required="required" /> <br/> <br/>
						
					<label for="nom">Mot de passe</label> <br/><br/>
					<input type="text" name="password" id="nom" required="required" /> <br/> <br/>
						
					<input type = "submit"  value="Envoyer"/>
				</p>
			</fieldset>
		</form>
		<a href="#" id="link_inscription" onClick="a_connection_onClick()">S'inscrire</a>
	</div>
	
	<div id="inscription" >
		<h1> Formulaire d'inscription </h1>
		<form method="post" action="login/sign_up.php">
			<fieldset>
				<legend> Inscription </legend>
				<p>
					<label for="mail"> Veuillez indiquer votre email </label> <br/><br/>
					<input type="email" name="mail" id="mail" placeholder="exemple@gmail.com" required="required" value="baudin.pro@gmail.com" /> <br/> <br/>
						
					<label for="nom"> Veuillez indiquer votre nom </label> <br/><br/>
					<input type="text" name="nom" id="nom" required="required" text="" value="Baudin"/> <br/> <br/>
						
					<label for="prenom"> Veuillez indiquer votre prenom </label> <br/><br/>
					<input type="text" name="prenom" id="prenom" required="required" value="Prenom" /> <br/> <br/>
						
					<label for="pass"> Veuillez indiquer votre password </label> <br/><br/>
					<input type="password" name="pass1" id="pass" required="required" value="password" /> <br/> <br/>
						
					<label for="pass"> Veuillez confirmer votre password </label> <br/><br/>
					<input type="password" name="pass2" id="pass" required="required" value="password" /> <br/> <br/>
						
					<input type = "submit"  value="Envoyer"/>
				</p>
			</fieldset>
		</form>
		<a href="#" id="link_connection" onClick="a_inscription_onClick()">Se connecter</a>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script>
	function a_inscription_onClick() {
		$('#inscription').hide();
		$('#connection').show();
	  }	
	function a_connection_onClick() {
		$('#connection').hide();
		$('#inscription').show();
	  }	
	</script>
</body>
</html>