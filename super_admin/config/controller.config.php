<?php

class controller extends db{

    protected function fetch_active_user($brgy_name){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_address=? AND acc_type=? AND acc_status=? AND acc_active=?");
        $stmt->execute([$brgy_name,"user","Approved","Active"]);
        return $stmt;
    }

    protected function brgy_list(){
        $stmt = $this->connect()->query("SELECT * FROM tbl_brgy");
        return $stmt; 
    }
    protected function fetch_user_info($user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? ");
        $stmt->execute([$user_id]);

        return $stmt;
    }
    protected function add_admin_user($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$uname,$password){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($profile_img);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Exist Admin 
        $exist_brgy_admin = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_address=? AND acc_type=?");
        $exist_brgy_admin->execute([$address,"sub_admin"]);
        if($exist_brgy_admin->rowCount()==1){
            ?>
             <script>
                 alert("Only 1 admin each Barangay");
                 window.location.href="add-admin.php";
             </script>
            <?php
        }else
            {
                // Exit Email Address
                $check_email_exist = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_email=? OR acc_uname=?");
                $check_email_exist->execute([$email,$uname]);
                if($check_email_exist->rowCount()>=1){
                    echo $check_email_exist->rowCount();
                    ?>
                        <script>
                            alert("Username / Email Address is Already Added");
                            window.location.href="add-admin.php";
                        </script>
                    <?php
                }else{
                    
                    if($imageFileType !== 'png' && $imageFileType !=='jpeg' && $imageFileType !=='jpeg'){
                            ?>
                                <script type="text/javascript">
                                    alert("Please select JPEG,PNG, and JPG img file type");
                                </script>
                            <?php
                        }else{
                            $add_user = "INSERT INTO `tbl_accounts`(`acc_admin_id`, `acc_fname`, `acc_mname`, `acc_lname`, `acc_email`, `acc_phone`,  `acc_birth`, `acc_address`, `acc_uname`, `acc_password`,`acc_profile`,`acc_type`) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                        $add_user_run = $this->connect()->prepare($add_user);
                        $add_user_run->execute([rand(),$fname,$mname,$lname,$email,$phone,$birthdate,$address,$uname,md5($password),$profile_img,'sub_admin']);
            
                        if($add_user_run){
                            move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file);
                            ?>
                                <script>
                                    alert("Successfully Added Data");
                                    window.location.href="manage-admin.php";
                                </script>
                            <?php
                        }else {
                            ?>
                                <script>
                                    alert("There's Something Wrong to Add Data");
                                    window.location.href="add-admin.php";
                                </script>
                            <?php
                        }
                    }
                }
            }
    }

    protected function fetch_admin($value){
        if($value =="All"){
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_type=? ORDER BY acc_address ASC ";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute(['sub_admin']);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else{
                return false;
            }
        }
        else {
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_type=?  AND acc_address=? ";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute(['sub_admin',$value]);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else{
                return false;
            }
        }
    }

    protected function view_admin($value){
        $stmt = "SELECT * FROM tbl_accounts WHERE acc_admin_id=?";
        $stmt_run = $this->connect()->prepare($stmt);
        $stmt_run->execute([$value]);
            $this->connect()->query("UPDATE tbl_accounts SET acc_check='View' WHERE acc_admin_id='$value' ");
        return $stmt_run;
    }

    protected function count_user_new(){
        $stmt = $this->connect()->query("SELECT * FROM tbl_accounts WHERE acc_type='user' AND acc_status='Approved' AND acc_check='Not View'");
        return $stmt;
    }

    protected function delete_admin_user($value){
        $stmt = $this->connect()->prepare("DELETE FROM `tbl_accounts` WHERE acc_admin_id=? ");
        $stmt->execute([$value]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Deleted Data");
                    window.location.href="manage-admin.php";
                </script>
            <?php
        }
    }

    protected function add_org($org_name,$org_date,$address){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_name=? AND org_brgy=?");
        $stmt->execute([$org_name,$address]);

        if($stmt->rowCount()==1){
            ?>
                <script>
                    alert("Already Added Data");
                     window.location.href="add-organization.php";
                </script>
            <?php
        }else{
            $add_org = $this->connect()->prepare("INSERT INTO `tbl_organization`(`org_name`, `org_brgy`, `org_create_date`, `org_status`) 
            VALUES (?,?,?,?)");
            $add_org->execute([$org_name,$address,$org_date,"Accept"]);

            if($add_org){
                ?>
                    <script>
                        alert("Successfully Added Data");
                         window.location.href="manage-organization.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("There's Something Wront to Add Data");
                         window.location.href="add-organization.php";
                    </script>
                <?php
            }
        }
    }

    protected function fetch_org($org_brgy,$org_status){
        if($org_brgy == "All"){
            if($org_status == "All"){
                $stmt = $this->connect()->query("SELECT * FROM `tbl_organization` ");
    
                if($stmt->rowCount()){
                    return $stmt;
                }else{
                    false;
                }
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_status=? ");
                $stmt->execute([$org_status]);
    
                if($stmt->rowCount()){
                    return $stmt;
                }else{
                    false;
                }
            }
        }else{
            if($org_status == "All"){
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization`WHERE org_brgy=? OR org_brgy=? ");
                $stmt->execute([$org_brgy,"All"]);
    
                if($stmt->rowCount()){
                    return $stmt;
                }else{
                    false;
                }
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? AND org_status=? OR org_brgy=? AND org_status=? ");
                $stmt->execute([$org_brgy,$org_status,"All",$org_status]);
    
                if($stmt->rowCount()){
                    return $stmt;
                }else{
                    false;
                }
            }
        }
    }

    protected function check_org($value){

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_id=? ");
            $stmt->execute([$value]);
            return $stmt;
        
    }

    protected function update_org($org_id,$org_name,$org_date,$brgy){
 
            $update_data = "UPDATE `tbl_organization` SET `org_name`=? ,`org_brgy`=?, `org_create_date`=? WHERE org_id=? ";
            $update_data_run = $this->connect()->prepare($update_data);
            $update_data_run->execute([$org_name,$brgy,$org_date,$org_id]);
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

    protected function accept_org($value){
        $stmt = $this->connect()->prepare("UPDATE `tbl_organization` SET org_status=? WHERE org_id=? ");
        $stmt->execute(['Accept',$value]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Update Data");
                    window.location.href="manage-organization.php";
                </script>
            <?php  
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Update Data");
                    window.location.href="manage-organization.php";
                </script>
            <?php 
        }
    }

    protected function declined_org($value){
        $stmt = $this->connect()->prepare("UPDATE `tbl_organization` SET org_status=? WHERE org_id=? ");
        $stmt->execute(['Declined',$value]);

        if($stmt){
            ?>
                <script>
                    alert("Successfully Update Data");
                    window.location.href="manage-organization.php";
                </script>
            <?php  
        }else{
            ?>
                <script>
                    alert("There's Something Wrong to Update Data");
                    window.location.href="manage-organization.php";
                </script>
            <?php 
        }
    }

    protected function add_notice($notice_title,$notice_date,$notice_message){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_title=? AND sched_events_date=? AND sched_events_message=? AND sched_events_type=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,"City Notice"]);

        if($stmt->rowCount()==1){
            ?>
                <script>
                    alert("Already Added Data");
                    window.location.href="add-notice.php";
                </script>
            <?php
        }else{
            $insert = $this->connect()->prepare("INSERT INTO `tbl_sched_events`(`sched_events_title`, `sched_events_date`, `sched_events_message`, `sched_events_type`) 
            VALUES (?,?,?,?)");
            $insert->execute([$notice_title,$notice_date,$notice_message,"City Notice"]);

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

    protected function fetch_notice(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? ");
        $stmt->execute(["City Notice"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function fetch_update_notice($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=? ");
        $stmt->execute([$value,"City Notice"]);

        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function update_notice($notice_id,$notice_title,$notice_date,$notice_message){
        $stmt = $this->connect()->prepare("UPDATE `tbl_sched_events` SET `sched_events_title`=? ,`sched_events_date`=? ,`sched_events_message`=? WHERE `sched_events_id`=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,$notice_id]);

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

    protected function fetch_user($value_brgy,$value){
        if($value_brgy =="All"){
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_type=? AND acc_status=?";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute(['user','Approved']);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else{
                return false;
            }
        } else if($value =="All"){
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_address=? AND acc_type=? AND acc_status=?";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute([$value_brgy,'user','Approved']);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else{
                return false;
            }
        }
        else {
            $stmt = "SELECT * FROM tbl_accounts WHERE acc_type=?  AND acc_address=? AND acc_org=? AND acc_status=? ";
            $stmt_run = $this->connect()->prepare($stmt);
            $stmt_run->execute(['user',$value_brgy,$value,'Approved']);
    
            if($stmt_run->rowCount()){
                return $stmt_run;
            }else{
                return false;
            }
        }
    }

    protected function fetch_appointment($value){
        if($value == "All"){
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_type=?");
            $stmt->execute(['CH']);
            return $stmt;

        }else{
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_type=? AND appointment_status=?");
            $stmt->execute(["CH",$value]);
            return $stmt;
        }
    }

    protected function showAppointment($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_rand_id=? AND appointment_type=? ");
        $stmt->execute([$value,"CH"]);

        return $stmt;
    }

    protected function accept_appointment($value){
        $stmt = $this->connect()->prepare("UPDATE `tbl_appointment` SET `appointment_status`=? WHERE appointment_rand_id=? AND appointment_type=? ");
        $stmt->execute(['Accept',$value,"CH"]);

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
        $stmt->execute(['Declined',$value,"CH"]);

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
        $stmt->execute([$value,"CH"]);

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

    protected function fetch_org_list($value_brgy){
        if($value_brgy !== "All"){
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_brgy=? AND org_status=? OR org_brgy=? AND org_status=? ");
            $stmt->execute([$value_brgy,"Accept","All","Accept"]);

            return $stmt;
        }
    }

    protected function update_user_info($user_id,$profile_img,$fname,$mname,$lname,$email,$uname,$cpass,$npass,$check){
        if($profile_img < 0){
            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_uname=? AND acc_email=? AND acc_type=? OR acc_type=?");
                $check_info->execute([$uname,$email,"sub_admin","user"]);
                if($check_info->rowCount()==1){
                   $check = 1;
                }else{
                $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_uname=? WHERE acc_admin_id=? ");
                $update_info->execute([$fname,$mname,$lname,$email,$uname,$user_id]);
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
                        $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_uname=?, acc_password=? WHERE acc_admin_id=? ");
                        $update_info->execute([$fname,$mname,$lname,$email,$uname,md5($npass),$user_id]);
                            $check = 2;
                    }
                
                }
            }
        }else{
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($profile_img);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_uname=? AND acc_email=? AND acc_type=? OR acc_type=?");
                $check_info->execute([$uname,$email,"sub_admin","user"]);
                if($check_info->rowCount()==1){
                   $check = 1;
                }else{
                $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_uname=?, acc_profile=? WHERE acc_admin_id=? ");
                $update_info->execute([$fname,$mname,$lname,$email,$uname,$profile_img,$user_id]);
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
                        $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_uname=?, acc_password=? ,acc_profile=? WHERE acc_admin_id=? ");
                        $update_info->execute([$fname,$mname,$lname,$email,$uname,md5($npass),$profile_img,$user_id]);
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

    protected function count_admin(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_type=? ");
        $stmt->execute(["sub_admin"]);

        return $stmt;
    }
    protected function count_user(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_type=? AND acc_status=? ");
        $stmt->execute(["user","Approved"]);

        return $stmt;
    }

    protected function count_org(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE  org_status=? ");
        $stmt->execute(["Accept"]);

        return $stmt;
    }

    protected function pending_org(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE  org_status=? ");
        $stmt->execute(["Pending"]);

        return $stmt;
    }

    protected function pending_app(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE  appointment_status=? ");
        $stmt->execute(["Pending"]);

        return $stmt;
    }

    protected function today_appointment($date){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE  appointment_date=? AND appointment_status=? ");
        $stmt->execute([$date,"Accept"]);

        return $stmt;
    }

    protected function add_pre_elect($pre_elect_year,$pre_elect_starting,$pre_elect_end){
        $checking = $this->connect()->prepare(
            "SELECT * FROM `tbl_pre_election` WHERE pre_election_year=? AND pre_election_status=? AND pre_election_type=?"
        );
        $checking->execute([$pre_elect_year,"Pending","super_admin"]);

        if($checking->rowCount()==1){
            ?>
                <script>
                    alert("Year Election is Already added");
                    window.location.href="<?=$_SERVER["HTTP_REFERER"]?>";
                </script>
            <?php
        }else{
            $checking_date = $this->connect()->prepare(
                "SELECT * FROM `tbl_pre_election` WHERE pre_election_statrting=? AND pre_election_type=? OR pre_election_end=? AND pre_election_type=?"
            );
            $checking_date->execute([$pre_elect_starting,"super_admin",$pre_elect_end,"super_admin"]);
    
            if($checking_date->rowCount()==1){
                ?>
                    <script>
                        alert("Year Election is Already added");
                        window.location.href="<?=$_SERVER["HTTP_REFERER"]?>";
                    </script>
                <?php
            }else{
                $stmt = $this->connect()->prepare(
                    "INSERT INTO `tbl_pre_election`(`pre_election_year`, `pre_election_statrting`, `pre_election_end`, `pre_election_status`,`pre_election_type`) 
                    VALUES (?,?,?,?,?)"
                );
                $stmt->execute([$pre_elect_year,$pre_elect_starting,$pre_elect_end,"Pending","super_admin"]);
        
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

    protected function fetch_pre_regis(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_type=?");
        $stmt->execute(['super_admin']);
        return $stmt;
    }


    protected function check_pre_regis($date){
        $check_start = $this->connect()->prepare(
                "SELECT * FROM `tbl_pre_election` WHERE pre_election_statrting=? AND pre_election_status=? AND pre_election_type=?"
            );
        $check_start->execute([$date,"Pending","super_admin"]);

        if($check_start->rowCount()==1){
                $row = $check_start->fetch();
                $update_status_start = $this->connect()->prepare("UPDATE `tbl_pre_election` SET `pre_election_status`=? WHERE `pre_election_year`=? AND pre_election_type=?");
                $update_status_start->execute(["Start",$row["pre_election_year"],"super_admin"]);
                if($update_status_start)
                {
                    $_SESSION['pre_reg_status'] = "Start";

                }
        }else{
            $check_end = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_end=? AND pre_election_status=? AND pre_election_type=?");
            $check_end->execute([$date,"Start","super_admin"]);

            if($check_end->rowCount()==1){
                    $row = $check_end->fetch();
                    $check_sys_def = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_type=? AND pre_election_sysDef=?");
                    $check_sys_def->execute(["super_admin","Yes"]);
                    if($check_sys_def->rowCount()===1){
                        $update_status_end = $this->connect()->prepare("UPDATE `tbl_pre_election` SET pre_election_status=?,pre_election_period=?, pre_election_sysDef=? WHERE pre_election_year=? AND pre_election_type=?");
                        $update_status_end->execute(["End","pending","No",$row["pre_election_year"],"super_admin"]);
                        if($update_status_end)
                        {
                        $_SESSION['pre_reg_status'] = "End";
                        }
                    }else{
                        $update_status_end = $this->connect()->prepare("UPDATE `tbl_pre_election` SET pre_election_status=?,pre_election_period=?, pre_election_sysDef=? WHERE pre_election_year=? AND pre_election_type=?");
                        $update_status_end->execute(["End","Pending","Yes",$row["pre_election_year"],"super_admin"]);
                        if($update_status_end)
                        {
                        $_SESSION['pre_reg_status'] = "End";
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
        $stmt->execute([$year_election,"super_admin"]);

        return $stmt;
    }

    protected function org_mem_list(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_pos=?");
        $stmt->execute(["President"]);
        return $stmt;
    }

    protected function account_info($value_id_num){
        if($value_id_num !== ""){
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=?");
            $stmt->execute([$value_id_num]);
            return $stmt;
        }else{
            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_type=? AND acc_status=?");
            $stmt->execute(["user", "Approved"]);
            return $stmt;
        }
            
    }

    protected function check_election_period(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_status=? AND pre_election_type=?");
        $stmt->execute(["End","super_admin"]);

        return $stmt;
    }

    protected function change_sys_def($sysDef_id){
        $check = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_id=? AND pre_election_type=?");
        $check->execute([$sysDef_id,"super_admin"]);
        if($check->rowCount()==1){
            $stmt = $this->connect()->prepare("UPDATE tbl_pre_election SET pre_election_sysDef=? WHERE pre_election_type=?");
            $stmt->execute(["No","super_admin"]);

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

    protected function count_candidate_year($year){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_position=?");
        $stmt->execute([$year ,"Admin"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }
    protected function candidate_count($year_election,$brgy_name){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=?");
        $stmt->execute([$year_election,$brgy_name,"Admin"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function fetch_election_list($value,$year){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=?");
        $stmt->execute([$year,$value,"Admin"]);
        return $stmt;
    }

    protected function checking_election_period($election_id){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_id=? AND pre_election_type=? AND pre_election_sysDef=?");
        $stmt->execute([$election_id,"super_admin","Yes"]);

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

    protected function update_status_election($election_id,$election_status){
        $stmt = $this->connect()->prepare("UPDATE tbl_pre_election SET pre_election_period=? WHERE  pre_election_id=?");
        $stmt->execute([$election_status,$election_id]);

        if($stmt){
            switch ($election_status){
                case"Open";
                $_SESSION['election_status'] = "Election Period is Open";
            
                ?>
                    <script>
                        // alert("Successfully Updated Data");
                        window.location.href="election-period.php";
                    </script>
                <?php
                break;
                case"Close";
                $_SESSION['election_status'] = "Election Period is Close";
            
                ?>
                    <script>
                        // alert("Successfully Updated Data");
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
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_result WHERE election_result_year=? AND election_result_candidates_id=? AND election_result_address=? AND election_result_position=?");
        $stmt->execute([$year,$candidate_id,$value,"Admin"]);

       if($stmt->rowCount()){
            echo $stmt->rowCount();
       }else{
            echo "0";
       }
    }

    protected function change_admin($value){
        $stmt = $this->connect()->prepare("SELECT election_list_brgy,election_list_status FROM tbl_election_list WHERE election_list_brgy=?");
        $stmt->execute([$value]);
        return $stmt;
    }

    protected function set_admin($candidate_id,$address,$year){
        $stmt = $this->connect()->prepare("UPDATE tbl_accounts SET acc_type=? WHERE acc_address=? AND acc_type=?");
        $stmt->execute(["user",$address,"sub_admin"]);

        if($stmt){
            $this->connect()->query("UPDATE tbl_accounts SET acc_type='sub_admin' WHERE acc_admin_id=$candidate_id");
            $this->connect()->query("UPDATE tbl_election_list SET election_list_status='Change' WHERE election_list_year='$year' AND election_list_brgy='$address' AND election_list_position='Admin' ");
            ?>
                <script>
                    alert("Successfully Update");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php

        }else{
            ?>
                <script>
                    alert("There's Something wrong. Please try again");
                    window.location.href="<?=$_SERVER['HTTP_REFERE']?>";
                </script>
            <?php
        }
    }

    protected function add_service($notice_title,$notice_date,$notice_sponsor,$notice_message){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_title=? AND sched_events_date=? AND sched_events_message=? AND sched_events_type=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,"City Service"]);

        if($stmt->rowCount()==1){
            ?>
                <script>
                    alert("Already Added Data");
                    window.location.href="add-notice.php";
                </script>
            <?php
        }else{
            $insert = $this->connect()->prepare("INSERT INTO `tbl_sched_events`(`sched_events_title`, `sched_events_date`, `sched_events_message`, `sched_events_type`,`sched_events_sponsor`) 
            VALUES (?,?,?,?,?)");
            $insert->execute([$notice_title,$notice_date,$notice_message,"City Service",$notice_sponsor]);

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

    protected function fetch_service(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? ");
        $stmt->execute(["City Service"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function fetch_update_service($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=? ");
        $stmt->execute([$value,"City Service"]);

        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function update_service($notice_id,$notice_title,$notice_date,$notice_message){
        $stmt = $this->connect()->prepare("UPDATE `tbl_sched_events` SET `sched_events_title`=? ,`sched_events_date`=? ,`sched_events_message`=? WHERE `sched_events_id`=? ");
        $stmt->execute([$notice_title,$notice_date,$notice_message,$notice_id]);

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

    protected function active_user(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_type=? AND acc_active=?");
        $stmt->execute(['user','Active']);
        return $stmt;
    }

    protected function active_admin(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_type=? AND acc_active=?");
        $stmt->execute(['sub_admin','Active']);
        return $stmt;
    }
    protected function total_acc(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_type=? OR acc_type=?");
        $stmt->execute(['sub_admin','user']);
        return $stmt;
    }

    protected function checking_services($services_id){
        $stmt = $this->connect()->prepare("SELECT sched_events_id,sched_events_title,sched_events_type,sched_events_sponsor FROM tbl_sched_events WHERE sched_events_id=? AND sched_events_type=?");
        $stmt->execute([$services_id,"City Service"]);

        return $stmt;
    }

    protected function fetch_services_user($brgy,$service_id){
        // fetching tbl_service
        $fetch_service = $this->connect()->prepare("SELECT * FROM tbl_sched_events WHERE sched_events_id=?");
        $fetch_service->execute([$service_id]);

        if($fetch_service->rowCount()==1){
            $fetch_info_service = $fetch_service->fetch();

            // fetching info 
            if($brgy == "All"){
                $fetch_service_user = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_name=?");
                $fetch_service_user->execute([$fetch_info_service['sched_events_title']]);

                return $fetch_service_user;

            }else{
                $fetch_service_user = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_name=? AND ser_address=?");
                $fetch_service_user->execute([$fetch_info_service['sched_events_title'],$brgy]);

                return $fetch_service_user;
            }
        }
    }

    protected function fetch_name($name_user){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id LIKE ? AND acc_type=? OR acc_fname LIKE ? AND acc_type=? OR acc_mname LIKE ? AND acc_type=? OR acc_lname LIKE ? AND acc_type=?  ");
        $stmt->execute(["%".$name_user."%","user","%".$name_user."%","user","%".$name_user."%","user","%".$name_user."%","user"]);
        return $stmt;
    }

    protected function add_services_user($service_name,$service_sponsor,$add_user_services,$date_get_ser){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $stmt->execute([$add_user_services]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            // Checking if Data exist
            $checking = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_name=? AND ser_rand_id_user=?");
            $checking->execute([$service_name,$add_user_services]);

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
                $insert->execute([$service_name,$add_user_services,$row['acc_fname']." ".$row['acc_mname']." ".$row['acc_lname'],$date_get_ser,"City",$row['acc_address'],$service_sponsor]);
                
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

    protected function fetch_city_serv($acc_id,$brgy){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_rand_id_user=? AND ser_type=? AND  ser_address=? ");
        $stmt->execute([$acc_id,"City",$brgy]);
        return $stmt;
    }

    protected function fetch_brgy_serv($acc_id,$brgy){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_rand_id_user=? AND ser_type=? AND  ser_address=? ");
        $stmt->execute([$acc_id,"brgy",$brgy]);
        return $stmt;
    }

    protected function check_ap_today($date){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_appointment WHERE appointment_date=? AND appointment_type=? AND appointment_status=? ");
        $stmt->execute([$date,"CH","Accept"]);

        return $stmt;
    }

        protected function check_org_mem($value){ 

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE org_name=? ");
            $stmt->execute([$value]);
            return $stmt;
       
    }

        protected function fetch_org_mem($value){

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_oname=?");
            $stmt->execute([$value]);
            return $stmt;
    }
}
?>  