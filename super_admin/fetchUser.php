<?php
include 'includes/autoload.inc.php';

    if(isset($_POST['value_brgy']) && isset($_POST['value_org'])  && $_POST['function'] == "fetch_user"){
        $value_brgy = secured($_POST['value_brgy']);
        $value = secured($_POST['value_org']);
        ?>
            <table class="table">
                <thead>
                    <tr>
                    <th class="font-weight-bold">Name</th>
                    <th class="font-weight-bold">Barangay</th>
                    <th class="font-weight-bold">Email</th>
                    <th class="font-weight-bold">Contact</th>
                    <th class="font-weight-bold">Action</th>

                    </tr>
                </thead>
                <tbody>

                        <?php
                            $fetch_admin = new fetch();
                            $result = $fetch_admin->fetchUser($value_brgy,$value);
                            if($result){
                                while($row = $result->fetch()){
                        ?>
                        <tr>
                            <td><?=$row['acc_fname']?> <?=$row['acc_mname']?> <?=$row['acc_lname']?> 
                                <?php
                                    if($row['acc_check'] == "Not View"){
                                        ?>
                                            <span class='badge badge-dark'>new</span>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?=$row['acc_address']?></td>
                            <td><?=$row['acc_email']?></td>
                            <td><?=$row['acc_phone']?></td>
                            <td>
                                <div>
                                <a href="add-admin.php?editid=<?=$row['acc_admin_id']?>"><i class="icon-eye"></i></a>
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
