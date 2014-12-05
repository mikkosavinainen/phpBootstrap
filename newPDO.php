<?php
require_once "new.php";
class newPDO {
	private $db;
	private $count;
	function __construct($dsn = "mysql:host=localhost;dbname=spottings", $username = "root", $password = "salainen") {
		// Connect to db
		$this->db = new PDO ( $dsn, $username, $password );
		
		// Debug errors
		$this->db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		// SQL injection prevention
		$this->db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
		$this->count = 0;
	}
	function getCount() {
		return $this->count;
	}
	public function allSpottings() {
		$sql = "SELECT spotting_id, name, whereItHappend, specialCharacteristics, role, language, whatHappend
				FROM spotting";
		
		// Prepare statement
		if (! $statement = $this->db->prepare ( $sql )) {
			$error = $this->db->errorInfo ();
			
			throw new PDOException ( $error [2], $error [1] );
		}
		
		// Run statement
		if (! $statement->execute ()) {
			$error = $statement->errorInfo ();
			
			throw new PDOException ( $error [2], $error [1] );
		}
		
		$result = array ();
		
		while ( $row = $statement->fetchObject () ) {
			// Create object from result
			$new = new newSpotting ();
			
			$new->setspottingId ( $row->spotting_id );
			$new->setName ( utf8_encode ( $row->name ) );
			$new->setwhereItHappend ( utf8_encode ( $row->whereItHappend ) );
			$new->setSpecialCharacteristics ( $row->specialCharacteristics );
			$new->setLanguage ( $row->language );
			$new->setWhatHappend ( utf8_encode ( $row->whatHappend ) );
			$new->setRole ( $row->role );
			
			$result [] = $new;
		}
		
		$this->count = $statement->rowCount ();
		
		return $result;
	}
	public function getAll($name) {
		$sql = "SELECT spotting_id, name, whereItHappend, specialCharacteristics, role, language, whatHappend
				FROM spotting
				WHERE name like :name";
		// Prepare statement
		if (! $statement = $this->db->prepare ( $sql )) {
			$error = $this->db->errorInfo ();
			throw new PDOException ( $error [2], $error [1] );
		}
		
		// Bind parameters
		$na = "%" . utf8_decode ( $name ) . "%";
		$statement->bindValue ( ":name", $na, PDO::PARAM_STR );
		
		// Run statement
		if (! $statement->execute ()) {
			$error = $statement->errorInfo ();
			
			if ($error [0] == "HY093") {
				$error [2] = "Invalid parameter";
			}
			
			throw new PDOException ( $error [2], $error [1] );
		}
		
		$result = array ();
		
		while ( $row = $statement->fetchObject () ) {
			// Create object from result
			$new = new newSpotting ();
			
			$new->setSpottingId ( $row->spotting_id );
			$new->setName ( utf8_encode ( $row->name ) );
			$new->setwhereItHappend ( utf8_encode ( $row->whereItHappend ) );
			$new->setSpecialCharacteristics ( utf8_encode ( $row->specialCharacteristics ) );
			$new->setLanguage ( utf8_encode ( $row->language ) );
			$new->setWhatHappend ( utf8_encode ( $row->whatHappend ) );
			$new->setRole ( utf8_encode ( $row->role ) );
			
			$result [] = $new;
		}
		
		$this->count = $statement->rowCount ();
		
		return $result;
	}
	function addSpotting($new) {
		$sql = "INSERT INTO spotting (name, whereItHappend, specialCharacteristics, role, language, whatHappend)
		        values (:name, :whereItHappend, :specialCharacteristics, :role, :language, :whatHappend)";
		
		// Prepare statement
		if (! $statement = $this->db->prepare ( $sql )) {
			$error = $this->db->errorInfo ();
			throw new PDOException ( $error [2], $error [1] );
		}
		
		// Bind parameters
		$statement->bindValue ( ":name", utf8_decode ( $new->getName () ), PDO::PARAM_STR );
		$statement->bindValue ( ":whereItHappend", utf8_decode ( $new->getwhereItHappend () ), PDO::PARAM_STR );
		$statement->bindValue ( ":specialCharacteristics", utf8_decode ( $new->getSpecialCharacteristics () ), PDO::PARAM_STR );
		$statement->bindValue ( ":role", utf8_decode ( $new->getRole () ), PDO::PARAM_STR );
		$statement->bindValue ( ":language", utf8_decode ( $new->getLanguage () ), PDO::PARAM_STR );
		$statement->bindValue ( ":whatHappend", utf8_decode ( $new->getWhatHappend () ), PDO::PARAM_STR );
		
		// Run INSERT
		if (! $statement->execute ()) {
			$error = $statement->errorInfo ();
			
			if ($error [0] == "HY093") {
				$error [2] = "Invalid parameter";
			}
			throw new PDOException ( $error [2], $error [1] );
		}
		
		$this->count = 1;
		
		return $this->db->lastInsertId ();
	}
}
?>