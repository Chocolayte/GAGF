<?php

	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	$competence= $_POST['competence'];
	$result=$bdd->AddCompetence($competence, true);
	
	session_start();
	$_SESSION['competence']=$result;
	 
	header("Location: saisie_competences.php");

	
?>