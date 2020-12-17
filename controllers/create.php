<?php
	class Create extends Controller {
		function __construct($params) {
			parent::__construct();

			require_once 'models/create_model.php';
			$this -> model = new Create_model();

			if (count($params)>=2) {
				header("Location: /create");
			}

			$this -> view -> controller = 'create';
			$this -> view -> render();
		}
	}
?>