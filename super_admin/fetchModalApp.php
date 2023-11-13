<?php
include 'includes/autoload.inc.php';

if(isset($_POST['date']) && $_POST['function'] == "today_app"){
  $date = secured($_POST['date']);
?>
      <!-- Modal content-->
      <div class="modal-content" style="background-color:whitesmoke">
        <div class="modal-header">
          <h4 class="modal-title">Today's Appointment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

            <div class="modal-body">
               <div class="table-responsive border rounded p-1">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $check_app_today = new fetch();
                        $res = $check_app_today->checkAppToday($date);
                        if($res->rowCount()){
                          while($row = $res->fetch()){
                            ?>
                              <tr>
                                <th><?=$row['appointment_name']?></th>
                                <th><?=$row['appointment_date']?></th>
                                <th><?=$row['appointment_time']?></th>
                              </tr>
                            <?php
                          }
                        }else{
                          echo"<tr><td colspan='3' class='text-center'>No Data Found</td></tr>";
                        }
                      ?>
                      
                    </tbody>
                  </table>
               </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
      </div>

<?php
}else{
  header("Location: index.php");
}
?>

    