<?php
include 'include/autoload.inc.php';
$year_election = "";
$check_brgy_election = new fetch();
$res = $check_brgy_election->checkBrgyOrganization();
if($res){
  $fetch = $res->fetch();
  $year_election = $fetch["pre_election_year"];
}

$checking_election = new fetch();
$checking_election->checkingElectionOrg($year_election,$user_id);
include 'include/header.php';
?>


<div class="container py-5" >
    <div class="row">
        <div class="col-12">
        <h1>Election for officer in organization (<?=$organization_name?>) </h1><br>
        <form action="inputConfig.php" method="POST" class="form-group">
          <input type="hidden" name="function" value="elect_org">
          <input type="hidden" name="elect_year" value="<?=$year_election?>">
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Name of Candidate</th>
                  </tr>
              </thead>
              <tbody>
                <!-- President -->
                  <tr>
                    <td class=" align-self-center">President</td>
                    <td>
                      <select name="pres" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                        <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchPres($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- V-President -->
                  <tr>
                    <td class=" align-self-center">V-President</td>
                    <td>
                      <select name="vpres" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_vpres = new fetch();
                          $res_vpress = $fetch_vpres->fetchVPres($year_election);
                          if($res_vpress->rowCount()>0){
                              while($row = $res_vpress->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Secretary -->
                  <tr>
                    <td class=" align-self-center">Secretary</td>
                    <td>
                      <select name="sec" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchSecretary($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Treasurer -->
                  <tr>
                    <td class=" align-self-center">Treasurer</td>
                    <td>
                      <select name="tre" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchTreasurer($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- P.I.O -->
                  <tr>
                    <td class=" align-self-center">P.I.O</td>
                    <td>
                      <select name="pio" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchPIO($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Bussiness Manager -->
                  <tr>
                    <td class=" align-self-center">Bussiness Manager</td>
                    <td>
                      <select name="bm" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchBM($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Auditor -->
                  <tr>
                    <td class=" align-self-center">Auditor</td>
                    <td>
                      <select name="audi" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchAuditor($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
                          }
                        ?>
                      </select>
                    </td>
                  </tr>

                  <!-- Representative -->
                  <tr>
                    <td class=" align-self-center">Representative</td>
                    <td>
                      <select name="rep" class="form-select form-select-sm text-center" style="width:75%" required>
                        <option value="" selected disabled>--- Please Select ---</option>
                         <?php
                          $fetch_pres = new fetch();
                          $res = $fetch_pres->fetchRepresent($year_election);
                          if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                  <option value="<?=$row['election_list_rand_id']?>"><?=$row['election_list_name']?></option>
                                <?php
                              }
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
                <input class="form-check-input" type="checkbox" value="" id="agree"  required>
                <label class="form-check-label" for="agree">I agree. </label>
              </div>
          </div>
          <button class="btn btn-primary form-control" type="submit" name="elect_org">Submit</button>
        </form>
        
        </div>
    </div>
</div>

<?php
include 'include/footer.php';
?>
