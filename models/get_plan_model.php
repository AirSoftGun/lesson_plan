<?php
class Get_model extends Model {
	function __construct() {
		parent::__construct();
	}

	function plan_exist($url) {
		$check_query = $this->pdo->prepare("SELECT `url` FROM `plans` WHERE `url`=:url_param");
		$check_query->bindValue(':url_param', $url);
		$check_query->execute();
		if ($check_query->fetchAll()) {
			return true;
		} else {
			return false;
		}
	}

	function get_title($url) {
		$title_query = $this->pdo->prepare("SELECT title FROM plans WHERE url = :plan_url");
		$title_query->bindValue(':plan_url', $url);
		$title_query->execute();
		$title = $title_query->fetchAll();
		return $title[0]['title'];
	}

	function current_week() {
		$week=date('W');
		if($this->config['week_correct'] == true) {
			$week += 1;
		}
		if($week % 2 == 0) {
			return 2; //even week
		}
		return 1; //odd week
	}

	function get_plan_data(){
		$get_plan_query = $this->pdo->prepare("SELECT * from lessons");
		$get_plan_query->execute();

		return $get_plan_query->fetchAll();
	}

	function update_last_visit_date($url){
		$update_query = $this->pdo->prepare("UPDATE plans SET last_visit = :time WHERE url = :plan_url");
		$update_query->bindValue(':plan_url', $url);
		$update_query->bindValue(':time', $this->time);
		$update_query->execute();
	}
}