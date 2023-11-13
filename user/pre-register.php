<?php
include 'include/autoload.inc.php';

$status = "";
$position = "";
$year_election= "";
$election_status="";
$checking_already = new fetch();
$res_checking = $checking_already->checkingAlready();

if($res_checking->rowCount()==1){
    $fetching_checking = $res_checking->fetch();
    $status = "exist";
    $position = $fetching_checking['election_list_position'];
    $year_election= $fetching_checking['election_list_year'];
    $election_status= $fetching_checking['election_list_status'];
}
if(isset($_SESSION['election_type']) && $_SESSION['election_type'] =="admin_election" || $_SESSION['election_type'] =="org_election"){
    // return false;
    
}else{
    header("Location: index.php");
}


include 'include/header.php';
?>

<div class="contianer-fluid" >
    <div class="row py-2">
        <div class="col-xl-4 col-lg-4 col-12">
            <!-- img -->
            <div class="py-2 text-center">
                    <img src="../uploads/<?=$_SESSION['user_img']?>" alt="" width="250" height="250">
            </div>
        </div>


        <div class="col-xl-8 col-lg-8 col-12 shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="py-2">
                <h3 class="text-center">Election for (Admin Position) Year 2023</h3>
                <form action="inputConfig.php" class=" p-2" method="POST">
                    <div class="bg-white p-4 rounded">
                        <div class="py-1">
                            <label for="">Name of Candidates</label>
                            <input type="text" name="pre_name" class="form-control" value="<?=$_SESSION['user_name']?>">
                        </div>
                        <div class="py-1">
                            <label for="">Position</label>
                            <select name="pre_reg_post" id="" class="form-select text-center" required>
                                <?php
                                    if($status == "exist"){
                                        echo"<option>".$position."</option>";
                                    }
                                    else{
                                       switch ($_SESSION['election_type']){
                                        case "admin_election";
                                            echo"<option value='' selected disabled>---Please Select---</option>";
                                            echo"<option>Admin</option>";
                                            break;

                                        default:
                                            echo"<option value='' selected disabled>---Please Select---</option>";
                                            echo"<option>President</option>";
                                            echo"<option>V-President</option>";
                                            echo"<option>Secretary</option>";
                                            echo"<option>Treasurer</option>";
                                            echo"<option>P.I.O</option>";
                                            echo"<option>Business Manager</option>";
                                            echo"<option>Auditor</option>";
                                            echo"<option>Representative</option>";
                                        } 
                                    }
                                    
                                ?>
                            </select>
                        </div>
                        <div class="py-5">
                            <h5 class="text-center">Terms and Condition</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agree" required>
                                <label class="form-check-label" for="agree">I agree. </label>
                            </div>
                        </div>
                        <?php
                            if($status == "exist"){
                                ?>
                                    <input type="hidden" name="function" value="withdraw_candi">
                                    <input type="hidden" name="election_year" value="<?=$year_election?>">
                                    <input type="hidden" name="election_status" value="<?=$election_status?>">
                                    <div class="py-2">
                                        <button class="btn btn-danger form-control" type="submit" name="withdraw_candi">Withdraw Candidacy</button>
                                    </div>
                                    <div class="py-2">
                                        <button class="btn btn-secondary form-control" type="button" onclick="window.close();">Close</button>
                                    </div>
                                    
                                <?php
                            }else{
                                ?>
                                    <input type="hidden" name="function" value="pre_reg">
                                    <button class="btn btn-primary form-control" type="submit" name="pre_reg">Submit</button>
                                <?php
                            }
                        ?>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include 'include/footer.php';
?>

</div>

</body>
</html>