<!DOCTYPE html> 
<?php
  if (isset($_COOKIE["log"]))
	header("Location: home.php");
?>
<?php include('include/header.php'); ?>
<?php include('utils/cipher.php'); ?>


<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Connexion</span>
          <div class="mdl-layout-spacer"></div>
          
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">Contact</li>
            <li class="mdl-menu__item">Déconnexion</li>
          </ul>
        </div>
    </header>

	<div class="demo-drawer mdl-layout__drawer">
        <header class="demo-drawer-header">
         <!-- <img src="images/user.jpg" class="demo-avatar">		  
		  <div class="demo-avatar-dropdown">
			<span></span>
          </div> -->
        </header>
        <nav class="demo-navigation mdl-navigation">   
			<a class="mdl-navigation__link" href="#" id="link_connexion" onClick="a_inscription_onClick()"><i class="material-icons" role="presentation">input</i>SE CONNECTER</a>
			<a class="mdl-navigation__link" href="#" id="link_inscription" onClick="a_connexion_onClick()"><i class="material-icons" role="presentation">person_add</i>S'INSCRIRE</a>
			<div class="mdl-layout-spacer"></div>
			<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
    </div>

<main class="mdl-layout__content">
<div class="mdl-grid demo-content">
    <div class="demo-charts mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >
		<div id="connexion" >
			<h3> Connexion </h3>
			<form method="post" action="login/login.php">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="mail">E-mail</label>
					<input class="mdl-textfield__input" type="email" name="mail" id="mail" required="required" /> 
				</div>
				<br/>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
					<label class="mdl-textfield__label" for="nom">Mot de passe</label>
					<input class="mdl-textfield__input" type="text" name="password" id="nom" required="required" />
				</div>
				<br/><br/>
					
				<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" style="float:right;" type="submit"  value="Envoyer"/>
			</form>
			<br/><br/>
			<a href="#" id="linkInscription" onClick="a_connexion_onClick()">Je ne suis pas encore inscrit</a>
			<br/><br/>
		</div>
		
		<div id="inscription" style="display:none">
			<h3> Inscription </h3>
			<form method="post" action="login/sign_up.php">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="mail">Veuillez indiquer votre email</label>
					<input class="mdl-textfield__input" type="email" name="mail" id="mail" required="required" />
				</div>
				<br/>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
					<label class="mdl-textfield__label" for="nom">Veuillez indiquer votre nom</label>
					<input class="mdl-textfield__input" type="text" name="nom" id="nom" required="required" text="" />
				</div>
				<br/>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<label class="mdl-textfield__label" for="prenom">Veuillez indiquer votre prenom</label>
					<input class="mdl-textfield__input" type="text" name="prenom" id="prenom" required="required" />
				</div>
				<br/>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">		
					<label class="mdl-textfield__label" for="pass">Veuillez indiquer votre password</label>
					<input class="mdl-textfield__input" type="password" name="pass1" id="pass" required="required" />
				</div>
				<br/>
				
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">		
					<label class="mdl-textfield__label" for="pass">Veuillez confirmer votre password</label>
					<input class="mdl-textfield__input" type="password" name="pass2" id="pass" required="required" />
				</div>
				<br/><br/>
						
				<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" style="float:right;" type = "submit" />
			</form>
			<br/><br/>
			<a href="#" id="linkConnexion" onClick="a_inscription_onClick()">Je suis déjà inscrit</a>
			<br/><br/>
		</div>
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
		<script>
		function a_inscription_onClick() 
		{
			$('#inscription').hide();
			$('#connexion').show();
			$('.mdl-layout-title').html("Connexion");
		}	
		function a_connexion_onClick() 
		{
			$('#connexion').hide();
			$('#inscription').show();
			$('.mdl-layout-title').html("Inscription");
		}	
		</script>
	</div>
</div>
</main>

<?php include('include/footer.php'); ?>

</body>
</html>