<?php
class newSpotting {
	public static $errorList = array (
			- 1 => "Unknown error",
			0 => "",
			
			10 => "Name of player is too short",
			11 => "Name of player is too long",
			
			20 => "Description of area is required",
			21 => "Area name can only contain a-zA-Z and space",
			22 => "Area name is too short",
			23 => "Area name is too long",
			
			30 => "Description of what happened is required",
			31 => "Description is too short",
			32 => "Description is too long",
			33 => "Description can only contain a-z and A-Z.,-",
			
			40 => "Language is too short",
			41 => "Language is too long",
			42 => "Language can only contain letters",
			
			50 => "Description of player is too short",
			51 => "Description of player is too long",
			52 => "Description can only contain a-zA-Z , and space" 
	);
	public static function getError($errorcode) {
		if (isset ( self::$errorList [$errorcode] ))
			return self::$errorList [$errorcode];
		
		return self::$errorList [- 1];
	}
	private $name;
	private $whereItHappend;
	private $specialCharacteristics;
	private $role;
	private $language;
	private $whatHappend;
	private $spottingId; // Added because of database
	function __construct($name = "", $whereItHappend = "", $specialCharacteristics = "", $role = "", $language = "", $whatHappend = "", $spottingId = 0) {
		$this->name = trim ( $name );
		$this->whereItHappend = trim ( $whereItHappend );
		$this->specialCharacteristics = trim ( $specialCharacteristics );
		$this->role = $role;
		$this->language = trim ( $language );
		$this->whatHappend = trim ( $whatHappend );
		$this->spottingId = $spottingId;
	}
	public function setName($name) {
		$this->name = trim ( $name );
	}
	public function getName() {
		return $this->name;
	}
	public function checkName($required = false, $min = 1, $max = 30) {
		if ($required == false && strlen ( $this->name ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->name ) == 0)
			return 0;
		
		if (strlen ( $this->name ) < $min)
			return 10;
		
		if (strlen ( $this->name ) > $max)
			return 11;
		
		return 0;
	}
	public function setwhereItHappend($whereItHappend) {
		$this->whereItHappend = trim ( $whereItHappend );
	}
	public function getwhereItHappend() {
		return $this->whereItHappend;
	}
	public function checkwhereItHappend($required = true, $min = 3, $max = 50) {
		if ($required == false && strlen ( $this->whereItHappend ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->whereItHappend ) == 0)
			return 20;
		
		if (strlen ( $this->whereItHappend ) < $min)
			return 22;
		
		if (strlen ( $this->whereItHappend ) > $max)
			return 23;
		
		if (preg_match ( "/[^a-zA-Z\- ]/", $this->whereItHappend ))
			return 21;
		
		return 0;
	}
	public function setSpecialCharacteristics($specialCharacteristics) {
		$this->specialCharacteristics = trim ( $specialCharacteristics );
	}
	public function getSpecialCharacteristics() {
		return $this->specialCharacteristics;
	}
	public function checkSpecialCharacteristics($required = false, $min = 5, $max = 100) {
		if ($required == false && strlen ( $this->specialCharacteristics ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->specialCharacteristics ) == 0)
			return 0;
		
		if (strlen ( $this->specialCharacteristics ) < $min)
			return 50;
		
		if (strlen ( $this->specialCharacteristics ) > $max)
			return 51;
		
		if (preg_match ( "/[^a-zA-Z\-\._,' ]/", $this->specialCharacteristics ))
			return 52;
		
		return 0;
	}
	public function setRole($role) {
		$this->role = $role;
	}
	public function getRole() {
		return $this->role;
	}
	public function checkRole() {
		return 1;
	}
	public function setLanguage($language) {
		$this->language = trim ( $language );
	}
	public function getLanguage() {
		return $this->language;
	}
	public function checkLanguage($required = false, $min = 2, $max = 20) {
		if ($required == false && strlen ( $this->language ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->language ) == 0)
			return 0;
		
		if (strlen ( $this->language ) < $min)
			return 40;
		
		if (strlen ( $this->language ) > $max)
			return 41;
		
		if (preg_match ( "/[^a-zA-Z\- ]/", $this->language ))
			return 42;
		
		return 0;
	}
	public function setWhatHappend($whatHappend) {
		$this->whatHappend = trim ( $whatHappend );
	}
	public function getWhatHappend() {
		return $this->whatHappend;
	}
	public function checkWhatHappend($required = true, $min = 5, $max = 500) {
		if ($required == false && strlen ( $this->whatHappend ) == 0)
			return 0;
		
		if ($required == true && strlen ( $this->whatHappend ) == 0)
			return 30;
		
		if (strlen ( $this->whatHappend ) < $min)
			return 31;
		
		if (strlen ( $this->whatHappend ) > $max)
			return 32;
		
		if (preg_match ( "/[^a-zA-Z\-\._,' \s+]/", $this->whatHappend ))
			return 33;
		
		return 0;
	}
	public function setspottingId($spottingId) {
		$this->spottingId = $spottingId;
	}
	
	public function getspottingId() {
		return $this->spottingId;
	}
}

?>