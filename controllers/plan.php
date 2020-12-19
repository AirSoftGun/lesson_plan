<?php
class Plan extends Controller {
	function __construct($params) {
		parent::__construct();

		if (count($params)<2 || count($params)>2) {
			$this->view->title = "ERROR";
			$this->view->controller = 'error';
			$this->view->render();
		}

		require_once 'models/get_plan_model.php';
		$this->model = new Get_model();

		if($this->model->plan_exist($params[1])){
			$this->view->controller = 'plan';
			$plan_title = $this->model->get_title($params[1]);
			$this->view->title = 'Plan lekcji ► ' . $plan_title . ' ◄ dawidgac.pl';
			$this->view->plan_title = $plan_title;
			$this->view->render();
		} else {
			$this->view->title = "ERROR";
			$this->view->controller = 'error';
			$this->view->render();
		}
	}
}