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
  
  // PRIVATE FUNCTIONS
  
  // Fonction d'envoi d'une requête
  private function SendRequest($sql) 
  {
    $result = $this->bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  
  // Fonction retournant si une valeur existe
  private function IsDataExists($table, $colonne, $value)
  {
	$sql = "SELECT COUNT($colonne) AS exist FROM $table WHERE $colonne = '$value'";
	$row = $this->SendRequest($sql);
	return $row[0]["exist"] > 0;
  }
  
  // PUBLIC FUNCTIONS
  
  // Fonction pour ajouter un utilisateur
  public function AddUtilisateur($vMail, $vPass, $vNom, $vPrenom, $vType, $vAdresse, $vCodePostal, $vVille, $vTel, $vActive) 
  {
	if(!$this->IsDataExists("UTILISATEUR", "UTILISATEUR_MAIL", "$vMail"))
	{
		$sql = "INSERT INTO UTILISATEUR VALUES(NULL , '$vMail', '$vPass', '$vNom', '$vPrenom', $vType, '$vAdresse', '$vCodePostal', '$vVille', '$vTel', $vActive)";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
  
  // Fonction pour sélectionner tous les utilisateurs
  public function SelectUtilisateurs() 
  {
    $sql = "SELECT * FROM UTILISATEUR";
    return $this->SendRequest($sql);
  }
  
  // Fonction pour obtenir l'accès d'un utilisateur
  public function IsUserExists($mail, $password)
  {
    $sql = "SELECT COUNT(*) AS exist FROM utilisateur WHERE UTILISATEUR_MAIL='$mail' AND UTILISATEUR_MOT_DE_PASSE='$password'";
    $result = $this->SendRequest($sql);
	return $result[0]["exist"] > 0;
  }
  
  // Fonction pour obtenir le type d'un utilisateur
  public function GetUtilisateurType($mail)
  {
	if($this->IsDataExists("utilisateur", "UTILISATEUR_MAIL", $mail))
	{
		$sql = "SELECT UTILISATEUR_UTILISATEURTYPE FROM utilisateur WHERE UTILISATEUR_MAIL='$mail'";
		$this->SendRequest($sql);
		return true;
	}
	return -1;
  }
  
  // Fonction pour obtenir le nom et prénom de l'utilisateur
  public function GetNameUtilisateur($mail) 
  {
	if($this->IsDataExists("utilisateur", "UTILISATEUR_MAIL", $mail)) 
	{
		$sql = "SELECT UTILISATEUR_NOM, UTILISATEUR_PRENOM FROM utilisateur WHERE UTILISATEUR_MAIL='$mail'";
		$result = $this->SendRequest($sql);		
		$array = array(
			"nom" => strtoupper($result[0]["UTILISATEUR_NOM"]), 
			"prenom" => $result[0]["UTILISATEUR_PRENOM"]
		);
		$string = implode(" ", $array);		
		return $string;
	}
  }
  
  // Ajouter une competence
  public function AddCompetence($competence, $bydefault)
  {
	if(!$this->IsDataExists("competence", "COMPETENCE_LIBELLE", $competence))
	{
		$sql = "INSERT INTO COMPETENCE VALUES(NULL, '$competence', $bydefault)";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
  
  // Ajouter un code INSEE
  public function AddInsee($code, $libelle) 
  {
	if(!$this->IsDataExists("classification", "CLASSIFICATION_CODE_INSEE", $code))
	{
		$sql = "INSERT INTO CLASSIFICATION VALUES(NULL, '$code', '$libelle')";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
}
	
?>