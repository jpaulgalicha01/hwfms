 <?php
include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['user_status']) && isset($_POST['martial_status']) && isset($_POST['eco_status']) ){

        $user_status = $_POST['user_status'];
        $martial_status = $_POST['martial_status']; 
        $eco_status = $_POST['eco_status'];
        ?>
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th><small>User ID No.</small></th>
                        <th><small>Name <small class="fst-italic">(Last Name, First Name, Middle Name)</small> </small></th>
                        <th><small>Age </small></th>
                        <th><small>Date of Birth </small></th>
                        <th><small>Civil Status </small></th>
                        <th><small>Address </small></th>
                        <th><small>Contact Number </small></th>
                        <th><small>Economic Status</small></th>
                        <th class="text-center"><small>Status</small></th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>    
                <tbody>
                    <?php
                        $fetch_user_list = new fetch();
                        $res = $fetch_user_list->fetchUserList($user_status, $martial_status, $eco_status);
                        if($res->rowCount()>0){
                            while ($row = $res->fetch()) {
                                $color_status = "";
                                $get_age = date_diff(date_create($row['acc_birth']), date_create(date('Y-m-d')));;

                                if($row['acc_status']=="Accept"){
                                    $color_status = "bg-success bg-opacity-25";
                                }
                                if($row['acc_status']=="Declined"){
                                    $color_status = "bg-danger bg-opacity-25";
                                }
                                if($row['acc_status']=="Pending"){
                                    $color_status = "bg-secondary bg-opacity-25";
                                }
                                ?>
                                <tr class="<?=$color_status?>">
                                    <td><?= $row['acc_rand_id'];?></td>
                                    <td><?= $row['acc_lname'].", ".$row['acc_fname']." ".$row['acc_mname']?></td>
                                    <td><?= $get_age->format('%y')?></td>
                                    <td><?= date('M-d-Y',strtotime($row['acc_birth']))?></td>
                                    <td><?= $row['acc_martial_status']?></td>
                                    <td><?= $row['acc_complete_add'].", ".$row['acc_brgy']?></td>
                                    <td><?= $row['acc_contact']?></td>
                                    <?php
                                        if($row['acc_eco_status'] == "Others"){
                                            ?>
                                                <td><?= $row['acc_eco_status']?> (<?= $row['acc_eco_status_other']?>)</td>
                                            <?php
                                        }else{
                                            ?>
                                                <td><?= $row['acc_eco_status']?></td>
                                            <?php
                                        }
                                    ?>
                                    <td id="select" class="text-center">
                                        <input type="hidden" id="user_id" value="<?=$row['acc_rand_id']?>">
                                        <select class="form-select form-select-sm" id="status_select">
                                            <?php
                                            switch ($row['acc_status']) {
                                                case 'Accept':
                                                    ?>
                                                        <option selected>Accept</option>
                                                        <option>Declined</option>
                                                        <option>Pending</option>
                                                    <?php
                                                    break;

                                                case 'Declined':
                                                     ?>
                                                        <option>Accept</option>
                                                        <option selected>Declined</option>
                                                        <option>Pending</option>
                                                    <?php
                                                    break;

                                                default:
                                                    ?>
                                                        <option>Accept</option>
                                                        <option >Declined</option>
                                                        <option selected>Pending</option>
                                                    <?php
                                                    break;
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <a href="view-user.php?view_id=<?=$row['acc_rand_id']?>" class="btn btn-success" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="view"><i class="fa-solid fa-eye"></i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }else{
        ob_end_flush(header("Location: index.php"));
    }
}else{
    return false;
}

 ?>



<script type="text/javascript">
    $("#status_select").change(function(){
        var user_id = document.getElementById("user_id").value;
        var status_select = document.getElementById("status_select").value;
        $("#select").html("<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'></span></div>");
        // alert(status_select+" "+user_id);
        $.post("inputConfig.php",{user_id:user_id, status_select:status_select},function(data,status){
            var res = jQuery.parseJSON(data);

            location.reload();
        });
    });

    $(document).ready( function () {
        $('#table').DataTable();
         responsive: true
    } );
</script>