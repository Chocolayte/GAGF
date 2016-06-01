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
  
  function AddCompetence($competence, $bydefault)
  {
	$sql = "INSERT INTO COMPETENCE VALUES(NULL, '$competence', $bydefault)";
	echo $sql;
	$this->bdd->query($sql);
  }
}
	
?>