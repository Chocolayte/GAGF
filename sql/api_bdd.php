<?php

class BDD {

  var $bdd = null;
  
  function BDD() 
  {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = 'root';
    $dbname = 'gagf' ;
  
	try {
      $this->bdd = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpassword");
    }
    catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }
  
  // Fonction pour ajouter un utilisateur
  function addUtilisateur($vID,$vMail,$vPass,$vNom,$vPrenom,$vType,$vAdresse,$vCodePostal,$vVille,$vTel,$vActive) {
  	$sql_req = "INSERT INTO UTILISATEUR VALUES(".$vID.",'".$vMail."','".$vPass."','".$vNom."','".$vPrenom."',".$vType.",'".$vAdresse."','".$vCodePostal."','".$vVille."','".$vTel."',".$vActive.");";
    $this->sendRequest($sql_req);
  }
  
  // Fonction pour sélectionner tous les utilisateurs
  function selectUtilisateurs() {
    $sql_req = "SELECT * FROM UTILISATEUR";
    $this->sendRequest($sql_req);
  }
  
  // Fonction d'envoi d'une requête
  function sendRequest($req) {
    $reqReturn = $this->bdd->query($req);
    print_r($reqReturn->fetchAll(PDO::FETCH_ASSOC));
    return $reqReturn->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function dataExist($table, $colonne, $test)
  {
	$sql = "SELECT COUNT($colonne) AS dejaexistant FROM $table WHERE $colonne = '$test'";
	$req = $this->bdd->query($sql);
	$row = $req->fetchAll(PDO::FETCH_ASSOC);
	return($row[0]["dejaexistant"] >0);
  }
  
  function AddCompetence($competence, $bydefault)
  {
	if(!$this->dataExist("competence", "COMPETENCE_LIBELLE", "$competence")){
		$sql = "INSERT INTO COMPETENCE VALUES(NULL, '$competence', $bydefault)";
		//echo $sql;
		$this->bdd->query($sql);
		return true;
	}
	else return false;
  }
  function AddInsee($code, $libelle)
  {
	if(!$this->dataExist("classification", "CLASSIFICATION_CODE_INSEE", "$code")){
		$sql = "INSERT INTO CLASSIFICATION VALUES(NULL, '$code', '$libelle')";
		echo $sql;
		$this->bdd->query($sql);
		return true;
	}
	else return false;
  }
}
	
?>