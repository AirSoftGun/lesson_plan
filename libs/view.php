<?php
	class View {
		function __construct(){}

		public function Render(){
			// require_once 'Views/Header.php';
			// require_once 'Views/Navbar.php';
			require_once 'views/' . $this -> controller . '/main_view.php';
			// require_once 'Views/Footer.php';
		}
	}