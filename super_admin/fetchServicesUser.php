<?php
include 'includes/autoload.inc.php';

if(isset($_POST['brgy']) && isset($_POST['service_id']) && $_POST["function"] == "fetchServicesUser"){
    $brgy = secured($_POST['brgy']);
    $service_id = secured($_POST['service_id']);
    ?>
        <table class="table">
            <thead>
                <tr>
                <th class="font-weight-bold">Name</th>
                <th class="font-weight-bold">Barangay</th>
                <th class="font-weight-bold">Date & Time</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $fetch_services_user = new fetch();
                    $res = $fetch_services_user->fetchServicesUser($brgy,$service_id);

                    if($res->rowCount()>0){
                        while($row = $res->fetch()){
                            ?>
                                <tr>
                                    <td><?=$row['ser_user_name']?></td>
                                    <td><?=$row['ser_address']?></td>
                                    <td><?=$row['ser_date']?></td>
                                </tr>
                            <?php
                        }
                    }else{
                        echo"<tr><td colspan='3' class='text-center'>No Data Found</td></tr>";
                    }
                ?>
                
            </tbody>
        </table>
    <?php

}else{
    header("Location: index.php");
}
?>