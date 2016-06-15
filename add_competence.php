<?php

	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	$competence= $_POST['competence'];
	
	$result=$bdd->AddCompetence($competence, true);
	
	if ($result)
	  echo "Compétence ajoutée avec succès";
	else
	  echo "Compétence déjà existante";

	
?>