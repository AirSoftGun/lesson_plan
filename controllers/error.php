<?php
	class Error_404 extends Controller {
		function __construct() {
			parent::__construct();
			$this->view->controller='error';
			$this->view->title = 'ERROR';
			$this->view->render();
		}
	}
?>