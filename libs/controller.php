<?php
	class Controller {
		function __construct(){
			$this -> view = new View();
		
			//print_r($_GET);
			
			// if (session_status()===1){
			// 	session_name('login_session');
			// 	session_start();
			// }
		}
	}