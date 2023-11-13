<?php
include 'include/autoload.inc.php';
include 'include/header.php';
?>

<div class="container py-5" style="height: 100vh; min-height:auto;">
    <div class="row">
        <div class="col-12">
        <h1>List Of Appointment</h1><br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Title</th>
                <th scope="col">Appointment Class</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $fetch_appointment = new fetch();
                $res = $fetch_appointment->fetchAppointment();

                if($res->rowCount()){
                  while($row = $res->fetch()){
                    ?>
                      <tr>
                        <td><?=date("M-d-Y",strtotime($row['appointment_date']))?></td>
                        <td><?=$row['appointment_time']?></td>
                        <td><?=$row['appointment_title']?></td>
                        <td>
                          <?php if($row['appointment_type'] == "CH"){
                              echo "City Hall";
                            }else{
                              echo "Barangay Hall";
                            }
                          ?>
                            
                          </td>
                        <td><?=$row['appointment_status']?></td>
                      </tr>
                    <?php
                  }
                }else{
                  echo"<tr><td colspan='5' class='text-center'>No Data Found</td></tr>";
                }
              ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="inputConfig.php" method="POST">
        <input type="hidden" name="function" value="add_appointment">
          <div class="modal-body">
              <div class="form-group">
                  <label for="">Appointment class :</label>
                  <select class="custom-select form-control" name="type_appointment" required>
                    <option class="text-center" value="" disabled selected>---Please Select Type---</option>
                    <option value="CH">City Hall</option>
                    <option value="BH">Barangay Hall</option>
                  </select>
                  <label for="">Subject :</label>
                  <input type="text" name="subject_appointment" class="form-control" placeholder="...">
                  <label for="">Date: </label>
                  <input type="date" name="date_appointment" class="form-control">
                  <label for="">Time: </label>
                  <input type="time" name="time_appointment" class="form-control">
                  <label for="">Message</label>
                  <textarea name="message_appointment" class="form-control" id="" cols="20" rows="3"></textarea>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="add_appointment">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
include 'include/footer.php';
?>
