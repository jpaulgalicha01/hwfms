<?php

class insert extends controller{
	
	public function insertAnnouncemnt($What,$When,$Who,$Where){
		$stmt = $this->insert_announcemnt($What,$When,$Who,$Where);
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
			$_SESSION['message'] = "Successfully insert data.";
			$_SESSION['message_color'] = "success";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}
	}

}