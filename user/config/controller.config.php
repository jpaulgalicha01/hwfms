<?php
class controller extends db{
    protected function fetch_notice(){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? ");
        $stmt->execute(["City Notice"]);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            return false;
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

     protected function fetch_service_brgy(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_type=? AND sched_events_address = ? AND sched_events_org=? OR sched_events_type=? AND sched_events_address = ? AND sched_events_org=? ");
            $stmt->execute(["Brgy Service",$fetch_info['acc_address'],$fetch_info['acc_org'],"Brgy Service",$fetch_info['acc_address'],"ALL"]);

            if($stmt->rowCount()>0){
                return $stmt;
            }else{
                return false;
            }
        }
        
    }

    protected function view_notice($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=? OR sched_events_id=? AND sched_events_type=? ");
        $stmt->execute([$value,"City Notice",$value,"Brgy Notice"]);

        if($stmt->rowCount()===1){
            return $stmt;
        }else{
            return false;
        }
    }
        protected function view_service($value){
        $stmt = $this->connect()->prepare("SELECT * FROM `tbl_sched_events` WHERE sched_events_id=? AND sched_events_type=? OR sched_events_id=? AND sched_events_type=? ");
        $stmt->execute([$value,"City Service",$value,"Brgy Service"]);

        if($stmt->rowCount()===1){
            return $stmt;
        }else{
            return false;
        }
    }

