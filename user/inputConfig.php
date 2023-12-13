<?php

include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['change_profile']) && secured($_POST['function']) == "change_profile"){

		$change_img = $_FILES['change_img']['name'];

		$change_profile = new update();
		$change_profile->changeProfile($change_img);

	}else{
		ob_end_flush(header("Location: index.php"));
	}
}else{	
	return false;
}