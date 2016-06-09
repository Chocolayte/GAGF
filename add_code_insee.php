<?php

	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	$code= $_POST['code'];
	$libelle= $_POST['libelle'];
	$result=$bdd->AddInsee($code, $libelle);
	
	if ($result)
	  echo "Classification de formation ajoutée avec succès";
	else
	  echo "Classification de formation déjà existente";
	
?>