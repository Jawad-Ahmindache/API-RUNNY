<?php
class db {
 private $dbhost = 'localhost'; //ou IP du serveur SlimAPI
 private $dbuser = 'runny';
 private $dbpass = 'endurance93';
 private $dbname = 'runny';
 public function connect() {
 $prepare_conn_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
 $dbConn = new PDO( $prepare_conn_str, $this->dbuser, $this->dbpass );
 $dbConn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 return $dbConn;
 }
}
?>