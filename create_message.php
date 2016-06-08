<?php

	include('sql/api_bdd.php');
	include('utils/cipher.php');

	if (count($_POST) != 2)
		die("Formulaire invalide");

	foreach (array("conversation", "message") as $field)
	{
		if (!isset($_POST[$field]))
			die("Le champs $field n'est pas renseigné");
	}
	
	$mail_emetteur = DecryptCookieMail($_COOKIE['log']);
	$idConv = htmlspecialchars($_POST['conversation']);
	$message = htmlspecialchars($_POST['message']);

	$bdd = new BDD();
	
	$bdd->AddMessage($idConv, $mail_emetteur, $message);
	
	header("Location: conversation.php?id=$idConv");
	
?>