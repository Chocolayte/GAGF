<?php
if (!isset($_COOKIE["log"]))
	header("Location: index.php");
?>

<?php 

$css = "style/messagerie.css";
$css2 = "style/statistiques.css";
$header = "Conversation";
include('include/header.php'); 
include ('include/main.php');

function WriteLine($name, $message, $date)
{
	echo "  <tr>\n";
	echo "   <td>$name</td>\n";
	echo "   <td>$message</td>\n";
	echo "   <td>$date</td>\n";
	echo "  </tr>\n";
}

$mail_login = DecryptCookieMail($_COOKIE['log']);
$conversationId = htmlspecialchars($_GET['id']);

$personnalID = $bdd->GetUtilisateurData($mail_login)['UTILISATEUR_ID'];
$messages = $bdd->GetMessages($conversationId);

echo '<table class="responstable" >';
echo '<tbody><tr>';
echo '  <th width="200">Utilisateur</th>';
echo '  <th>Message</th>';
echo '  <th width="200">Date</th>';
echo '</tr>';

foreach ($messages as &$value)
{
  $userData = $bdd->GetUtilisateurDataById($value['MESSAGE_EMETTEUR']);
  $userName = $userData['UTILISATEUR_PRENOM'].' '.$userData['UTILISATEUR_NOM'];
  WriteLine($userName, $value['MESSAGE_CONTENU'], $value['MESSAGE_DATE_ENVOI']); 
}

echo '</tbody></table>';

?>

<div style="margin-top:50px">
			<div class="container">
				<div class="panel panel-default" style="margin:0 auto">
					<div class="panel-heading">
						<h2 class="panel-title">Répondre</h2>
					</div>
					<div class="panel-body">
						<form name="contactform" method="post" action="create_message.php" class="form-horizontal" role="form">
						<input style="display:none" name="conversation" value="<?php echo $conversationId; ?>"></input>
							<div class="form-group">
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="message" required="required" placeholder="Votre message"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Envoyer" data-upgraded=",MaterialButton,MaterialRipple"></input>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		
<?php include('include/footer.php'); ?>