    protected function fetch_notice_brgy(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_sched_events WHERE sched_events_type=? AND sched_events_address=? AND sched_events_org=? OR sched_events_type=? AND sched_events_address=? AND sched_events_org=? ");
            $stmt->execute(["Brgy Notice", $fetch_info['acc_address'],$fetch_info['acc_org'],"Brgy Notice", $fetch_info['acc_address'],"All"]);
            
            return $stmt;
        }
    
    }

    protected function check_pre_elect(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            $_SESSION['user_name'] =$fetch_info['acc_fname']." ".$fetch_info['acc_mname']." ".$fetch_info['acc_lname'];
            $_SESSION['user_img'] =$fetch_info['acc_profile'];

            // Checking if Position is President in org
            $check_mem = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_name_id=? AND org_mem_brgy=?");
            $check_mem->execute([$fetch_info['acc_admin_id'],$fetch_info['acc_address']]);

            if($check_mem->rowCount()>0){
                $fetch_info_org = $check_mem->fetch();

                if($fetch_info_org['org_mem_pos'] =="President"){

                    // checking status of election (Admin Position)
                    $checking_pre_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=?");
                    $checking_pre_elect->execute(["Start","super_admin"]);
                    if($checking_pre_elect->rowCount()==1){
                        $_SESSION['election_type'] = "admin_election";
                        $_SESSION['election_status'] = "open";
                    }else{
                        unset($_SESSION['election_type']);
                        $_SESSION['election_status'] = "closed";
                    }
                }
            }else{
                // checking status of election (Organization Officer Position)
                $checking_org_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=? AND pre_election_address=?");
                $checking_org_elect->execute(["Start","admin",$fetch_info['acc_address']]);
                if($checking_org_elect->rowCount()==1){
                    $_SESSION['election_type'] = "org_election";
                    $_SESSION['election_status'] = "open";
                }else{
                    unset($_SESSION['election_type']);
                    $_SESSION['election_status'] = "closed";
                }
            }
        }
    }

    protected function preReg($pre_name,$pre_reg_post){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();
            
            // checking status of election (Admin)
            $checking_pre_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=?");
            $checking_pre_elect->execute(["Start","super_admin"]);
            if($checking_pre_elect->rowCount()==1){
                $fetch_checking_pre_elect = $checking_pre_elect->fetch();

                $insert_election_list = $this->connect()->prepare("INSERT INTO `tbl_election_list` (election_list_year,election_list_rand_id,election_list_name,election_list_brgy,election_list_position,election_list_status) 
                    VALUES (?,?,?,?,?,?)");
                $insert_election_list->execute([$fetch_checking_pre_elect['pre_election_year'],$fetch_info['acc_admin_id'],$pre_name,$fetch_info['acc_address'],$pre_reg_post,"admin election"]);

                if($insert_election_list){
                    ?>
                        <script>
                            alert("Thank you for your cooperation. God bless");
                            window.close();
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("There's Something wrong to added. Please try again");
                        window.location.href="pre-register.php";
                    </script>
                <?php
                }
                    
               
            }else{
                // checking status of election (Organization Postion)
                
                $checking_org_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=? AND pre_election_address=?");
                $checking_org_elect->execute(["Start","admin",$fetch_info['acc_address']]);
                if($checking_org_elect->rowCount()==1){
                    $fetch_checking_org_elect = $checking_org_elect->fetch();
                    
                    $checking_org_post = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=? AND election_list_status= ?");
                    $checking_org_post->execute([$fetch_checking_org_elect['pre_election_year'],$fetch_info['acc_address'], $pre_reg_post, $fetch_info['acc_org'], "org election"]);

                    if($checking_org_post->rowCount()>=3){
                        ?>
                            <script>
                                alert("The position for <?=$pre_reg_post?> fully maximize");
                                window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                            </script>
                        <?php
                    }else{
                        $insert_election_list = $this->connect()->prepare("INSERT INTO `tbl_election_list` (election_list_year,election_list_rand_id,election_list_name,election_list_brgy,election_list_position,election_list_org,election_list_status) 
                        VALUES (?,?,?,?,?,?,?)");
                        $insert_election_list->execute([$fetch_checking_org_elect['pre_election_year'],$fetch_info['acc_admin_id'],$pre_name,$fetch_info['acc_address'],$pre_reg_post,$fetch_info['acc_org'],"org election"]);

                        if($insert_election_list){
                            ?>
                                <script>
                                    alert("Successfully Added");
                                    window.close();
                                </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert("There's Something wrong to added. Please try again");
                                window.location.href="pre-register.php";
                            </script>
                        <?php
                        }
                    }

                }else{
                    ?>
                        <script>
                            alert("There's Something Wrong Please Try again");
                            window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                        </script>
                    <?php
                }
            }
        }

    }

    protected function checking_already(){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            // checking status of election (Admin)
            $checking_pre_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=?");
            $checking_pre_elect->execute(["Start","super_admin"]);

            if($checking_pre_elect->rowCount()==1){
                $fetch_checking_pre_elect = $checking_pre_elect->fetch();

                $checking = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_rand_id=? AND election_list_brgy=? AND election_list_position=? ");
                $checking->execute([$fetch_checking_pre_elect['pre_election_year'], $fetch_info['acc_admin_id'], $fetch_info['acc_address'],"Admin"]);

                if($checking){
                    return $checking;
                }

            }else{
                // // checking status of election (Organization Postion)
                $checking_org_elect = $this->connect()->prepare("SELECT * FROM `tbl_pre_election` WHERE pre_election_status=? AND pre_election_type=? AND pre_election_address=?");
                $checking_org_elect->execute(["Start","admin",$fetch_info['acc_address']]);
                if($checking_org_elect->rowCount()==1){
                    $fetch_checking_org_elect = $checking_org_elect->fetch();

                    $checking = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_rand_id=? AND election_list_brgy=? AND election_list_org=? ");

                    $checking->execute([$fetch_checking_org_elect['pre_election_year'], $fetch_info['acc_admin_id'], $fetch_info['acc_address'], $fetch_info['acc_org']]);

                    if($checking){
                        return $checking;
                    }
                    
                }
            }
        }
    }

    protected function withdrawal_candi($election_year,$election_status){
        $fetch = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=? ");
        $fetch->execute([$_SESSION['user_id']]);
        if($fetch->rowCount()){
            $fetch_info = $fetch->fetch();

            $delete_candidacy = $this->connect()->prepare("DELETE FROM `tbl_election_list` WHERE election_list_year=? AND election_list_rand_id=? AND election_list_status=?");
            $delete_candidacy->execute([$election_year,$fetch_info['acc_admin_id'],$election_status]);

            if($delete_candidacy){
                ?>
                    <script type="text/javascript">
                        alert("Successfully Withdrawal of Candidacy");
                        window.close();
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        alert("There's something wrong. Please try again.");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            }
        }
    }

}
?>