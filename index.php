<!DOCTYPE html>
<?php include('include/header.php'); ?>
<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Incription</span>
          <div class="mdl-layout-spacer"></div>
          
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">A propos</li>
            <li class="mdl-menu__item">Contact</li>
            <li class="mdl-menu__item">Informations légales</li>
          </ul>
        </div>
      </header>
	    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
         <!-- <img src="images/user.jpg" class="demo-avatar">		  
		  <div class="demo-avatar-dropdown">
			<span></span>
          </div> -->
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
         <!-- <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Accueil</a>-->
          <a class="mdl-navigation__link" href="#"id="link_inscription" onClick="a_connection_onClick()"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person_add</i>S'inscrire</a>
          <a class="mdl-navigation__link" href="#" id="link_connection" onClick="a_inscription_onClick()""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">input</i>Se connecter</a>
          <!--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Mes clients</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">euro_symbol</i>Devis & factures</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">share</i>Partager un fichier</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">power_settings_new</i>Déconnecter</a>-->
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
     </div>
	<main class="mdl-layout__content mdl-color--grey-100">
      
      




<!-- <html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href ="" />
  <title>Login</title>
</head> 
<body> -->

 <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >
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
						
					<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type = "submit"  value="Envoyer"/>
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
						
					<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type = "submit"  value="Envoyer"/>
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
		$('.mdl-layout-title').html("Connection");
	  }	
	function a_connection_onClick() {
		$('#connection').hide();
		$('#inscription').show();
		$('.mdl-layout-title').html("Inscription");
	  }	
	</script>
	</div>
	</div>
<?php include('include/footer.php'); ?>
<!--</body>
</html>-->