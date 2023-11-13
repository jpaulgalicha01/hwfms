<?php
include 'includes/autoload.inc.php';

    if(isset($_POST['value']) && $_POST['function'] == "fetch_org"){
        $value = secured($_POST['value']);
?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Org Name</th>
                            <th class="font-weight-bold">Creation Date</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                              
                          
                           <?php
                            $fetch_org = new fetch();
                            $res = $fetch_org->fetchOrgList($value);
                            if($res->rowCount()){
                                while($row = $res->fetch()){
                                    ?>
                                    <tr>
                                        <td><?=$row['org_name']?></td>
                                        <td><?=$row['org_create_date']?></td>
                                        <td><?=$row['org_status']?></td>
                                        <td>
                                        <div>
                                           <?php
                                            if($row['org_status']=="Pending"){
                                              ?>
                                                 <a href="add-organization.php?editOrg=<?=$row['org_id']?>" title="edit"><i class="icon-settings"></i></a>
                                                  || <a href="inputConfig.php?deleteOrg=<?=$row['org_id']?>" title="delete" onclick="return confirm('Do you really want to Delete ?');"> <i class="icon-trash"></i></a>
                                              <?php
                                            }else{
                                              ?>
                                                 <a href="add-organization.php?editOrg=<?=$row['org_id']?>" title="edit"><i class="icon-settings"></i></a>
                                                  | <a href="manage-member-org.php?name_org=<?=$row['org_name']?>"><i class="icon-eye"></i></a>
                                              <?php if($row['org_brgy'] !== "All"){
                                                ?>
                                                  |<a href="inputConfig.php?deleteOrg=<?=$row['org_id']?>" title="delete" onclick="return confirm('Do you really want to Delete ?');"><i class="icon-trash"></i></a>
                                                <?php
                                              }
                                            }
                                           ?>
                                        </div>
                                        </td> 
                                      </tr>
                                    <?php
                                }
                            }else{
                              echo"<tr><td colspan='4' class='text-center'>No Data Found</td></tr>";
                            }
                           ?>

                        </tbody>
                      </table>
<?php
    }
    else{
       header("Location: index.php");
    }
?>