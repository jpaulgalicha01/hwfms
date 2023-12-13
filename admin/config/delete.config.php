<?php

class delete extends controller{

	public function deleteAnnouncement($announce_id){

		$stmt = $this->delete_announcement($announce_id);
		if($stmt == 1){
			$_SESSION['message'] = "Successfully deleted data.";
			$_SESSION['message_color'] = "success";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}

		$_SESSION['message'] = "There's something wrong. Please try again";
		$_SESSION['message_color'] = "danger";
		ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
	}

}