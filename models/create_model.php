<?php
class Create_model extends Model {
	function __construct() {
		parent::__construct();

		if (isset($_POST['create_button']) && !empty($_POST['plan_name'])){					//validacja
			$status = true;
			while($status){
				$this->plan_url = $this->generate_plan_url();
				$check_query = $this->pdo->prepare("SELECT `url` FROM `plans` WHERE `url`=:url_param");
				$check_query->bindValue(':url_param', $this->plan_url);
				$check_query->execute();
				if (!$check_query->fetch(PDO::FETCH_ASSOC)){
					$status = false;
				}
			}
			$this -> create_plan_in_db();
		}
	}
	private function create_plan_in_db(){
		$this->current_time = date('Y-m-d H:i:s');
		$null = NULL;
		$input_query =  $this->pdo->prepare("INSERT INTO `plans` (`id`, `url`, `title`, `border_color`, `text_color`, `background`, `create_date`, `visits`, `last_visit`) 
											VALUES (NULL, :url_param, :title_param, :border_color_param, :text_color_param, :background_img_param, :current_time_param, '0', NULL)");
		$input_query->bindValue(':url_param', $this->plan_url);
		$input_query->bindValue(':title_param', $_POST['plan_name']);
		$input_query->bindValue(':border_color_param', NULL);
		$input_query->bindValue(':text_color_param', NULL);
		$input_query->bindValue(':background_img_param', NULL);
		$input_query->bindValue(':current_time_param', $this->current_time);

		if ($input_query->execute()) {
			header("Location: /plan/" . $this->plan_url);
		}
	}
	private function generate_plan_url(){
		$random_url = array();
		for ($i=0; $i < 10; $i++) {
			$num = rand(48, 122);
			if(($num < 65 && $num > 57) || ($num > 90 && $num < 97)){
				$i--;
				continue;
			}
			$random_url[] = chr($num);
		}
		return implode($random_url);
	}
}