<?php
    include 'includes/autoload.inc.php';

    if(isset($_GET["val"]) && isset($_GET["year"]) && $_GET["function"] == "fetchPreRegList"){
        $value = secured($_GET['val']);
        $year = secured($_GET['year']);
    ?>
        <!-- Modal -->
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content" style="background-color:whitesmoke">
            <div class="modal-header">
            <h4 class="modal-title">Pre Registration (<?=$_GET["val"]?>)</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>No. of Vote</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $fetch_election_list = new fetch();
                                    $res = $fetch_election_list->fetchElectionList($value,$year);

                                    if($res->rowCount()){
                                        while($row = $res->fetch()){
                                            $candidate_id = $row['election_list_rand_id'];
                                            ?>
                                                <tr>
                                                    <td><?=$row['election_list_name']?></td>
                                                    
                                                    <td>
                                                        <?php
                                                            $count_vote = new fetch();
                                                            $count_vote->countVote($value,$year,$candidate_id);
                                                        ?>
                                                    </td>
                                                
                                                    <td>
                                                        <?php
                                                            $change_admin = new fetch();
                                                            $res_change_admin = $change_admin->changeAdmin($value);

                                                            if($res_change_admin->rowCount()){
                                                                $fetch_status = $res_change_admin->fetch();

                                                                switch($fetch_status['election_list_status']){
                                                                    case "Change";
                                                                    ?>
                                                                    <a href="#" class="btn btn-primary btn-sm">
                                                                        Already Change
                                                                    </a>
                                                                    <?php
                                                                    break;
                                                                    default:
                                                                    ?>
                                                                        <a href="inputConfig.php?set_admin=<?=$row['election_list_rand_id']?>&address=<?=$value?>&year=<?=$year?>" class="btn btn-success btn-sm">
                                                                            Set as Admin
                                                                        </a>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No Data Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
        
        </div>
    <?php
    }else{
        header("Location: index.php");
    }
 ?>
