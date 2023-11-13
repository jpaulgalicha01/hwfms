<?php
include 'includes/autoload.inc.php';

if(isset($_POST['brgy_value']) && $_POST['function'] == "fetch_brgy_org"){
    ?>

            <option selected>All</option>
            <option>Accept</option>
            <option>Declined</option>
            <option>Pending</option>
    <?php
}else{
    header("Location: index.php");
}
?>


<script>
        $(document).ready(function(){
        $("#status").change(function(){
          var org_brgy = document.getElementById('brgy').value;
          var org_status = document.getElementById('status').value;
        //   alert(org_brgy + " " + org_status);
          $.ajax({
            type:"POST",
            url:"fetchOrg.php",
            data:{org_brgy:org_brgy, org_status:org_status, function:"fetch_org"},
            success:function(response){
              $("#result").html(response);
            }
          })
        });
        $("#status").trigger("change");
      })
</script>