<?php
include 'includes/autoload.inc.php';

    if(isset($_POST['value']) && $_POST['function'] == "Fetch Admin"){
        $value = secured($_POST['value']);
?>
<table class="table">
    <thead>
        <tr>
        <th class="font-weight-bold">Admin ID</th>
        <th class="font-weight-bold">Admin Barangay</th>
        <th class="font-weight-bold">Admin Name</th>
        <th class="font-weight-bold">Admin Email</th>
        <th class="font-weight-bold">Action</th>

        </tr>
    </thead>
    <tbody>
        
            <?php
                $fetch_admin = new fetch();
                $result = $fetch_admin->fetchAdmin($value);
                if($result){
                    while($row = $result->fetch()){
            ?>
            <tr>
                <td><?=$row['acc_admin_id']?></td>
                <td><?=$row['acc_address']?></td>
                <td><?=$row['acc_fname']?> <?=$row['acc_mname']?> <?=$row['acc_lname']?></td>
                <td><?=$row['acc_email']?></td>
                <td>
                    <div>
                    <a href="add-admin.php?editid=<?=$row['acc_admin_id']?>"><i class="icon-eye"></i></a>
                    || <a href="inputConfig.php?deleteUser=<?=$row['acc_admin_id']?>" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a>
                    </div>
                </td>
            </tr>
            <?php
        }}else{echo"<tr><td colspan='5' class='text-center'>No Data Found</td></tr>";}?>
        
    </tbody>
</table>
<?php
}else{
    header("Location: index.php");
}
?>

