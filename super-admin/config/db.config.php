<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","hwfms");

class db{
	private $DB_HOST = DB_HOST;
	private $DB_USER = DB_USER;
	private $DB_PASS = DB_PASS;
	private $DB_NAME = DB_NAME;

	public function connect(){
		try {
			$conn = "mysql:host=".$this->DB_HOST."; dbname=".$this->DB_NAME;
			$connect = new pdo($conn,$this->DB_USER,$this->DB_PASS);
			$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $connect;
		} catch (PDOException $error) {
			die("ERROR MESSAGE: ".$error->getMessage());
		}
	}
}