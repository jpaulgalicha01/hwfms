<?php

class delete extends controller{

	public function deleteOrg($org_id){
		$stmt = $this->delete_org($org_id);

		if(!$stmt){
			$_SESSION['message'] = "There's something wrong to delete data. Please try again.";
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}
		$_SESSION['message'] = "Successfully deleted data.";
		$_SESSION['message_color'] = "success";
		ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));	
	}

	public function deleteAdmin($admin_id){
		$stmt = $this->delete_admin($admin_id);

		if(!$stmt){
			$_SESSION['message'] = "There's something wrong to delete data. Please try again.";
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}
		$_SESSION['message'] = "Successfully deleted data.";
		$_SESSION['message_color'] = "success";
		ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));	
	}

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