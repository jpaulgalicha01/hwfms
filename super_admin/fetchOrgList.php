<?php
include 'includes/autoload.inc.php';

if(isset($_POST['value_brgy']) && $_POST["function"]=="fetch_org" ){
    $value_brgy = secured($_POST['value_brgy']);

    if($value_brgy == "All"){
        ?>
            <option selected>All</option>
        <?php
    }else{
        $fetchOrgList = new fetch();
        $fetchOrgList->fetchOrgList($value_brgy);
    }
    
}

?>

<script>
    $(document).ready(function(){
        $("#org").change(function(){
            var value_brgy = document.getElementById("brgy").value;
            var value_org = $(this).val();
            // alert(value_brgy + " " + value_org);

            $.ajax({
                type:"POST",
                url:"fetchUser.php",
                data:{value_brgy:value_brgy , value_org:value_org, function:"fetch_user" },
                success:function(response){
                    $("#result").html(response);
                }
            })
        });
        $("#org").trigger("change");
    })
</script>