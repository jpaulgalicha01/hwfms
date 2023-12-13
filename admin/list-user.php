<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "List User"; 

    include 'includes/header.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of User</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Table list
            </div>
            <div class="card-body">
                <div class="row mb-3" id="selection">
                    <div class="col-md-4">
                        <label for="userStatus">User Status</label>
                        <select class="form-select" id="user_status">
                            <option>All</option>
                            <option>Accept</option>
                            <option>Declined</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-4 pb-1">
                        <label for="orgStatus">Martial Status</label>
                        <select class="form-select" id="martial_status">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                    <div class="col-md-4 pb-1">
                        <label for="orgStatus">Economics Status</label>
                        <select class="form-select" id="eco_status">
                            <option>All</option>
                            <option>Employed</option>
                            <option>Unemployed</option>
                            <option>Others</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive" id="result">
                   
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function(){
        $("#selection").change(function(){

            $("#selection option:selected").each(function() {
                // alert($(this).val());
                    var user_status = document.getElementById('user_status').value;
                    var martial_status = document.getElementById('martial_status').value;
                    var eco_status = document.getElementById('eco_status').value;


                $("#result").html("<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'></span></div>Loading...");
                $.post('fetchUserList.php',{user_status:user_status, martial_status:martial_status, eco_status:eco_status},function(data,status){
                    $("#result").html(data);
                    
                })
            });
        });
        $("#selection").trigger("change");
    });


</script>
<?php
include 'includes/footer.php';
?>