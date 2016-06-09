<?php
if (!isset($_COOKIE["log"]))
	header("Location: index.php");
?>

<?php
	$header = "Formation"; 
	$css="style/timepicker.css";
	$css2="style/messagerie.css";
	$css3="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css";
	include('include/header.php'); 
	include('include/main.php'); 
?>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/timepicker.min.js"></script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	$(function() {
		$('#timepicker').timepicker({ 'scrollDefault': 'now' });
	});
	$(function() {
		$('#timepicker2').timepicker({ 'scrollDefault': 'now' });
	});
</script>
		
<div class="mdl-grid demo-content">
  <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
	<form method="post" action="add_formation.php">
		<p>
			<label for="Nom">Intitulé :</label>
			<input type="text" name="nom" id="nom" placeholder="Nom de la formation" size="40" maxlength="50" /> 
		</p>
		<p>
			<label for="Type">Type :</label>
			<select>
			   <option>1 - Intra-entreprise</option>
			   <option>2 - Inter-entreprise</option>
			   <option selected="selected">3 - Sous-traitance</option>
			</select> 
		</p>
		<p>
			<label for="Type">Classification INSEE :</label>
			<select>
			   <option>1 - Programmation</option>
			   <option>2 - Réseau</option>
			   <option selected="selected">3 - Glandouille</option>
			</select> 
		</p>
		<p>
		<label for="Nom">Date :</label>
			<input type="text" id="datepicker" placeholder="Sélectionner une date">
			<label for="Nom">Durée :</label>
			<input type="number " name="jour" id="nom" placeholder="Nombre de jours" size="20" maxlength="50" />
		</p>
		<p>
			<label for="Nom">Heure de début:</label>
			<input type="text" id="timepicker" name="timepicker" class="timepicker" placeholder="Sélectionner une heure">
			<label for="Nom">Heure de fin:</label>
			<input type="text" id="timepicker2" name="timepicker2" class="timepicker" placeholder="Sélectionner une heure">
		</p>
		<p align="right">
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Ajouter une date" />
		</p>
		<p>
		<label><input type="checkbox" id="cbox1" value="premiere_checkbox"> Formation certifiante</label><br>
		</p>
		<p>
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Choix du client" />
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Ajouter des participants" />
		</p>
		<p align="right">
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Créer" />
		</p>
	</form>
	
  </div>
</div>

<?php include('include/footer.php'); ?>