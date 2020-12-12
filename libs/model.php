<?php
	class Model {
		protected function __construct() {
			$json_file = file_get_contents("config.json");
			$this -> config = json_decode($json_file, true);
			
			$this -> base_conn('localhost', $this -> config["file_db_conf"]["username"], $this -> config["file_db_conf"]["password"]);
			$create_db = $this -> pdo -> prepare("CREATE DATABASE IF NOT EXISTS ".$this -> config['file_db_conf']['db_name']);
			$use_db = $this -> pdo -> prepare("USE ".$this -> config['file_db_conf']['db_name']);
			if ($create_db->execute()){
				$use_db->execute();
				$file_manager_sql = $this -> pdo -> prepare('');
				$file_manager_sql->execute();
			} else {
				$use_db->execute();
			}
		}
		private function base_conn($servername, $username, $password){
			try {
				$this-> pdo = new PDO("mysql:host=$servername;", $username, $password);
				$this-> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				echo "base-Connection failed: " . $e->getMessage() . "<br>";
			}
		}
	}