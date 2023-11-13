<?php

class controller extends db{
    protected function add_appointment($type_appointment,$subject_appointment,$date_appointment,$time_appointment,$message_appointment){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $check_appointment = $this->connect()->prepare("SELECT * FROM tbl_appointment WHERE appointment_rand_id=? AND appointment_date=? AND appointment_title=? ");
            $check_appointment->execute([$row['acc_admin_id'],$date_appointment, $type_appointment]);

            if($check_appointment->rowCount()==1){
                ?>
                    <script>
                        alert("Only 1 Appointment per Day");
                        window.location.href="list-appointment.php";
                    </script>
                <?php
            }else{
                $add_appointment = $this->connect()->prepare("INSERT INTO `tbl_appointment`(`appointment_rand_id`, `appointment_name`, `appointment_email`, `appointment_contact`, `appointment_address`, `appointment_date`,`appointment_time`, `appointment_message`, `appointment_title`, `appointment_type`, `appointment_status`) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $add_appointment->execute([$row['acc_admin_id'],$row['acc_fname']." ".$row['acc_mname']." ".$row['acc_lname'],$row['acc_email'],$row['acc_phone'],$row['acc_address'],$date_appointment,$time_appointment,$message_appointment,$subject_appointment,$type_appointment,"Pending"]);

                if($add_appointment){
                    ?>
                    <script>
                        alert("Please Wait Accepting By City Admin");
                        window.location.href="list-appointment.php";
                    </script>
                <?php
                }else{
                    ?>
                    <script>
                        alert("Error");
                        window.location.href="list-appointment.php";
                    </script>
                <?php
                }
            }
        }else{
            return false;
        }
    }

    protected function fetch_appointment(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $fetch_appointment = $this->connect()->prepare("SELECT * FROM `tbl_appointment` WHERE appointment_rand_id=? ");
            $fetch_appointment->execute([$row['acc_admin_id']]);

            if($fetch_appointment){
                return $fetch_appointment;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    protected function fetch_org_mem(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $fetch_org_mem = $this->connect()->prepare("SELECT * FROM `tbl_org_mem` WHERE org_mem_oname=? AND org_mem_brgy=?");
            $fetch_org_mem->execute([$row["acc_org"],$row["acc_address"]]);

            if($fetch_org_mem->rowCount()){
                return $fetch_org_mem;
            }

        }else{
            return false;
        }
    }

    protected function fetch_img($name){
        $stmt= $this->connect()->prepare("SELECT acc_profile FROM `tbl_accounts` WHERE acc_admin_id =? ");
        $stmt->execute([$name]);

        return $stmt;
    }

    protected function check_election_brgy(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_period=? AND pre_election_type=? AND pre_election_sysDef=?");
        $stmt->execute(["Open","super_admin","Yes"]);
        return $stmt;
        
    }

    protected function check_election_org(){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_period=? AND pre_election_type=? AND pre_election_address=? AND pre_election_sysDef=?");
            $stmt->execute(["Open","admin",$row['acc_address'],"Yes"]);
            return $stmt;
        }
        
    }

