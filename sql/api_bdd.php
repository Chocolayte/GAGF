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
}
	
?>