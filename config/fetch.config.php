<?php

class fetch extends controller{

	public function fetchBrgy(){
		$stmt = $this->fetch_brgy();
		return $stmt;
	}

	public function accLogin($acc_uname,$acc_pass){
		$stmt = $this->acc_login($acc_uname,$acc_pass);

		// Not Valid Credentials
		if($stmt->rowCount() < 1){
			$_SESSION['message'] = "Username/Password are not valid";
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location:".$_SERVER['HTTP_REFERER'].""));
		}

		// Valid Credentails 
		while ($fetch = $stmt->fetch()) {

			switch ($fetch['acc_type']) {
				case 'super-admin':

					setcookie('user_id', $fetch['acc_rand_id'],2147483647);
					setcookie('user_type', $fetch['acc_type'],2147483647);

					ob_end_flush(header("Location: super-admin/index.php"));
					break;
				case 'admin':

					setcookie('user_id', $fetch['acc_rand_id'],2147483647);
					setcookie('user_type', $fetch['acc_type'],2147483647);

					ob_end_flush(header("Location: admin/index.php"));
					break;
				

				default:
					if($fetch['acc_status'] == "Accept"){
						setcookie('user_id', $fetch['acc_rand_id'],2147483647);
						setcookie('user_type', $fetch['acc_type'],2147483647);

						ob_end_flush(header("Location: user/index.php"));
					}elseif($fetch['acc_status'] == "Declined"){
						$_SESSION['message'] = "I'm sorry but your account has declined by admin";
						$_SESSION['message_color'] = "danger";
						ob_end_flush(header("Location:".$_SERVER['HTTP_REFERER'].""));
					}else{
						$_SESSION['message'] = "Please wait to accept your account by admin.";
						$_SESSION['message_color'] = "info";
						ob_end_flush(header("Location:".$_SERVER['HTTP_REFERER'].""));
					}
					break;
			}
		}
	}

	public function fetchOrg($brgy_list){
		$stmt = $this->fetch_org($brgy_list);
		return $stmt;
	}
}