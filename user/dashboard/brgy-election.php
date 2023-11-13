<?php
include 'include/autoload.inc.php';
$year_election = "";
$check_brgy_election = new fetch();
$res = $check_brgy_election->checkBrgyElection();
if($res){
  $fetch = $res->fetch();
  $year_election = $fetch["pre_election_year"];
}

$checking_election = new fetch();
$checking_election->checkingElection($year_election,$user_id);
include 'include/header.php';
?>


<div class="container py-5" >
    <div class="row">
        <div class="col-12">
        <h1>Election For Barangay Admin (<?=$year_election?>)</h1><br>
        <form action="inputConfig.php" method="POST" class="form-group">
          <input type="hidden" name="function" value="elect_admin">
          <input type="hidden" name="elect_year" value="<?=$year_election?>">
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Name of Candidate</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <td class=" align-self-center">Admin</td>
                    <td>
                      
                      <select name="name_candidate" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                        <?php
                          $fecth_candidates = new fetch();
                          $res_list = $fecth_candidates->fecthCandidates($year_election);

                          if($res_list->rowCount()){
                            while($row = $res_list->fetch()){
                              ?>
                                <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                              <?php
                            }
                          }else{
                            ?>
                                <option>No Data Found</option>
                            <?php
                          }
                        ?>
                      </select>
                    </td>
                  </tr>
              </tbody>
          </table>

          <div class="py-5">
              <h5 class="text-center">Terms and Condition</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agree" required>
                <label class="form-check-label" for="agree">I agree. </label>
              </div>
          </div>
          <button class="btn btn-primary form-control" type="submit" name="elect_admin">Submit</button>
        </form>
        
        </div>
    </div>
</div>

<?php
include 'include/footer.php';
?>
