<?php
	
class BDD {

  var $bdd = null;
  
  function BDD() 
  {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = $_SERVER['SERVER_NAME'] == 'gagf.mypix.ovh' ? 'Sq$pcA9e!!' : 'root';
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
    $sql = "SELECT COUNT(*) AS EXIST FROM UTILISATEUR WHERE UTILISATEUR_MAIL='$mail' AND UTILISATEUR_MOT_DE_PASSE='$password'";
    $result = $this->SendRequest($sql);
	return $result[0]["EXIST"] > 0;
  }
  
  // Fonction pour obtenir le type d'un utilisateur
  public function GetUtilisateurData($mail)
  {
	if($this->IsDataExists("UTILISATEUR", "UTILISATEUR_MAIL", $mail))
	{
		$sql = "SELECT * FROM UTILISATEUR WHERE UTILISATEUR_MAIL='$mail'";
		return $this->SendRequest($sql)[0];
	}
	return null;
  }
  
  // Fonction pour obtenir le type d'un utilisateur
  public function GetUtilisateurDataById($id)
  {
	if($this->IsDataExists("UTILISATEUR", "UTILISATEUR_ID", $id))
	{
		$sql = "SELECT * FROM UTILISATEUR WHERE UTILISATEUR_ID='$id'";
		return $this->SendRequest($sql)[0];
	}
	return null;
  }
  
  // Ajouter une competence
  public function AddCompetence($competence, $bydefault)
  {
	if(!$this->IsDataExists("COMPETENCE", "COMPETENCE_LIBELLE", $competence))
	{
		$sql = "INSERT INTO COMPETENCE VALUES(NULL, '$competence', $bydefault)";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
  
  // Supp une competence
  public function SuppCompetence($competence)
  {
	if($this->IsDataExists("COMPETENCE", "COMPETENCE_LIBELLE", $competence))
	{
		$sql = "DELETE FROM `COMPETENCE` WHERE COMPETENCE_LIBELLE='$competence'";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }

	// obtention des classification
	public function GetClass()
	{
	  $sql = "SELECT * FROM CLASSIFICATION ORDER BY CLASSIFICATION_CODE_INSEE";
	return $this->SendRequest($sql);
	
	}
	
	// obtention des compétences
	public function GetComp()
	{
		$sql = "SELECT * FROM COMPETENCE";
		return $this->SendRequest($sql);
	
	}

  // Ajouter une conversation privée
  public function AddConversation($subject, $mail_emetteur, $mail_destinataire)
  {
	$sql = "INSERT INTO CONVERSATION VALUES(
			  NULL
			, '$subject'
			, (SELECT UTILISATEUR_ID FROM UTILISATEUR WHERE UTILISATEUR_MAIL = '$mail_emetteur')
			, (SELECT UTILISATEUR_ID FROM UTILISATEUR WHERE UTILISATEUR_MAIL = '$mail_destinataire')
			, CURRENT_TIMESTAMP()
			, 1
			, 0)";
	$this->SendRequest($sql);
	return $this->bdd->lastInsertId();
  }
  
  // Retourne une conversation privée
  public function GetConversations($mail_emetteur)
  {
	$sql = "SELECT 
				  C.CONVERSATION_ID
				, C.CONVERSATION_TITRE
				, C.CONVERSATION_DATE
				, C.CONVERSATION_UTILISATEUR1
				, C.CONVERSATION_UTILISATEUR1_LU
				, C.CONVERSATION_UTILISATEUR2
				, C.CONVERSATION_UTILISATEUR2_LU
			FROM 
				CONVERSATION AS C
			WHERE 
				   CONVERSATION_UTILISATEUR1 = (SELECT UTILISATEUR_ID FROM UTILISATEUR WHERE UTILISATEUR_MAIL = '$mail_emetteur')
				OR CONVERSATION_UTILISATEUR2 = (SELECT UTILISATEUR_ID FROM UTILISATEUR WHERE UTILISATEUR_MAIL = '$mail_emetteur')";
	$result = $this->SendRequest($sql);
	return $result;
  }
  
  // Ajouter un message dans une conversation privée
  public function AddMessage($conversationID, $mail_emetteur, $message)
  {
	$sql = "INSERT INTO MESSAGE VALUES(
			  NULL
			, '$conversationID'
			, (SELECT UTILISATEUR_ID FROM UTILISATEUR WHERE UTILISATEUR_MAIL = '$mail_emetteur')
			, '$message'
			, CURRENT_TIMESTAMP())";
	$this->SendRequest($sql);
	return true;
  }
  
  // Retourne les messages d'une conversation
  public function GetMessages($id)
  {
	$sql = "SELECT * FROM MESSAGE WHERE MESSAGE_CONVERSATION = '$id'";
	$result = $this->SendRequest($sql);
	return $result;
  }
  

  // Ajouter un code INSEE
  public function AddInsee($code, $libelle) 
  {
	if(!$this->IsDataExists("CLASSIFICATION", "CLASSIFICATION_CODE_INSEE", $code))
	{
		$sql = "INSERT INTO CLASSIFICATION VALUES(NULL, '$code', '$libelle')";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
  
  // Supp un code INSEE
  public function SuppInsee($code) 
  {
	if($this->IsDataExists("CLASSIFICATION", "CLASSIFICATION_CODE_INSEE", $code))
	{
		$sql = "DELETE FROM `classification` WHERE CLASSIFICATION_CODE_INSEE='$code'";
		$this->SendRequest($sql);
		return true;
	}
	return false;
  }
  
  //Inversion d'une valeur booléen
  public function InverseBool($table,$coloneTest,$valueTest,$bool)
  {
	  if($this->IsDataExists($table, $coloneTest, $valueTest))
	{
		$sql = "UPDATE $table SET $bool = NOT($bool) where $coloneTest = '$valueTest'";
		$this->SendRequest($sql);
		$sql ="SELECT $bool FROM $table where $coloneTest = '$valueTest'";
		return $this->SendRequest($sql);
    }
	return (-1);
  }
 //count une variable 
   public function CountSql($table, $colonne, $value)
  {
	$sql = "SELECT COUNT($colonne) AS total FROM $table WHERE $colonne = '$value'";
	$row = $this->SendRequest($sql);
	return $row[0]["total"];
  }
}


?>