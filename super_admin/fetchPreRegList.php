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
                                    <th>Admin ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $fetch_election_list = new fetch();
                                    $res = $fetch_election_list->fetchElectionList($value,$year);

                                    if($res->rowCount()){
                                        while($row = $res->fetch()){
                                            ?>
                                                <tr>
                                                    <td><?=$row['election_list_rand_id']?></td>
                                                    <td><?=$row['election_list_name']?></td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="2" class="text-center">No Data Found</td>
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
