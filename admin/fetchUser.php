<?php
include 'includes/autoload.inc.php';

    if(isset($_POST['value']) && $_POST['function'] == "Fetch User"){
        $value = secured($_POST['value']);
?>
<table class="table">
    <thead>
        <tr>
        <th class="font-weight-bold">Name</th>
        <th class="font-weight-bold">Contact Num.</th>
        <th class="font-weight-bold">Email</th>
        <th class="font-weight-bold">Status</th>
        <th class="font-weight-bold">Action</th>

        </tr>
    </thead>
    <tbody>
        
            <?php
                $fetch_admin = new fetch();
                $result = $fetch_admin->fetchUser($value);
                if($result){
                    while($row = $result->fetch()){
            ?>
            <tr>
                <td><?=$row['acc_fname']?> <?=$row['acc_mname']?> <?=$row['acc_lname']?>
                <?php
                    if($row['acc_status'] == "Pending"){
                        ?>
                            <span class='badge badge-dark'>new</span>
                        <?php
                    }
                ?>
                </td>
                <td><?=$row['acc_phone']?></td>
                <td><?=$row['acc_email']?></td>
                <td><?=$row['acc_status']?></td>
                <td>
                    <div>
                        <?php
                            if($row['acc_status'] !=="Pending"){
                                ?>
                                    <a href="view-user.php?editid=<?=$row['acc_admin_id']?>"><i class="icon-eye"></i></a>
                                    || <a href="inputConfig.php?deleteUser=<?=$row['acc_admin_id']?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a>
                                <?php
                            }else{
                                ?>
                                    <a href="view-user.php?editid=<?=$row['acc_admin_id']?>" title="view"><i class="icon-eye"></i></a>
                                    |<a href="inputConfig.php?approved_user=<?=$row['acc_admin_id']?>" title="Approved" onclick="return confirm('Do you really want to Approved ?')"><i class="icon-check"></i></a>| <a href="inputConfig.php?disapproved_user=<?=$row['acc_admin_id']?>" onclick="return confirm('Do you really want to Disapproved ?')" title="Declined"> <i class="icon-minus"></i></a>
                                <?php
                            }
                        ?>
                        
                    </div>
                </td> 
            </tr>
            <?php
        }}else{echo"<td colspan='5' class='text-center'>No Data Found</td>";}?>
    </tbody>
</table>
<?php
}else{
    header("Location: index.php");
}
?>

