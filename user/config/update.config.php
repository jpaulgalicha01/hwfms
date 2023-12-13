<?php

class update extends controller{


	public function changeProfile($change_img){
		$stmt = $this->change_profile($change_img);

		if(!$stmt){
			$_SESSION['message'] = "There's something wrong. Please try again";
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));

		}
		if($stmt !== 1){
			$_SESSION['message'] = $stmt;
			$_SESSION['message_color'] = "info";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));

		}
		else{
			$_SESSION['message'] = "Successfully update data.";
			$_SESSION['message_color'] = "success";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}
	}

}