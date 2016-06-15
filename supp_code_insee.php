
<?php

	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	
	foreach($_POST as $valeur)
	{
		$result = $bdd->SuppInsee($valeur);
	}
	
	if ($result)
	  echo "Classification supprimée avec succès";
	else
	  echo "Classification de formation inexistante";
?>