<?php 

	use app\models\Department;

	function debug($txt){
		echo "<pre>";
		print_r($txt);
		echo "</pre>";
	}

	function connect(){
		$db = new mysqli('localhost', 'root', '', 'cardio');
		$db->set_charset('utf8');

		return $db;
	}
	
	function department(){
		$departments = Department::find()->all();

		return $departments;
	}
 ?>