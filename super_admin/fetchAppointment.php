<?php
include 'includes/autoload.inc.php';

if(isset($_REQUEST['value']) && $_REQUEST['function'] == "fetch_appointment"){
    $value = secured($_REQUEST['value']);
}
?>

<table class="table">
    <thead>
        <tr>
        <th class="font-weight-bold text">Name</th>
        <th class="font-weight-bold">Title</th>
        <th class="font-weight-bold">Date</th>
        <th class="font-weight-bold">Time</th>
        <th class="font-weight-bold">Status</th>
        <th class="font-weight-bold">Action</th>
        
        </tr>
    </thead>
    <tbody>
        <?php
            $fetchAppointment = new fetch();
            $res = $fetchAppointment->fetchAppointment($value);

            if($res){
                while($row = $res->fetch()){
                    ?>
                    <tr>    
                        <td>
                            <button class="btn btn-outline-none btn-lg custom-hover" id="show" value="<?=$row['appointment_rand_id']?>"><?=$row['appointment_name']?></button>
                        </td>
                        <td><?=$row['appointment_title']?></td>
                        <td><?=$row['appointment_date']?></td>
                        <td><?=$row['appointment_time']?></td>
                        <td
                            <?php
                                if($row["appointment_status"] == "Declined"){
                                    ?>
                                         class="bg-danger p-1 text-white"><?=$row['appointment_status']?>
                                    <?php
                                }elseif($row["appointment_status"] == "Accept"){
                                    ?>
                                         class="bg-success p-1 text-white"><?=$row['appointment_status']?>
                                    <?php
                                }else{
                                    ?>
                                         class="bg-secondary p-1 text-white"><?=$row['appointment_status']?>
                                    <?php
                                }
                            ?>
                        </td>
                        <td>
                        <?php
                                if($row["appointment_status"] == "Pending"){
                                    ?>
                                        <div>
                                            <a href="inputConfig.php?accept_appointment=<?=$row['appointment_rand_id']?>" title="Accept" onclick="return confirm('Do you really want to Accept ?');" ><i class="icon-check"></i></a>
                                            ||<a href="inputConfig.php?declined_appointment=<?=$row['appointment_rand_id']?>" title="Declined" onclick="return confirm('Do you really want to Declined ?');"><i class="icon-minus"></i></a>
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <div>
                                            <a href="inputConfig.php?delete_appointment=<?=$row['appointment_rand_id']?>" title="Delete" onclick="return confirm('Do you really want to Delete ?');" ><i class="icon-trash"></i></a>
                                        </div>
                                    <?php
                                }
                        ?>
                            
                        </td> 
                    </tr>
                    <?php
                }
            }else{
                ?>
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                <?php
            }
        ?>
        
    </tbody>
</table>
            
<script>
$(document).on('click','#show',function(){
   var val = $(this).val();
//    alert(val);
    $.ajax({
        type:"POST",
        url:"inputConfig.php",
        data:{value:val, function:"Show Appointment"},
        success:function(response){
            var res = jQuery.parseJSON(response);
            if(res.status == 200){
                // alert("success");
                $("#showAppointment").modal("show");
                $("#name").text(res.data.appointment_name);
                $("#email").text(res.data.appointment_email);
                $("#contact").val(res.data.appointment_contact);
                $("#address").val(res.data.appointment_address);
                $("#title").val(res.data.appointment_title);
                $("#date").val(res.data.appointment_date);
                $("#time").val(res.data.appointment_time);
                $("#message").text(res.data.appointment_message);

            }else{
                // alert("error");
            }

        }
    })
})
</script>