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
		$title=$title_query->fetchAll();
		return $title[0]['title'];
	}
}