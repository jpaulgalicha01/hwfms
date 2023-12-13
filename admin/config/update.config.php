<?php

class update extends controller{

	public function updateStatus($user_id,$status_select){
		$stmt = $this->update_status($user_id,$status_select);
		if(!$stmt){
			$data = [
				'message' => "Failed to update"
			];
			echo json_encode($data);
		}else{
			$data = [
				'status' => 200,
				'message' => "Success"
			];
			echo json_encode($data);
		}

		
	}
}