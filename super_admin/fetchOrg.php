<?php
include 'includes/autoload.inc.php';

    if(isset($_POST['org_brgy']) && isset($_POST['org_status']) && $_POST['function'] == "fetch_org"){
        $org_brgy = secured($_POST['org_brgy']);
        $org_status = secured($_POST['org_status']);
?>
<table class="table">
    <thead>
        <tr>
        <th class="font-weight-bold">Org Name</th>
        <th class="font-weight-bold">Barangay</th> 
        <th class="font-weight-bold">Creation Date</th>
        <th class="font-weight-bold">Status</th>
        <th class="font-weight-bold text-center">Action</th>
        
        </tr>
    </thead>
    <tbody>
                
            <?php
                $fetch_org = new fetch();
                $res = $fetch_org->fetchOrg($org_brgy,$org_status);
                if($res){
                    while($row = $res->fetch()){
                        ?>
                        <tr>
                            <td><?=$row['org_name']?></td>
                            <td><?=$row['org_brgy']?></td>
                            <td><?=$row['org_create_date']?></td>
                            <td><?=$row['org_status']?></td>
                            <td class="text-center">
                                <div>
                                    <?php
                                        if($row['org_status']=="Pending"){
                                            ?>
                                                <a href="inputConfig.php?accept_org=<?=$row['org_id']?>" title="accept" onclick="return confirm('Do you really want to Approved ?');"><i class="icon-check"></i></a>
                                                | <a href="inputConfig.php?declined_org=<?=$row['org_id']?>" title="declined" onclick="return confirm('Do you really want to Declined ?');"> <i class="icon-minus"></i></a>
                                            <?php
                                        }else{
                                            ?>
                                                <a href="add-organization.php?editOrg=<?=$row['org_id']?>" title="edit"><i class="icon-settings"></i></a> || <a href="view-member-org.php?name_org=<?=$row['org_name']?>" title="view"><i class="icon-eye"></i></a>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </td>
                        </tr>   
                        <?php
                    }
                }else{
                    echo"<tr><td colspan='5' class='text-center'>NO DATA FOUND</td></tr>";
                }
            ?>

        </tr>

    </tbody>
</table>
<?php
}else{
    header("Location: index.php");
}
?>
