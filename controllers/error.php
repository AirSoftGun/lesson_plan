<?php
	class Error_404 extends Controller {
		function __construct() {
			parent::__construct();
			// $this -> view -> controller = 'home';
			// $this-> view -> title = 'Home';
			// $this-> view -> render();
			echo '404 page not found';
			//print_r($params);
		}
	}
?>