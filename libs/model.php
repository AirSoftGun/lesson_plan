<?php
class Model {
	public $time;
	protected function __construct() {
		$json_config_file = file_get_contents("config.json");
		$this->config = json_decode($json_config_file, true);

		$this->time = date('Y-m-d H:i:s');

		$this->base_conn('localhost', $this->config["db_config"]["username"], $this->config["db_config"]["password"]);

		$create_db = $this->pdo->prepare("CREATE DATABASE IF NOT EXISTS " . $this->config['db_config']['db_name']);
		$use_db = $this->pdo->prepare("USE " . $this->config['db_config']['db_name']);
		if ($create_db->execute()) {
			$use_db->execute();
			$file_manager_sql = $this->pdo->prepare('');			//tworzenie tabel
			//$file_manager_sql->execute();
		} else {
			$use_db->execute();
		}
	}
	private function base_conn($servername, $username, $password) {
		try {
			$this->pdo = new PDO("mysql:host=$servername;", $username, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "base-Connection failed: " . $e->getMessage() . "<br>";
			exit;
		}
	}
}