<?php
  include('utils/cipher.php');
  include('sql/api_bdd.php');
  $bdd=new BDD();
  
  $cookie = $_COOKIE["log"]; 
  $mail = DecryptCookieMail($cookie);
  
  $bdd = new BDD();
  $userData = $bdd->GetUtilisateurData($mail);
  $name = $userData['UTILISATEUR_PRENOM'].' '.$userData['UTILISATEUR_NOM'];
  $type = $userData['UTILISATEUR_UTILISATEURTYPE'];
 
?>
<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><?php echo $header; ?></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Saisir info à rechercher...</label>
            </div>
          </div>
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
          <img src="images/user.jpg" class="demo-avatar">		  
		  <div class="demo-avatar-dropdown">
			<span>
				<?php 
					echo $name;
				?>
			</span>
          </div> 
        </header>
		 <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="home.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Accueil</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">account_circle</i>Mon espace</a>
          <a class="mdl-navigation__link" href="messagerie.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Messages privés</a>
<?php
switch($type)
{
	case 1:
?>
       
		  <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">show_chart</i>Statistiques</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Gestion des comptes</a>
		  <a class="mdl-navigation__link" href="admin_data.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">school</i>Gestion des Formations</a>
        <!--  <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">euro_symbol</i>Devis & factures</a>-->
         
         
<?php
		break;
	case 2:
?>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Mes clients</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">euro_symbol</i>Devis & factures</a>
         
<?php
		break;
	case 3:
?>
		  <a class="mdl-navigation__link" href="statistiques.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">show_chart</i>Statistiques</a>
          <!--  <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">euro_symbol</i>Devis & factures</a>-->
         
        
        
<?php
		break;
}
?>
		 <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">share</i>Partager un fichier</a>
		<a class="mdl-navigation__link" href="login/unlogin.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">power_settings_new</i>Déconnecter</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>


		</div>
	<main class="mdl-layout__content mdl-color--grey-100">
      
      