<?php
class Home extends Controller {
	function __construct($params) {
		parent::__construct();

		if (count($params)>=2) {
			header("Location: /home");
		}

		$this -> view -> controller = 'home';
		$this -> view -> title = 'Home';
		$this-> view -> render();
	}
}