<?php
class controller extends db{

    protected function count_user_new(){
        $fetch = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);

        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $count_pending_user = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_address=? AND acc_type=? AND acc_status=? ");
            $count_pending_user->execute([$fetch_info['acc_address'],"user","Pending"]);
            return $count_pending_user;
        }
        
    }
    protected function fetch_user_info($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? ");
        $stmt->execute([$user_id]);

        return $stmt;
    }
    protected function add_org($org_name,$org_date){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);

        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = "SELECT * FROM tbl_organization WHERE org_name='$org_name' AND org_brgy=?  ";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute([$fetch_info['acc_address']]);
    
            if($stmt_run->rowCount()<=1){
               
                $add_data = "INSERT INTO `tbl_organization`(`org_name`,`org_brgy`,`org_create_date`,`org_status`) 
                VALUES (?,?,?,?)";
                $add_data_run = $this->connect()->prepare($add_data);
                $add_data_run->execute([$org_name,$fetch_info['acc_address'],$org_date,'Pending']);
    
                if($add_data_run){
                    ?>
                        <script>
                            alert("Successfully Added Data");
                            window.location.href="manage-organization.php";
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("There's Something wrong to add data");
                            window.location.href="manage-organization.php";
                        </script>
                    <?php
                }

            }else {
                ?>
                    <script>
                        alert("Data is Already Added");
                        window.location.href="manage-organization.php";
                    </script>
                <?php
            }
        }
    }

    protected function fetch_org($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            if($value == "All"){
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? OR org_brgy=? ");
                $stmt->execute([$fetch_info['acc_address'],'All']);
                if($stmt->rowCount()){
                    return $stmt;
                }else {
                    return false;
                }
            }else {
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy='All' AND org_status=? OR org_brgy=? AND org_status=? ");
                $stmt->execute([$value,$fetch_info['acc_address'],$value]);
                if($stmt->rowCount()){
                    return $stmt;
                }else {
                    return false;
                }
            }
        }

    }

    protected function check_org($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_id=? AND org_brgy=? OR org_id=? AND org_brgy=? ");
            $stmt->execute([$value,$fetch_info['acc_address'],$value,'All']);
            return $stmt;
        }
    }
    
    protected function update_org($org_id,$org_name,$org_date){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);

        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
 
            $update_data = "UPDATE `tbl_organization` SET `org_name`=? ,`org_create_date`=? WHERE org_id=? AND org_brgy=? ";
            $update_data_run = $this->connect()->prepare($update_data);
            $update_data_run->execute([$org_name,$org_date,$org_id,$fetch_info['acc_address']]);
            if($update_data_run){
                ?>
                    <script>
                        alert("Successfully Update Data");
                        window.location.href="manage-organization.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("There's Something wrong to update data");
                        window.location.href="add-organization.php?editOrg=<?=$org_id?>";
                    </script>
                <?php
            }
        }
    }
    protected function delete_org($value){
        $delete_data = $this->connect()->prepare("DELETE FROM `tbl_organization` WHERE org_id=? ");
        $delete_data->execute([$value]);

        if($delete_data){
            ?>
                <script>
                    alert("Successfully Deleted Data");
                    window.location.href="manage-organization.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something wrong to delete data");
                    window.location.href="manage-organization.php";
                </script>
            <?php
        }
    }

    protected function fetch_user($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);

        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            if($value =="All"){
                $stmt = "SELECT * FROM tbl_accounts WHERE acc_address=? AND acc_type=? ";
                $stmt_run = $this->connect()->prepare($stmt);
                $stmt_run->execute([$fetch_info['acc_address'],'user']);
        
                if($stmt_run->rowCount()){
                    return $stmt_run;
                }else{
                    return false;
                }
            }
            else {
                $stmt = "SELECT * FROM tbl_accounts WHERE acc_address=? AND acc_type=? AND acc_status=? ";
                $stmt_run = $this->connect()->prepare($stmt);
                $stmt_run->execute([$fetch_info['acc_address'],'user',$value]);
        
                if($stmt_run->rowCount()){
                    return $stmt_run;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }

    }

    protected function view_user($value){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_admin_id=?";
        $stmt_run = $this->connect()->prepare($stmt);
        $stmt_run->execute([$value]);
        
        return $stmt_run;
    }

    protected function approved_user($value){
        $stmt =$this->connect()->prepare("UPDATE `tbl_accounts` SET acc_status=? WHERE acc_admin_id=? ");
        $stmt->execute(["Approved",$value]);
        
        if($stmt){
            ?>
                <script>
                    alert("Successfully Updated Data");
                    window.location.href="manage-user.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Update Data");
                    window.location.href="manage-user.php";
                </script>
            <?php
        }
    }
    protected function disapproved_user($value){
        $stmt =$this->connect()->prepare("UPDATE `tbl_accounts` SET acc_status=? WHERE acc_admin_id=? ");
        $stmt->execute(["Declined",$value]);
        
        if($stmt){
            ?>
                <script>
                    alert("Successfully Updated Data");
                    window.location.href="manage-user.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Update Data");
                    window.location.href="manage-user.php";
                </script>
            <?php
        }
    }
    
    protected function delete_user($value){
        $stmt = $this->connect()->prepare("DELETE  FROM `tbl_accounts` WHERE acc_admin_id=? ");
        $stmt->execute([$value]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Deleted Data");
                    window.location.href="manage-user.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Delete Data");
                    window.location.href="manage-user.php";
                </script>
            <?php 
        }
    }

    protected function check_org_mem($value){ 
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_name=? AND org_brgy=? OR org_name=? AND org_brgy=?");
            $stmt->execute([$value,$fetch_info['acc_address'],$value,"All"]);

            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    protected function org_mem($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_address=? AND acc_org=? AND acc_type=? AND acc_status=?");
            $stmt->execute([$fetch_info['acc_address'],$value,"user","Approved"]);

            return $stmt;
        }
    }

    protected function add_org_mem($org_name, $org_pos, $org_mem_name){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_oname=? AND  org_mem_brgy=? AND org_mem_name=? AND  org_mem_pos=?");
            $stmt->execute([$org_name,$fetch_info['acc_address'],$org_mem_name,$org_pos]);
            
            if($stmt->rowCount()==1){   
                ?>
                    <script>
                        alert("Data is already Added");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            }else{
                $check = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
                $check->execute([$org_mem_name]);
                if($check->rowCount()==1){
                    $check_info = $check->fetch();
                    $insert_org_mem = $this->connect()->prepare("INSERT INTO `tbl_org_mem`(`org_mem_oname`, `org_mem_brgy`, `org_mem_name_id`,`org_mem_name`, `org_mem_pos`) 
                    VALUES (?,?,?,?,?)");
                    $insert_org_mem->execute([$org_name,$fetch_info['acc_address'],$org_mem_name,$check_info['acc_fname']." ".$check_info['acc_mname']." ".$check_info['acc_lname'],$org_pos]);
    
                    if($insert_org_mem){
                        ?>
                            <script>
                                alert("Successfully Added Data");
                                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert("There's Something Wrong to Added Data");
                                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                            </script>
                        <?php
                    }
                }else{
                    echo "asd";
                }

            }
        }else{
            echo"error";
        }
    }

    protected function fetch_org_mem($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_oname=? AND org_mem_brgy=?");
            $stmt->execute([$value,$fetch_info['acc_address']]);

            if($stmt->rowCount()){
                return $stmt;
            }else{
                return false;
            }
        }
    }


    protected function add_notice($notice_org,$notice_title,$notice_date,$notice_message){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_title=? AND sched_events_date=? AND sched_events_message=? AND sched_events_type=? AND sched_events_address=? AND sched_events_org=? ");
            $stmt->execute([$notice_title,$notice_date,$notice_message,"Brgy Notice",$fetch_info['acc_address'],$notice_org]);
    
            if($stmt->rowCount()==1){
                ?>
                    <script>
                        alert("Already Added Data");
                        window.location.href="add-notice.php";
                    </script>
                <?php
            }else{
                $insert = $this->connect()->prepare("INSERT INTO `tbl_sched_events`(`sched_events_title`, `sched_events_date`, `sched_events_message`, `sched_events_type`,`sched_events_address`,`sched_events_org`) 
                VALUES (?,?,?,?,?,?)");
                $insert->execute([$notice_title,$notice_date,$notice_message,"Brgy Notice",$fetch_info['acc_address'],$notice_org]);
    
                if($insert){
                    ?>
                        <script>
                            alert("Successfully Added Data");
                            window.location.href="manage-notice.php";
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("There's Something Wrong to Added Data");
                            window.location.href="add-notice.php";
                        </script>
                    <?php
                }
            }
        }

    }

    protected function fetch_notice(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? AND sched_events_address=?");
            $stmt->execute(["Brgy Notice",$fetch_info['acc_address']]);
    
            if($stmt->rowCount()>0){
                return $stmt;
            }else{
                return false;
            }
        }
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? ");
        $stmt->execute(["City Notice"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function fetch_update_notice($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=?  AND sched_events_address=?");
            $stmt->execute([$value,"Brgy Notice",$fetch_info['acc_address']]);
    
            if($stmt->rowCount()==1){
                return $stmt;
            }else{
                return false;
            }
        }
    }
    
    protected function update_notice($notice_id,$notice_org,$notice_title,$notice_date,$notice_message){
        $stmt = $this->connect()->prepare("UPDATE `tbl_sched_events` SET `sched_events_title`=? ,`sched_events_date`=? ,`sched_events_message`=? , `sched_events_org`=? WHERE `sched_events_id`=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,$notice_org,$notice_id]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Updating Data");
                    window.location.href="manage-notice.php";
                </script>
            <?php
            }else{
                ?>
                    <script>
                        alert("There's Something Wrong to Update Data");
                        window.location.href="add-notice.php";
                    </script>
                <?php
            }
    }

    protected function delete_notice($value){
        $stmt = $this->connect()->prepare("DELETE FROM `tbl_sched_events` WHERE sched_events_id=?");
        $stmt->execute([$value]);

        if($stmt){
            ?>
            <script>
                alert("Successfully Deleted Data");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("There's Something Wrong to Delete Data");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            }
    }

    protected function fetch_org_non_mem($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_address=? AND acc_org=? AND acc_type=? AND acc_status=? ");
            $stmt->execute([$fetch_info["acc_address"],$value,"user","Approved"]);

            return $stmt;
        }

    }
    protected function fetch_appointment($value){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            if($value == "All"){
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_address=? AND appointment_type=?");
                $stmt->execute([$fetch_info['acc_address'],"BH"]);
                return $stmt;
    
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_address=? AND appointment_type=? AND appointment_status=?");
                $stmt->execute([$fetch_info['acc_address'],"BH",$value]);
                return $stmt;
            }
        }
    }

    protected function showAppointment($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_rand_id=? AND appointment_type=? ");
        $stmt->execute([$value,"BH"]);

        return $stmt;
    }

    protected function accept_appointment($value){
        $stmt = $this->connect()->prepare("UPDATE `tbl_appointment` SET `appointment_status`=? WHERE appointment_rand_id=? AND appointment_type=? ");
        $stmt->execute(['Accept',$value,"BH"]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Updating Data");
                    window.location.href="manage-appointment.php"; 
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("There's Something Wrong to Update Data");
                window.location.href="manage-appointment.php"; 
            </script>
        <?php
        }
    }

    protected function declined_appointment($value){
        $stmt = $this->connect()->prepare("UPDATE `tbl_appointment` SET `appointment_status`=? WHERE appointment_rand_id=? AND appointment_type=?");
        $stmt->execute(['Declined',$value,"BH"]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Updating Data");
                    window.location.href="manage-appointment.php"; 
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("There's Something Wrong to Update Data");
                window.location.href="manage-appointment.php"; 
            </script>
        <?php
        }
    }

    protected function delete_appointment($value){
        $stmt = $this->connect()->prepare("DELETE FROM `tbl_appointment` WHERE appointment_rand_id=? AND appointment_type=? ");
        $stmt->execute([$value,"BH"]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Delete Data");
                    window.location.href="manage-appointment.php"; 
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Delete Data");
                    window.location.href="manage-appointment.php"; 
                </script>
            <?php
        }
    }

    protected function update_user_info($user_id,$profile_img,$fname,$mname,$lname,$birth,$contact,$email,$uname,$cpass,$npass,$check){
        if($profile_img < 0){
            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_uname=? AND acc_email=?");
                $check_info->execute([$user_id,$uname,$email]);
                if($check_info->rowCount()!==1){
                   $check = 1;
                }else{
                $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_phone=?, acc_birth=?, acc_uname=? WHERE acc_admin_id=? ");
                $update_info->execute([$fname,$mname,$lname,$email,$contact,$birth,$uname,$user_id]);
                    $check = 2;
                }
            }else{
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_password=?");
                $check_info->execute([$user_id,md5($cpass)]);
                if($check_info->rowCount()!==1){
                   $check = 3;
                }else{
                    if($npass == ""){
                        $check = 4;
                    }else{
                        $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_phone=?, acc_birth=?, acc_uname=?, acc_password=? WHERE acc_admin_id=? ");
                        $update_info->execute([$fname,$mname,$lname,$email,$contact,$birth,$uname,md5($npass),$user_id]);
                            $check = 2;
                    }
                
                }
            }
        }else{
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($profile_img);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_uname=? AND acc_email=?");
                $check_info->execute([$user_id,$uname,$email]);
                if($check_info->rowCount()!==1){
                   $check = 1;
                }else{
                $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_phone=?, acc_birth=?, acc_uname=?, acc_profile=? WHERE acc_admin_id=? ");
                $update_info->execute([$fname,$mname,$lname,$email,$contact,$birth,$uname,$profile_img,$user_id]);
                    move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file);
                    $check = 2;
                }
            }else{
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_password=?");
                $check_info->execute([$user_id,md5($cpass)]);
                if($check_info->rowCount()!==1){
                   $check = 3;
                }else{
                    if($npass == ""){
                        $check = 4;
                    }else{
                        $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_phone=?, acc_birth=?, acc_uname=?, acc_password=? ,acc_profile=? WHERE acc_admin_id=? ");
                        $update_info->execute([$fname,$mname,$lname,$email,$contact,$birth,$uname,md5($npass),$profile_img,$user_id]);
                            $check = 2;
                    }
                
                }
            }
     }

     if($check == 1){
        ?>
            <script>
                alert("Username / Email exist");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
        <?php
    }
     if($check == 2){
        ?>
            <script>
                alert("Successfull Update Data");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
        <?php
    }
     if($check == 3){
        ?>
            <script>
                alert("Password Not Match");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
        <?php
    }
     if($check == 4){
        ?>
            <script>
                alert("Please Fill in New Password");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
        <?php
    }

    }

    protected function fetch_org_list(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? OR org_brgy=? AND org_status=?");
            $stmt->execute([$fetch_info['acc_address'],"All","Accept"]);
            return $stmt;
        }

    }

    protected function delete_mem($delete_mem_org){
        $stmt = $this->connect()->prepare("DELETE FROM `tbl_org_mem` WHERE org_mem_id=?");
        $stmt->execute([$delete_mem_org]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Deleted");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("There's something wrong. Please try again.");
                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
            </script>
        <?php
        }
    }

    protected function logout_user(){
        $fetch = $this->connect()->prepare("UPDATE tbl_accounts SET acc_active=? WHERE acc_admin_id=? ");
        $fetch->execute(['Not Active',$_SESSION['user_id']]);
        return $fetch;
    }

        protected function fetch_update_service($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=? ");
        $stmt->execute([$value,"Brgy Service"]);

        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function add_service($notice_org,$notice_title,$notice_date,$notice_sponsor,$notice_message){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_title=? AND sched_events_date=? AND sched_events_message=? AND sched_events_type=? AND sched_events_address=? AND sched_events_org=? ");
            $stmt->execute([$notice_title,$notice_date,$notice_message,"Brgy Service",$fetch_info['acc_address'],$notice_org]);

            if($stmt->rowCount()==1){
                ?>
                    <script>
                        alert("Already Added Data");
                        window.location.href="add-notice.php";
                    </script>
                <?php
            }else{
                $insert = $this->connect()->prepare("INSERT INTO `tbl_sched_events`(`sched_events_title`, `sched_events_date`, `sched_events_message`, `sched_events_type`,`sched_events_address`,`sched_events_org`,`sched_events_sponsor`) 
                VALUES (?,?,?,?,?,?,?)");
                $insert->execute([$notice_title,$notice_date,$notice_message,"Brgy Service",$fetch_info['acc_address'],$notice_org,$notice_sponsor]);

                if($insert){
                    ?>
                        <script>
                            alert("Successfully Added Data");
                            window.location.href="manage-service.php";
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("There's Something Wrong to Added Data");
                            window.location.href="add-service.php";
                        </script>
                    <?php
                }
            }
        }
        
    }

    protected function fetch_service(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? AND sched_events_address=?");
            $stmt->execute(["Brgy Service",$fetch_info['acc_address']]);

            if($stmt->rowCount()>0){
                return $stmt;
            }else{
                return false;
            }
        }
    }

    protected function checking_services($services_id){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT sched_events_id,sched_events_title,sched_events_type,sched_events_sponsor FROM tbl_sched_events WHERE sched_events_id=? AND sched_events_type=? AND sched_events_address=?");
            $stmt->execute([$services_id,"Brgy Service",$fetch_info['acc_address']]);

            return $stmt;
        }
        
    }

    protected function fetch_name($name_user){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id LIKE ? AND acc_address=? AND acc_type=? AND acc_status=? OR acc_fname LIKE ? AND acc_address=? AND acc_type=? AND acc_status=? OR acc_mname LIKE ? AND acc_address=? AND acc_type=? AND acc_status=? OR acc_lname LIKE ? AND acc_address=? AND acc_type=? AND acc_status=?  ");
            $stmt->execute(["%".$name_user."%",$fetch_info['acc_address'],"user","Approved","%".$name_user."%",$fetch_info['acc_address'],"user","Approved","%".$name_user."%",$fetch_info['acc_address'],"user","Approved","%".$name_user."%",$fetch_info['acc_address'],"user","Approved"]);
            return $stmt;
        }  
    }

    protected function add_services_user($service_name,$service_sponsor,$add_user_services,$date_get_ser){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $stmt->execute([$add_user_services]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            // Checking if Data exist
            $checking = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_name=? AND ser_rand_id_user=? AND ser_type=?");
            $checking->execute([$service_name,$add_user_services,"Brgy"]);

            if($checking->rowCount()== 1){
                ?>
                    <script>
                        alert("Already Added Data");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            // echo "aa";
            }else{
                // Added Services
                $insert = $this->connect()->prepare("INSERT INTO `tbl_services`(`ser_name`, `ser_rand_id_user`, `ser_user_name`, `ser_date`, `ser_type`, `ser_address`,`ser_sponsor`) 
                VALUES (?,?,?,?,?,?,?)");
                $insert->execute([$service_name,$add_user_services,$row['acc_fname']." ".$row['acc_mname']." ".$row['acc_lname'],$date_get_ser,"Brgy",$row['acc_address'],$service_sponsor]);
                
                if($insert){
                    ?>
                        <script>
                            alert("Successfully Added");
                            window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("There's something wrong. Please try again.");
                            window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                        </script>
                    <?php
                }
            }
        }else{
            ?>
                <script>
                    alert("Error");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }
    }

    protected function fetch_services_user($services_id){
        // fetching tbl_service
        $fetch_service = $this->connect()->prepare("SELECT * FROM tbl_sched_events WHERE sched_events_id=?");
        $fetch_service->execute([$services_id]);

        if($fetch_service->rowCount()==1){
            $fetch_info_service = $fetch_service->fetch();

            $fetch_service_user = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_name=? AND ser_type=? ");
            $fetch_service_user->execute([$fetch_info_service['sched_events_title'],"Brgy"]);
            return $fetch_service_user;
            
        }
    }

    protected function fetch_pre_regis(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $fetch_pre_reg = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_type=? AND pre_election_address=?");
            $fetch_pre_reg->execute(['admin',$row['acc_address']]);
            return $fetch_pre_reg;
        }
        
    }

    protected function add_pre_elect($pre_elect_year,$pre_elect_starting,$pre_elect_end){
         $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $checking = $this->connect()->prepare(
            "SELECT * FROM `tbl_pre_election` WHERE pre_election_year=? AND pre_election_status=? AND pre_election_type=? AND pre_election_address=?"
            );
            $checking->execute([$pre_elect_year,"Pending","admin",$row['acc_address']]);

            if($checking->rowCount()==1){
                ?>
                    <script>
                        alert("Year Election is Already added");
                        window.location.href="<?=$_SERVER["HTTP_REFERER"]?>";
                    </script>
                <?php
            }else{
                $checking_date = $this->connect()->prepare(
                    "SELECT * FROM `tbl_pre_election` WHERE pre_election_statrting=? AND pre_election_type=? AND pre_election_address=? OR pre_election_end=? AND pre_election_type=? AND pre_election_address=?"
                );
                $checking_date->execute([$pre_elect_starting,"admin",$row['acc_address'],$pre_elect_end,"admin",$row['acc_address']]);
        
                if($checking_date->rowCount()==1){
                    ?>
                        <script>
                            alert("Year Election is Already added");
                            window.location.href="<?=$_SERVER["HTTP_REFERER"]?>";
                        </script>
                    <?php
                }else{
                    $stmt = $this->connect()->prepare(
                        "INSERT INTO `tbl_pre_election`(`pre_election_year`, `pre_election_statrting`, `pre_election_end`, `pre_election_status`,`pre_election_type`,`pre_election_address`) 
                        VALUES (?,?,?,?,?,?)"
                    );
                    $stmt->execute([$pre_elect_year,$pre_elect_starting,$pre_elect_end,"Pending","admin",$row['acc_address']]);
            
                    if($stmt){
                        ?>
                            <script>
                                alert("Successfully Added");
                                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert("There's Something Wrong to Add Data");
                                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                            </script>
                        <?php
                    }
                }
            }
        }
    }

    protected function count_candidate_year($year){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_status=?");
        $stmt->execute([$year,$row['acc_address'], "org election"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }
}

    protected function check_pre_regis($date){
         $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $check_start = $this->connect()->prepare(
                "SELECT * FROM `tbl_pre_election` WHERE pre_election_statrting=? AND pre_election_status=? AND pre_election_type=? AND pre_election_address=?"
            );
            $check_start->execute([$date,"Pending","admin",$fetch_info['acc_address']]);

            if($check_start->rowCount()==1){
                    $row = $check_start->fetch();
                    $update_status_start = $this->connect()->prepare("UPDATE `tbl_pre_election` SET `pre_election_status`=? WHERE `pre_election_year`=? AND pre_election_type=? AND pre_election_address=?");
                    $update_status_start->execute(["Start",$row["pre_election_year"],"admin",$fetch_info['acc_address']]);
                    if($update_status_start)
                    {
                        $_SESSION['pre_reg_status'] = "Start";
                        return $update_status_start;
                    }
            }else{
                $check_end = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_end=? AND pre_election_status=? AND pre_election_type=? AND pre_election_address=?");
                $check_end->execute([$date,"Start","admin",$fetch_info['acc_address']]);

                if($check_end->rowCount()==1){
                        $row = $check_end->fetch();
                        $check_sys_def = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_type=? AND pre_election_address=? AND pre_election_sysDef=?");
                        $check_sys_def->execute(["admin",$fetch_info['acc_address'],"Yes"]);
                        if($check_sys_def->rowCount()===1){
                            $update_status_end = $this->connect()->prepare("UPDATE `tbl_pre_election` SET pre_election_status=?,pre_election_period=?, pre_election_sysDef=? WHERE pre_election_year=? AND pre_election_type=? AND pre_election_address=?");
                            $update_status_end->execute(["End","pending","No",$row["pre_election_year"],"admin",$fetch_info['acc_address']]);
                            if($update_status_end)
                            {
                                $_SESSION['pre_reg_status'] = "End";
                                return $update_status_end;
                            }
                        }else{
                            $update_status_end = $this->connect()->prepare("UPDATE `tbl_pre_election` SET pre_election_status=?,pre_election_period=?, pre_election_sysDef=? WHERE pre_election_year=? AND pre_election_type=? AND pre_election_address=?");
                            $update_status_end->execute(["End","Pending","Yes",$row["pre_election_year"],"admin",$fetch_info['acc_address']]);
                            if($update_status_end)
                            {
                                $_SESSION['pre_reg_status'] = "End";
                                return $update_status_end;
                            }
                        }
                        
                }
            }
        }

    }

       protected function delete_pre_reg($value){
        $stmt = $this->connect()->prepare("DELETE FROM `tbl_pre_election` WHERE pre_election_id=?");
        $stmt->execute([$value]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Deleted");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Delete Data");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }
    }

    protected function check_year($year_election){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_year=? AND pre_election_type=?");
        $stmt->execute([$year_election,"admin"]);

        return $stmt;
    }

    protected function brgy_list(){
         $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_organization WHERE org_brgy=? AND org_status=? OR org_brgy=? AND org_status=?");
            $stmt->execute([$fetch_info['acc_address'],"Accept","All","Accept"]);
            return $stmt;
        }
         
    }

    protected function candidate_count($year_election,$org_name){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_org=? AND election_list_status=?");
            $stmt->execute([$year_election,$fetch_info['acc_address'],$org_name,"org election"]);

            if($stmt->rowCount()>0){
                return $stmt;
            }else{
                return false;
            }
        }
        
    }

    protected function fetch_election_list($value,$year){
        $fetch_admin_info = $this->connect()->query("SELECT * FROM tbl_accounts WHERE acc_admin_id='".$_SESSION['user_id']."' ");


        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_org=? AND election_list_status=? ORDER BY election_list_position ASC");
            $stmt->execute([$year,$fetch_info['acc_address'],$value,"org election"]);
            return $stmt;
        }
        
    }

    protected function check_election_period(){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_status=? AND pre_election_type=? AND pre_election_address=?");
            $stmt->execute(["End","admin",$fetch_info['acc_address']]);

            return $stmt;
        }
        
    }

        protected function checking_election_period($election_id){
         $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_id=? AND pre_election_type=? AND pre_election_address=? AND pre_election_sysDef=?");
            $stmt->execute([$election_id,"admin",$fetch_info['acc_address'],"Yes"]);

            if($stmt->rowCount()==1){
                return $stmt;
            }else{
                ?>
                    <script>
                        alert("Please Select As a Sys.Def");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            }
        }
        

    }

    protected function update_status_election($election_id,$election_status){
        $stmt = $this->connect()->prepare("UPDATE tbl_pre_election SET pre_election_period=? WHERE  pre_election_id=?");
        $stmt->execute([$election_status,$election_id]);

        if($stmt){
            switch ($election_status){
                case"Open";
                $_SESSION['election_status'] = "Election Period is Open";
            
                ?>
                    <script>
                        alert("Successfully Updated Data");
                        window.location.href="election-period.php";
                    </script>
                <?php
                break;
                case"Close";
                $_SESSION['election_status'] = "Election Period is Close";
            
                ?>
                    <script>
                        alert("Successfully Updated Data");
                        window.location.href="election-period.php";
                    </script>
                <?php
                break;
                default:
                ?>
                    <script>
                        alert("Successfully Updated Data");
                        window.location.href="election-period.php";
                    </script>
                <?php
            }

        }else{
            ?>
                <script>
                    alert("There's Something Wrong. Please try again.");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }
    }

    protected function count_vote($value,$year,$candidate_id){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_result WHERE election_result_year=? AND election_result_candidates_id=? AND election_result_address=? AND election_result_org=?");
            $stmt->execute([$year,$candidate_id,$fetch_info['acc_address'],$value]);

           if($stmt->rowCount()){
                echo $stmt->rowCount();
           }else{
                echo "0";
           }

        }
        
    }


    protected function change_sys_def($sysDef_id){
     $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $check = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_id=? AND pre_election_type=? AND pre_election_address=?");
            $check->execute([$sysDef_id,"admin",$fetch_info['acc_address']]);
            if($check->rowCount()==1){
                $stmt = $this->connect()->prepare("UPDATE tbl_pre_election SET pre_election_sysDef=? WHERE pre_election_type=? AND pre_election_address=?");
                $stmt->execute(["No","admin",$fetch_info['acc_address']]);

                if($stmt){
                    $change = $this->connect()->prepare("UPDATE tbl_pre_election SET pre_election_sysDef=? WHERE pre_election_id=?");
                    $change->execute(["Yes",$sysDef_id]);
                    ?>
                        <script>
                            alert("Successfully Update Data");
                            window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                        </script>
                    <?php
                }else{
                    return false;
                }
            }else{
               ?>
                <script>window.location.href="<?=$_SERVER['HTTP_REFERER']?>";</script>
               <?php
            }
        }

        
        
    }

    protected function change_admin($value){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT election_list_brgy,election_list_status FROM tbl_election_list WHERE election_list_brgy=? AND election_list_org=?");
            $stmt->execute([$fetch_info['acc_address'],$value]);
            return $stmt;
        }
        
    }


    protected function update_service($notice_id,$notice_org ,$notice_title,$notice_date,$notice_message){
        $stmt = $this->connect()->prepare("UPDATE `tbl_sched_events` SET `sched_events_title`=? ,`sched_events_date`=? ,`sched_events_message`=?, `sched_events_org`=? WHERE `sched_events_id`=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,$notice_org,$notice_id]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Updating Data");
                    window.location.href="manage-service.php";
                </script>
            <?php
            }else{
                ?>
                    <script>
                        alert("There's Something Wrong to Update Data");
                        window.location.href="add-services.php";
                    </script>
                <?php
            }
    }

    protected function count_user($status){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            if($status == "Accept"){
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_address=? AND acc_type=? AND acc_status=? ");
                $stmt->execute([$fetch_info['acc_address'],"user","Approved"]);

                return $stmt;
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_address=? AND acc_type=? AND acc_status=? ");
                $stmt->execute([$fetch_info['acc_address'],"user","Pending"]);

                return $stmt;
            }
            
        }
        
    }

    protected function count_org($status_org){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            if($status_org == "Accept"){
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? AND  org_status=? OR org_brgy=? AND  org_status=? ");
                $stmt->execute([$fetch_info['acc_address'],"Accept","All","Accept"]);

                return $stmt;
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? AND  org_status=? OR org_brgy=? AND  org_status=? ");
                $stmt->execute([$fetch_info['acc_address'],"Pending","All","Pending"]);

                return $stmt;
            }
            
        }
        
    }

    protected function check_ap_today($date){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_appointment WHERE appointment_address=? AND appointment_date=? AND appointment_type=? AND appointment_status=? ");
            $stmt->execute([$fetch_info['acc_address'],$date,"BH","Accept"]);

            return $stmt;
        }
        
    }


    protected function fetch_brgy_serv($acc_id){
        $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
         $fetch_admin_info->execute([$_SESSION['user_id']]);

        if($fetch_admin_info->rowCount()==1){
            $fetch_info = $fetch_admin_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_rand_id_user=? AND ser_type=? AND  ser_address=? ");
            $stmt->execute([$acc_id,"brgy",$fetch_info['acc_address']]);
            return $stmt;
        }
        
    }

        protected function account_info(){
            $fetch_admin_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
             $fetch_admin_info->execute([$_SESSION['user_id']]);

            if($fetch_admin_info->rowCount()==1){
                $fetch_info = $fetch_admin_info->fetch();

                $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_address=?");
                $stmt->execute([$fetch_info['acc_address']]);
                return $stmt;
            }
        }


}


?>