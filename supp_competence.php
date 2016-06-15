<?php
	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	$competence= $_POST['competence2'];
	
	$result=$bdd->SuppCompetence($competence);
	
	if ($result)
	  echo "Compétence supprimée avec succès";
	else
	  echo "Compétence inexistante";

	
?>