    protected function check_brgy_election(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_type=? AND pre_election_period=? AND pre_election_sysDef=?");
        $stmt->execute(["super_admin","Open","Yes"]);

        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            ?>
                <script>
                    alert("The Election Period is not Open");
                    window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                </script>
            <?php
        }
    }

        protected function check_brgy_organization(){
            $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_pre_election WHERE pre_election_type=? AND pre_election_address=? AND pre_election_period=? AND pre_election_sysDef=?");
            $stmt->execute(["admin",$row['acc_address'],"Open","Yes"]);

            if($stmt->rowCount()==1){
                return $stmt;
            }else{
                ?>
                    <script>
                        alert("The Election Period is not Open");
                        window.location.href="<?=$_SERVER['HTTP_REFERER']?>";
                    </script>
                <?php
            }
        }
        
    }

    protected function fecth_candidates($year_election){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();
            
            $candidate_list = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=?");
            $candidate_list ->execute([$year_election, $row['acc_address'], "Admin"]);
            
            return $candidate_list;
        }else{
            return false;
        }

    }

    protected function voting_brgy($elect_year,$name_candidate){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            $election = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`) 
            VALUES (?,?,?,?,?)");
            $election->execute([$elect_year,$row ['acc_admin_id'],$name_candidate,$row['acc_address'],"Admin"]);


            if($election){
                ?>
                    <script>
                        alert("Thank you for your cooperation.");
                        window.location.href="index.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("There's something wrong. Please try again");
                        window.location.href="brgy-election.php";
                    </script>
                <?php
            }
        }
        
    }

    protected function checking_election($year_election,$user_id){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_result WHERE election_result_year=? AND election_result_voter_id=? AND election_result_position=?");
        $stmt->execute([$year_election,$user_id,"Admin"]);

        if($stmt->rowCount()==1){
            ?>
                <script>
                    alert("You are already done to vote. Thank you.");
                    window.location.href="index.php";
                </script>
            <?php
        }
    }

    protected function checking_election_org($year_election,$user_id){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_result WHERE election_result_year=? AND election_result_voter_id=? AND election_result_org=?");
            $stmt->execute([$year_election,$user_id,$row['acc_org']]);

            if($stmt->rowCount()==1){
                ?>
                    <script>
                        alert("You are already done to vote. Thank you.");
                        window.location.href="index.php";
                    </script>
                <?php
            }
        }
        
    }

    protected function logout_user(){
        $fetch = $this->connect()->prepare("UPDATE tbl_accounts SET acc_active=? WHERE acc_admin_id=? ");
        $fetch->execute(['Not Active',$_SESSION['user_id']]);
        return $fetch;
    }

    protected function fetch_pres($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"President",$row['acc_org']]);

            return $stmt;
        }

    }

        protected function fetch_vpres($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"V-President",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function fetch_secretary($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"Secretary",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function fetch_treasurer($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"Treasurer",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function fetch_pio($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"P.I.O",$row['acc_org']]);

            return $stmt;
        }

    }

        protected function fetch_bm($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"Bussiness Manager",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function fetch_auditor($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"Auditor",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function fetch_represent($year_election){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            $stmt = $this->connect()->prepare("SELECT * FROM tbl_election_list WHERE election_list_year=? AND election_list_brgy=? AND election_list_position=? AND election_list_org=?");
            $stmt->execute([$year_election,$row['acc_address'],"Representative",$row['acc_org']]);

            return $stmt;
        }

    }

    protected function voting_org($elect_year,$pres,$vpres,$sec,$tre,$pio,$bm,$audi,$rep){
        $status = 0;
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);

        if($stmt->rowCount()==1){
            $row = $stmt->fetch();

            if($pres){
                $election_pres = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_pres->execute([$elect_year,$row ['acc_admin_id'],$pres,$row['acc_address'],"President",$row['acc_org']]);
                if($election_pres){
                    $status = 1;
                }
            }elseif($vpres){
               $election_vpres = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_vpres->execute([$elect_year,$row ['acc_admin_id'],$vpres,$row['acc_address'],"V-President",$row['acc_org']]);
                if($election_vpres){
                    $status = 1;
                } 
            }
            elseif($tre){
               $election_tre = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_tre->execute([$elect_year,$row ['acc_admin_id'],$tre,$row['acc_address'],"Treasurer",$row['acc_org']]);
                if($election_tre){
                    $status = 1;
                } 
            }
            elseif($pio){
               $election_pio = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_pio->execute([$elect_year,$row ['acc_admin_id'],$pio,$row['acc_address'],"P.I.O",$row['acc_org']]);
                if($election_pio){
                    $status = 1;
                } 
            }
            elseif($bm){
               $election_bm = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_bm->execute([$elect_year,$row ['acc_admin_id'],$bm,$row['acc_address'],"Bussiness Manager",$row['acc_org']]);
                if($election_bm){
                    $status = 1;
                } 
            }
            elseif($audi){
               $election_audi = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_audi->execute([$elect_year,$row ['acc_admin_id'],$audi,$row['acc_address'],"Auditor",$row['acc_org']]);
                if($election_audi){
                    $status = 1;
                } 
            }
            elseif($rep){
               $election_rep = $this->connect()->prepare("INSERT INTO `tbl_election_result`(`election_result_year`, `election_result_voter_id`, `election_result_candidates_id`, `election_result_address`, `election_result_position`,`election_result_org`) 
                VALUES (?,?,?,?,?,?)");
                $election_rep->execute([$elect_year,$row ['acc_admin_id'],$rep,$row['acc_address'],"Representative",$row['acc_org']]);
                if($election_rep){
                    $status = 1;
                } 
            }

            if($status == 1){
                ?>
                    <script>
                        alert("Thank you for your cooperation.");
                        window.location.href="index.php";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("There's something wrong. Please try again");
                        window.location.href="brgy-election.php";
                    </script>
                <?php
            }
        }
        
    }

    protected function fetch_user(){
        $stmt = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt;
    }

    protected function update_user_info($user_id,$profile_img,$fname,$mname,$lname,$birth,$contact,$email,$uname,$cpass,$npass,$check){
        if($profile_img < 0){
            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_uname=? AND acc_email=? AND acc_type=?");
                $check_info->execute([$user_id,$uname,$email,"user"]);
                if($check_info->rowCount()==1){
                   $check = 1;
                }else{
                $update_info = $this->connect()->prepare("UPDATE `tbl_accounts` SET acc_fname=?, acc_mname=?, acc_lname=?, acc_email=?, acc_phone=?, acc_birth=?, acc_uname=? WHERE acc_admin_id=? ");
                $update_info->execute([$fname,$mname,$lname,$email,$contact,$birth,$uname,$user_id]);
                    $check = 2;
                }
            }else{
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_password=?");
                $check_info->execute([$user_id,md5($cpass)]);
                if($check_info->rowCount()==1){
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
            $target_dir = "../../uploads/";
            $target_file = $target_dir . basename($profile_img);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if($cpass == ""){
                $check_info = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE acc_admin_id=? AND acc_uname=? AND acc_email=? AND acc_type=?");
                $check_info->execute([$user_id,$uname,$email,"user"]);
                if($check_info->rowCount()==1){
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
                if($check_info->rowCount()==1){
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

    protected function fetch_city_serv($status){
        $fetch_info = $this->connect()->prepare("SELECT * FROM tbl_accounts WHERE acc_admin_id=?");
        $fetch_info->execute([$_SESSION['user_id']]);

        if($fetch_info->rowCount()==1){
            $row = $fetch_info->fetch();

            if($status == "CS"){
                $stmt = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_rand_id_user=? AND ser_type=? AND  ser_address=? ");
                $stmt->execute([$row['acc_admin_id'],"City",$row['acc_address']]);
                return $stmt;
            }else{
                $stmt = $this->connect()->prepare("SELECT * FROM tbl_services WHERE ser_rand_id_user=? AND ser_type=? AND  ser_address=? ");
                $stmt->execute([$row['acc_admin_id'],"Brgy",$row['acc_address']]);
                return $stmt;
            }
            
        }
        
    }
}

?>