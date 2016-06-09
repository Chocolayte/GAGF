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
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
			<label class="mdl-textfield__label" for="nom">Intitulé</label>
			<input class="mdl-textfield__input" type="text" name="nom" id="nom" size="40" maxlength="50" /> 
			
		</div>
		</p>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
			<label class="mdl-textfield__label" for="Type">Type</label>
			<select class="mdl-textfield__input" id="Type" name="Type">
				<option value="">&nbsp;
			   <option>1 - Intra-entreprise</option>
			   <option>2 - Inter-entreprise</option>
			   <option selected="selected">3 - Sous-traitance</option>
			</select> 
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
			<label class="mdl-textfield__label" for="insee">Classification INSEE</label>
			<select class="mdl-textfield__input" id="insee" name="insee">
				<option value="">&nbsp;
			   <?php
						$result=$bdd->GetClass();
						$cmp = count($result);
						for($i=0;$i<$cmp;$i++){	
							$value=$result[$i]["CLASSIFICATION_CODE_INSEE"]." - ".$result[$i]["CLASSIFICATION_LIBELLE"];
							echo "<option value=\"$value\">$value</option>";
							}
					?>
			</select> 
		</div>
		<p>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
		<label class="mdl-textfield__label" for="date">Sélectionner Date</label>
			<input class="mdl-textfield__input" type="text" id="datepicker" >
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
			<label class="mdl-textfield__label" for="duree">Durée en jours</label>
			<input class="mdl-textfield__input" type="number " name="jour" id="duree"  size="20" maxlength="50" />
		</div>
		</p>
		<p>
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<label class="mdl-textfield__label" for="timepicker">Sélectionner une heure de début</label>
			<input class="mdl-textfield__input" type="text" id="timepicker" name="timepicker" class="timepicker">
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<label class="mdl-textfield__label" for="timepicker2">Sélectionner une heure de fin</label>
			<input class="mdl-textfield__input" type="text" id="timepicker2" name="timepicker2" class="timepicker">
		</div>
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