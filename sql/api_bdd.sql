<?php

class BDD {

  var $bdd;
  
  function BDD() 
  {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = 'Sq$pcA9e!!';
    $dbname = 'gagf' ;
  
	try {
      $this->bdd = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpassword");
    }
    catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }
  
  function AddUtilisateur()
  {
	$sql = 'INSERT INTO UTILISATEUR VALUES("")';
	$bdd->query($sql);
  }
	
?>