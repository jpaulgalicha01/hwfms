<?php
class fetch extends controller{
    public function loggin($uname,$pass){
        $loggin = $this->login($uname, $pass);
        if($loggin){
           while($fetch = $loggin->fetch()){
            if ($fetch['acc_type'] == "admin") {

                $_SESSION['user_id'] = $fetch['acc_admin_id'];
                $_SESSION['user_type'] = $fetch['acc_type'];
                $_SESSION['user_fname'] = $fetch['acc_fname'];
                $_SESSION['user_mname'] = $fetch['acc_mname'];
                $_SESSION['user_lname'] = $fetch['acc_lname'];
                header("Location: super_admin/index.php");

            } 
            elseif ($fetch['acc_type'] == "sub_admin") {
                $user_id = $fetch['acc_admin_id'];
                $this->acc_active($user_id);
                
                $_SESSION['user_id'] = $fetch['acc_admin_id'];
                $_SESSION['user_type'] = $fetch['acc_type'];
                $_SESSION['user_brgy'] = $fetch['acc_address'];
                $_SESSION['user_fname'] = $fetch['acc_fname'];
                $_SESSION['user_mname'] = $fetch['acc_mname'];
                $_SESSION['user_lname'] = $fetch['acc_lname'];
                header("Location: admin/index.php");
            } 
            elseif ($fetch['acc_type'] == "user") {

                if ($fetch['acc_status'] == "Pending") {

                    $_SESSION['decline'] = 'Please Wait to Accept your Account by admin';
                    $_SESSION['icon'] = 'info';
                    $_SESSION['title'] = 'Wait!!';
                    // $_SESSION['pending'] = 'Please Wait to Accept your Account';
                    header('location: index.php');

                } else if ($fetch['acc_status'] == "Decline") {

                    $_SESSION['decline'] = 'Sorry to Inform you that your account are decline by admin';
                    $_SESSION['icon'] = 'error';
                    $_SESSION['title'] = 'Decline';
                    header('location: index.php');
                    // echo "Your account decline by the admin";

                } else {
                    // echo"user";
                    $user_id = $fetch['acc_admin_id'];
                    $this->acc_active($user_id);
                    $_SESSION['user_id'] = $fetch['acc_admin_id'];
                    $_SESSION['user_type'] = $fetch['acc_type'];
                    $_SESSION['user_fname'] = $fetch['acc_fname'];
                    $_SESSION['user_mname'] = $fetch['acc_mname'];
                    $_SESSION['user_lname'] = $fetch['acc_lname'];
                    header("Location: user/index.php");

                }
            }
           }
        }
        else{
            $_SESSION['decline'] = 'Wrong Username & Password';
            $_SESSION['icon'] = 'error';
            $_SESSION['title'] = 'Failed';
            header('location: index.php');
        }
    }

    public function fetchOrg($value){
        $stmt = $this->fetch_org($value);
        if($stmt->rowCount()){
            return $stmt;
        }else{
            return false;
        }
    }

    public function resetEmail($email_add){
        $stmt = $this->reset_email($email_add);
        
        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $status="";
            $email = $row['acc_email'];
            $acc_id = $row['acc_admin_id'];
            $acc_otp = $row['acc_otp'];
            require 'reset_pass_mail.php';

            switch($status){
                case "1";
                $_SESSION['decline'] = 'Please check the message on your email address';
                $_SESSION['icon'] = 'success';
                $_SESSION['title'] = 'Reset Password';
                ?>
                <script>
                  swal({
                      title: "<?php echo $_SESSION['title']?>",
                      text: "<?php echo $_SESSION['decline']?>",
                      icon: "<?php echo $_SESSION['icon']?>",
                      button: "OK",
                  });             
                </script>
                    <form class="pt-3" id="verify_otp">
                    <input type="hidden" name="function" value="verify_otp">
                    <input type="hidden" name="acc_id" value="<?=$acc_id?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" placeholder="OTP Code" required="true" name="otp_code">
                    </div>
                    <span id="err_msg" class="text-danger"></span>
                    <div class="mt-3">
                      <button class="btn btn-success btn-block loginbtn" type="submit">
                        <span >Submit Otp</span>
                      </button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="icon-social-home mr-2"></i>Back Home </a>
                    </div>
                  </form>
                <?php
                unset($_SESSION['decline']);
                break;
                default:
                $_SESSION['decline'] = 'Failed';
                $_SESSION['icon'] = 'error';
                $_SESSION['title'] = "There's Something Wrong. Please try again";
                ?>
                <script>
                  swal({
                      title: "<?php echo $_SESSION['title']?>",
                      text: "<?php echo $_SESSION['decline']?>",
                      icon: "<?php echo $_SESSION['icon']?>",
                      button: "OK",
                  });             
                </script>
                    <form class="pt-3" id="reset_pass">
                    <input type="hidden" name="function" value="reset_pass">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true" name="email_add">
                    </div>
                    <div class="mt-3">
                      <button class="btn btn-success btn-block loginbtn" type="submit" id="spinner">
                        <span >Reset Password</span>
                      </button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="icon-social-home mr-2"></i>Back Home </a>
                    </div>
                  </form>
                <?php
                unset($_SESSION['decline']);
            }

        }else{
            $_SESSION['decline'] = 'Email Address Not Found';
            $_SESSION['icon'] = 'error';
            $_SESSION['title'] = 'Not Found';
            ?>
            <script>
                  swal({
                      title: "<?php echo $_SESSION['title']?>",
                      text: "<?php echo $_SESSION['decline']?>",
                      icon: "<?php echo $_SESSION['icon']?>",
                      button: "OK",
                  });             
                </script>
                  <form class="pt-3" id="reset_pass">
                    <input type="hidden" name="function" value="reset_pass">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true" name="email_add">
                    </div>
                    <div class="mt-3">
                      <button class="btn btn-success btn-block loginbtn" type="submit" id="spinner">
                        <span >Reset Password</span>
                      </button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="icon-social-home mr-2"></i>Back Home </a>
                    </div>
                  </form>
            <?php
                unset($_SESSION['decline']);
        }
    }

    public function checkAccId($acc_id,$otp_code){
        $stmt = $this->check_acc_id($acc_id,$otp_code);

        if($stmt->rowCount()!==1){
            header("Location: index.php");
        }else{
            return $stmt;
        }
    }

    public function verifyOtp($acc_id,$otp_code){
        $stmt = $this->verify_otp($acc_id,$otp_code);
        if($stmt->rowCount()==1){
            $data = [
                'status' => 200,
                'acc_id' => $acc_id,
                'otp_code' => $otp_code,
            ];
            echo json_encode($data);
            return false;
         }else{
            $data = [
                'status' => 404,
                'message' => "OTP Code Not Match"
            ];
            echo json_encode($data);
            return false;
         }
    }
}
?>