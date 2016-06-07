<?php

	include('../sql/api_bdd.php');
	include('../utils/cipher.php');

	if (count($_POST) != 2)
		die("Formulaire invalide");

	foreach (array("mail", "password") as $field)
	{
		if (!isset($_POST[$field]))
			die("Le champs $field n'est pas renseigné");
	}
	
	$mail 	  = htmlspecialchars($_POST['mail']);
	$password = HashPassword(htmlspecialchars($_POST['password']));
	
	$bdd = new BDD();
	
	$isUserExists = $bdd->IsUserExists($mail, $password);
	
	if (!$isUserExists)
		die ("Erreur de connexion");

	// Cookie de connection, durée d'expiration d'un an
	$cookie = CryptCookieMail($mail);
	setcookie("log", $cookie, time() + 31556926 , '/');
	$status = $bdd->GetUtilisateurType($mail);
	setcookie("status", $status, time() + 31556926 , '/');
	
	// Redirection
	header('Location: ../');	
	
    ?>
    