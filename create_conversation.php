<?php

	include('sql/api_bdd.php');
	include('utils/cipher.php');

	if (count($_POST) != 3)
		die("Formulaire invalide");

	foreach (array("mail", "sujet", "message") as $field)
	{
		if (!isset($_POST[$field]))
			die("Le champs $field n'est pas renseigné");
	}
	
	$mail_emetteur = DecryptCookieMail($_COOKIE['log']);
	$mail_destinataire = htmlspecialchars($_POST['mail']);
	$subject = htmlspecialchars($_POST['sujet']);
	$message = htmlspecialchars($_POST['message']);

	$bdd = new BDD();
	
	$idConv = $bdd->AddConversation($subject, $mail_emetteur, $mail_destinataire);
	$bdd->AddMessage($idConv, $mail_emetteur, $message);
	
	header("Location: messagerie.php");
	
?>