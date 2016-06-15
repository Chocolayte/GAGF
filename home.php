<?php
    if (!isset($_COOKIE["log"]))
  	  header("Location: index.php");

	$css = "style/monthly.css"; 
	$header = "Accueil"; 
	include('include/header.php'); 
	include('include/main.php'); 

	$bdd = new BDD();

	$userData = $bdd->GetUtilisateurData($mail);
	$type = $userData['UTILISATEUR_UTILISATEURTYPE'];

	if ($type == 1)
		include('home_formateur.php');
	else if ($type == 2)
		include('home_formateur.php');
	else if ($type == 3)
		include('home_comptable.php');
	
?>


<?php include('include/footer.php'); ?>