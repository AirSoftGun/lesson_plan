<?php
class Router {
	function __construct(){
		$this -> request = $_GET['url'];
		$this -> request = rtrim($this -> request, '/');
		$this -> params = explode("/", $this -> request);

		$this-> controller = $this -> params[0];

		$this-> controller = strtolower($this-> controller);

		if($this-> controller == 'index.php'){
			$this-> controller = 'home';
		}

		$file = 'controllers/' . $this-> controller . '.php';
		if(file_exists($file)){
			require_once $file;
			//nazwa zmiennej
			$this-> controller = new $this -> controller($this-> params);
		} else {
			$file = 'controllers/error.php';
			require_once $file;
			$this-> controller = 'error_404';
			$this-> controller = new $this -> controller();
		}
	}
}