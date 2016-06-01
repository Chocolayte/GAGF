<?php

	include('../sql/api_bdd.php');

	if (count($_POST) != 5)
		die("Formulaire invalide");

	foreach (array("mail", "nom", "prenom", "pass1", "pass2") as $field)
	{
		if (!isset($_POST[$field]))
			die("Le champs $field n'est pas renseigné");
	}
	
	$mail 	= htmlspecialchars($_POST['mail']);
	$nom 	= htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$pass1 	= htmlspecialchars($_POST['pass1']);
	$pass2 	= htmlspecialchars($_POST['pass2']);
	$type=1;
	$adresse="hello";
	$codePostal="90000";
	$ville="Belfort";
	$tel="0698585858";
	
	if (htmlspecialchars($_POST['pass1']) != htmlspecialchars($_POST['pass2']))
			die("Les mots de passe ne correspondent pas");

	$bdd = new BDD();
	$userExists = $bdd->addUtilisateur($mail,$pass1,$nom,$prenom,$type,$adresse,$codePostal,$ville,$tel,0);
	print_r($userExists);
	
?>
    