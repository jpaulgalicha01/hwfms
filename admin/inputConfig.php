<?php
include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD']=="POST" || $_SERVER['REQUEST_METHOD']=="GET"){
	if(isset($_POST['user_id']) && isset($_POST['status_select'])){
		$user_id = $_POST['user_id'];
		$status_select = $_POST['status_select'];

		$update_status = new update();
		$update_status->updateStatus($user_id,$status_select);
	}elseif(isset($_POST['add_announcement']) && secured($_POST['function']) == "add_announcement"){
		$What = secured($_POST['inputWhat']);
		$When = secured($_POST['inputWhen']);
		$Who = secured($_POST['inputWho']);
		$Where = secured($_POST['inputWhere']);

		$insert_announcement = new insert();
		$insert_announcement->insertAnnouncemnt($What,$When,$Who,$Where);
	}elseif($_GET['delete_announce']){
		$announce_id = secured($_GET['delete_announce']);

		$delete_announcement = new delete();
		$delete_announcement->deleteAnnouncement($announce_id);

	}else{
		ob_end_flush(header("Location: index.php"));
	}
}else{
echo "error";

}
