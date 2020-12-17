<?php
	class View {
		function __construct(){}

		public function Render(){
			// require_once 'Views/Header.php';
			// require_once 'Views/Navbar.php';
			require_once 'views/head.php';
			require_once 'views/' . $this -> controller . '_view.php';
			// require_once 'Views/Footer.php';
		}
	}