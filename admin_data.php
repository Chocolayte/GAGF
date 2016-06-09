<?php
  if (!isset($_COOKIE["log"]))
	header("Location: index.php");
?>

<?php //admin_data.php 
	$header = "Gestion des données";
	function WriteLine($code, $libelle, $i)
		{
			echo "  <tr>\n";
			echo "	 <td>\n";
			echo "	 <label class=\"mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select\" for= \"row[$i]\">\n";
			echo "	 <input type=\"checkbox\" id=\"row[$i]\" data-line=\"$i\" class=\"mdl-checkbox__input\" name=\"code[]\" value=$code />\n";
			echo "	 </label>\n";
			echo "	 </td>\n";
			echo "   <td class=\"mdl-data-table__cell--non-numeric\">$libelle</td>\n";
			echo "   <td>$code</td>\n";
			echo "  </tr>\n";
		}
?>

<?php include('include/header.php'); ?>
<?php include ('include/main.php'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>

	function ShowMessage(m)
	{
		var snackbarContainer = document.querySelector('#demo-toast-example');
		var data = {message: m};
		snackbarContainer.MaterialSnackbar.showSnackbar(data);
	}
	
	function onClickAdd()
	{
		url = 'add_code_insee.php';
		
		var libelle = document.querySelector('#libelle').value;
		var code = document.querySelector('#code').value;

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "add_code_insee.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4)
			{
				ShowMessage(xhr.responseText);
				
				if (xhr.responseText == "Classification de formation ajoutée avec succès")
					{ window.location.replace("admin_data.php");  }
			}
		}
		xhr.send("libelle=" + libelle + "&code=" + code);
	}
	
	function onClickAddc()
	{
		url = 'add_competence.php';
		
		var competence = document.querySelector('#competence').value;
		
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "add_competence.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4)
			{
				ShowMessage(xhr.responseText);
			}
		}
		xhr.send("competence=" + competence );
	}
	
	function onClickSuppc()
	{
		url = 'supp_competence.php';
		
		var competence = document.querySelector('#competence2').value;

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "supp_competence.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4)
			{
				ShowMessage(xhr.responseText);
				if (xhr.responseText == "Compétence supprimée avec succès")
					{ window.location.replace("admin_data.php");  }
				
			}
		}
			
		xhr.send("competence2=" + competence );
	}
   

	function onClickSuppr()
	{
		url = 'supp_code_insee.php';
		
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "supp_code_insee.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4)
			{
				ShowMessage(xhr.responseText);
				
				if (xhr.responseText == "Classification de formation supprimée avec succès")
					{ window.location.replace("admin_data.php");  }
			}
		}
		
		var n = $( "input:checked" );
		var params = "";
		for (i = 0; i < n.length; i++)
			params += "row" + i + "=" + n[i]["defaultValue"] + "&";
		params = params.substring(0, params.length - 1);
		
		xhr.send(params);
	}
	
	</script>

 <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
          
			<p>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
				<label class="mdl-textfield__label" for="Competence">Nom de la compétence</label>
				<input class="mdl-textfield__input" type="text" name="competence" id="competence" size="40" maxlength="50" required="required"/>
				</div>
				
				<button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--icon" type="submit" onClick="onClickAddc()">
							<i class="material-icons">add</i>
						</button>
						
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
				<label class="mdl-textfield__label" for="Competence2">Nom de la compétence</label>
				    <select class="mdl-textfield__input" id="competence2" name="competence2">
					<?php
						$result=$bdd->GetComp();
						$cmp = count($result);
						for($i=0;$i<$cmp;$i++){	
							$value=$result[$i]["COMPETENCE_LIBELLE"];
							echo "<option value=\"$value\">$value</option>";
							}
					?>
					</select>
				<!--<input class="mdl-textfield__input" type="text" name="competence" id="competence" size="40" maxlength="50" required="required"/>-->
				</div>
				<button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--icon" type="submit" onClick="onClickSuppc()">
							<i class="material-icons">delete</i>
						</button>
			</p>
			
			
			<p align="left">
			<br />
			<br />
			<br />
			
			<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
			  <div class="mdl-snackbar__text"></div>
			  <button class="mdl-snackbar__action" type="button"></button>
			</div>
			
			</p>
			
          </div>
    </div>
	<div class="mdl-grid demo-content">
          
        <!--  <form method="post" action="add_code_insee.php">
			<p>
				<label for="Code">Code INSEE :</label>
				<input type="text" name="code" id="code" placeholder="Ex : 125" size="40" maxlength="3" required="required"/>
				<br />
				<label for="libelle">Libellé INSEE :</label>
				<input type="text" name="libelle" id="libelle" placeholder="Ex : Linguistique" size="40" maxlength="100" required="required"/>
				<input class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" type="submit" value="+" />
			</p>
		</form>-->
		


		<table class="mdl-data-table mdl-shadow--2dp">
			<thead>
				<tr>
					
					 <th>
					  <!--<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select" for="table-header">
						<input type="checkbox" id="table-header" class="mdl-checkbox__input" />
					  </label>-->
					</th>	
					  <th class="mdl-data-table__cell--non-numeric ">
						<div class="mdl-textfield mdl-js-textfield ">	
							<label class="mdl-textfield__label" for="libelle">Libellé INSEE...</label>
							<input class="mdl-textfield__input" type="text" name="libelle" id="libelle" required="required" />
						</div>
					  </th>
					  <th>
						<div class="mdl-textfield mdl-js-textfield ">	
							<label class="mdl-textfield__label" for="Code">Code INSEE...</label>
							<input class="mdl-textfield__input" type="text" name="code" id="code" maxlength="3" required="required" /></th>
						</div>
						<button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--icon" type="submit" onClick="onClickAdd()">
							<i class="material-icons">add</i>
						</button>
					 
				</tr>
			</thead>
			<tbody id="classificationsList">
				
					<?php 
						$result=$bdd->GetClass();
						$cmp = count($result);
			 			for($i=0;$i<$cmp;$i++)	
							writeline($result[$i]["CLASSIFICATION_CODE_INSEE"],$result[$i]["CLASSIFICATION_LIBELLE"],$i+1);
					?>
					<button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--icon" type="submit" onClick="onClickSuppr()">
							<i class="material-icons">delete</i>
					</button>
			
			</tbody>
		</table>
			<p align="left">
			<br />
			<br />
			<br />
			</p>
          </div>
     </div>

<?php include('include/footer.php'); ?>