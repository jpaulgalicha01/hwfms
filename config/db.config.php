<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','chmsu');

class db {

    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    public function connect(){
        try{
            $getconn = "mysql:host=".$this->db_host."; dbname=".$this->db_name;
            $connection = new PDO($getconn,$this->db_user,$this->db_pass);
            // $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            if($connection){
                return $connection;
            }else{
                $connection="";
                return $connection;
            }

        }catch(PDOException $error){
            die("ERROR: ".$error->getMessage());
        }
    }
}

?>