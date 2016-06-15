<?php
    if (!isset($_COOKIE["log"]))
  	  header("Location: index.php");

	$css = "style/monthly.css"; 
	$header = "Accueil"; 
	include('include/header.php'); 
	include('include/main.php'); 

	$bdd = new BDD();

	$userData = $bdd->GetUtilisateurData($mail);
	$type = $userData['UTILISATEUR_UTILISATEURTYPE'];

	function WriteLine($nom, $prenom, $mail,$active, $i)
		{
			if ($active) 
				$checked="checked";
			else
				$checked=null;
			echo "  <tr>\n";
			echo "	 <td>\n";
			echo "	 <label class=\"mdl-switch mdl-js-switch mdl-js-ripple-effect\" for= \"switch-$i\">\n";
			echo "	  <input class=\"mdl-switch__input\" type=\"checkbox\" id=\"switch-$i\" name=\"mail\" value=$mail onClick=\"onClickOn($i)\" $checked>\n";
			//echo "   <span class=\"mdl-tooltip\" for=\"switch-$i\">Activer</span>\n";
			echo "	 </label>\n";
			echo "	 </td>\n";
			echo "   <td>$prenom</td>\n";
			echo "   <td>$nom</td>\n";
			echo "   <td>$mail</td>\n";
			
			echo "  </tr>\n";
		}
?>
<br>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

<script>
	function ShowMessage(m)
	{
		var snackbarContainer = document.querySelector('#demo-toast-example');
		var data = {message: m};
		snackbarContainer.MaterialSnackbar.showSnackbar(data);
	}
	
	function onClickOn(i)
	{
		
		
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "activ_compte.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4)
			{
				ShowMessage(xhr.responseText);
							
			}
		}
		
		var n = document.getElementById("switch-"+ i).value;
				
				
		xhr.send("switch=" + n );
	}
</script>
	
<div class="mdl-grid demo-content">

<table class="mdl-data-table mdl-shadow--2dp">
			<thead>
				<tr>
					
					 <th>
					  <!--<div class="mdl-textfield mdl-js-textfield ">	
						<label  for="prenom">Compte Actif</label>
					</div>
					 <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select" for="table-header">
						<input type="checkbox" id="table-header" class="mdl-checkbox__input" />
					  </label>-->
					</th>	
					 					  
					  <th>
						<div class="mdl-textfield mdl-js-textfield ">	
							<label  for="prenom">Prénom</label>
							
						</div>
					  </th>
					  <th>
						<div class="mdl-textfield mdl-js-textfield ">	
							<label for="nom">Nom</label>
							
						</div>
					</th>
					<th>
						<div class="mdl-textfield mdl-js-textfield ">	
							<label for="nom">Nom</label>
							
						</div>
					</th>
					 
				</tr>
			</thead>
			<tbody id="classificationsList">
				<?php 
					$result=$bdd->SelectUtilisateurs();
					$cmp = count($result);
					for($i=0;$i<$cmp;$i++)	
						writeline($result[$i]["UTILISATEUR_NOM"],$result[$i]["UTILISATEUR_PRENOM"],$result[$i]["UTILISATEUR_MAIL"],$result[$i]["UTILISATEUR_ACTIVE"],$i+1);
				
				?>
			</tbody>
		</table>
	
	</div>
	<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
	  <div class="mdl-snackbar__text"></div>
	  <button class="mdl-snackbar__action" type="button"></button>
	</div>
	<?php include('include/footer.php'); ?>