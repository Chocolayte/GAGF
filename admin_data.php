
<?php //admin_data.php 
session_start();
?>
<?php include('include/header.php'); ?>
<?php include ('include/main.php'); ?>


 <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
          <form method="post" action="add_competence.php">
			<p>
				<label for="Competence">Nom de la compétence :</label>
				<input type="text" name="competence" id="competence" placeholder="Ex : Utilisation d'outils bureautiques" size="40" maxlength="50" />
				<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Ajouter" />
			</p>
			</form>
			
			<p align="left">
			<br />
			<br />
			<br />
			<?php
				//echo $_SESSION['competence'];
				if (isset($_SESSION['competence'])){
					
					if ($_SESSION['competence']) { 
						echo "Compétence ajoutée avec succès";
						}
					if (!$_SESSION['competence']) {
						echo "Compétence déjà existente";
						}
				}
				unset($_SESSION['competence']);
			?>
			</p>
			
          </div>
    </div>
	<div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
          <form method="post" action="add_code_insee.php">
			<p>
				<label for="Code">Code INSEE :</label>
				<input type="text" name="code" id="code" placeholder="Ex : 125" size="40" maxlength="3" />
				<br />
				<label for="libelle">Libellé INSEE :</label>
				<input type="text" name="libelle" id="libelle" placeholder="Ex : Linguistique" size="40" maxlength="100" />
				<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Ajouter" />
			</p>
		</form>
		
			<p align="left">
			<br />
			<br />
			<br />
			<?php
				//echo $_SESSION['competence'];
				if (isset($_SESSION['insee'])){
					
					if ($_SESSION['insee']) { 
						echo "Classification de formation ajoutée avec succès";
						}
					if (!$_SESSION['insee']) {
						echo "Classification de formation déjà existente";
						}
				}
				unset($_SESSION['insee']);
			?>
			</p>
          </div>
     </div>

<?php include('include/footer.php'); ?>