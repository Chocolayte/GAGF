<?php

	include('sql/api_bdd.php');
	
	$bdd = new BDD();
	$code= $_POST['code'];
	$libelle= $_POST['libelle'];
	$result=$bdd->AddInsee($code, $libelle);
	
	session_start();
	$_SESSION['insee']=$result;
	 
	header("Location: admin_data.php");

	
?>