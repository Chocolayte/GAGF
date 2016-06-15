<?php

	include('sql/api_bdd.php');
	$bdd = new BDD();
	$table="UTILISATEUR";
	$valueTest = $_POST['switch'];
	$coloneTest = "UTILISATEUR_MAIL";
	$bool="UTILISATEUR_ACTIVE";
		$result = $bdd->InverseBool($table,$coloneTest,$valueTest,$bool);
		
	if ($result[0]["UTILISATEUR_ACTIVE"]!=-1){
	if ($result[0]["UTILISATEUR_ACTIVE"])
	  echo "Compte activé avec succès";
	if (!$result[0]["UTILISATEUR_ACTIVE"])
	  echo "Compte désactivé avec succès";
	}
	else echo "Une erreur c'est produite";
?>