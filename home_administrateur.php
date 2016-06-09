<?php 
	$header = "Accueil";
	function WriteLine($nom, $prenom, $mail,$active, $i)
		{
			if ($active) 
				$checked="checked";
			else
				$checked=null;
			echo "  <tr>\n";
			echo "	 <td>\n";
			echo "	 <label class=\"mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select\" for= \"row[$i]\">\n";
			echo "	 <input type=\"checkbox\" id=\"row[$i]\" data-line=\"$i\" class=\"mdl-checkbox__input\" name=\"mail[]\" value=$mail $checked>\n";
			echo "	 </label>\n";
			echo "	 </td>\n";
			echo "   <td>$prenom</td>\n";
			echo "   <td>$nom</td>\n";
			echo "   <td>$mail</td>\n";
			
			echo "  </tr>\n";
		}
?>
<?php include('include/header.php'); ?>
<?php include ('include/main.php'); ?>
	
<div class="mdl-grid demo-content">

<table class="mdl-data-table mdl-shadow--2dp">
			<thead>
				<tr>
					
					 <th>
					 <div class="mdl-textfield mdl-js-textfield ">	
						<label  for="prenom">Compte Actif</label>
					</div>
					  <!--<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select" for="table-header">
						<input type="checkbox" id="table-header" class="mdl-checkbox__input" />
					  </label>-->
					</th>	
					 					  
					  <th >
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
					<button id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" type="submit" onClick="onClickSuppr()">
							<i class="material-icons">done</i>
					</button>
			
			</tbody>
		</table>
	</div>
	<?php include('include/footer.php'); ?>