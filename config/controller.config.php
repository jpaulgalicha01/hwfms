<?php

class controller extends db
{
    protected function login($uname, $pass)
    {
        $checkingInfo = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_uname=? AND acc_password=? ");
        $checkingInfo->execute([$uname,md5($pass)]);

        if($checkingInfo->rowCount()==1){
            return $checkingInfo;
        }else{
            return false;
        }
    }

    protected function acc_active($user_id){
        $active_user = $this->connect()->prepare("UPDATE tbl_accounts SET acc_active=? WHERE acc_admin_id=?");
        $active_user->execute(["Active",$user_id]);

        return $active_user;
    }

    protected function create_acount($profile_img, $fname, $mname, $lname, $email, $phone, $birthdate, $address,$org, $uname, $password)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_img);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            ?>
            <script>
                window.alert("Please select format JPG,PNG,JPEG");
                window.location.href = "register.php";
            </script>
            <?php
        } else {
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_fname=? AND acc_mname=? AND acc_lname=? AND acc_email=? ";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute([$fname,$mname,$lname,$email]);

            if ($stmt_run->rowCount() == 1) {
                ?>  
                <script>
                    alert("Already Added Data");
                    window.location.href = "register.php";
                </script>
                <?php
            } else {
                $exist_uname = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_email=? OR acc_uname=?");
                $exist_uname->execute([$email,$uname]);

                if($exist_uname->rowCount()>=1){
                    ?>
                        <script type="text/javascript">
                            alert("Username / Email Address is Already Added");
                            window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                        </script>
                    <?php
                }else{
                    $add_user = "INSERT INTO `tbl_accounts`(`acc_admin_id`, `acc_fname`, `acc_mname`, `acc_lname`, `acc_email`, `acc_phone`,  `acc_birth`, `acc_address`,`acc_org`, `acc_uname`, `acc_password`,`acc_profile`,`acc_type`,`acc_status`,`acc_check`) 
                    VALUES ('" . rand() . "','$fname','$mname','$lname','$email','$phone','$birthdate','$address','$org','$uname','" . md5($password) . "','$profile_img','user','Pending','Not View')";
                    $add_user_run = $this->connect()->query($add_user);

                    if ($add_user_run) {
                        move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file);
                        $_SESSION['decline'] = 'Please wait to accept your account by admin. Thank you!';
                        $_SESSION['icon'] = 'info';
                        $_SESSION['title'] = '';
                        header('location: index.php');
                    } else {
                        ?>
                        <script>
                            alert("There's Something Wrong to Add Data");
                            window.location.href = "register.php";
                        </script>
                        <?php
                    }
                }
            }
        }


    }

    protected function fetch_org($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? AND org_status=? OR org_brgy=? AND org_status=? ");
        $stmt->execute([$value,"Accept","All","Accept"]);

        return $stmt;
    }

    protected function reset_email($email_add){
        $this->connect()->query("UPDATE tbl_accounts SET acc_otp='".rand(111111,999999)."' WHERE acc_email='$email_add' ");
        $stmt = $this->connect()->prepare(
            "SELECT * FROM `tbl_accounts` WHERE acc_email=? "
        );
        $stmt->execute([$email_add]);
        return $stmt;
    }

    protected function check_acc_id($acc_id,$otp_code){
        $stmt = $this->connect()->prepare(
            "SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_otp=?"
        );
        $stmt->execute([$acc_id,$otp_code]);

        return $stmt;
    }

    protected function verify_otp($acc_id,$otp_code){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? AND acc_otp=?");
        $stmt->execute([$acc_id,$otp_code]);

        return $stmt;
    }

    protected function change_pass($acc_id,$npass){
        $stmt = $this->connect()->prepare("UPDATE `tbl_accounts` SET `acc_password`=?,`acc_otp`=? WHERE `acc_admin_id`=?");
        $stmt->execute([md5($npass),NULL,$acc_id]);
        
        return $stmt;
    }
}
?>