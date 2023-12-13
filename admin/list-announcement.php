<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "Announcment"; 

    include 'includes/header.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Announcement</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Announcement
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm" id="addAnnouncement">
                    Add Announcement
                </button>
                <div class="table-responsive pt-3">
                    <table id="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>What</th>
                                <th>When</th>
                                <th>Who</th>
                                <th>Where</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $fetch_announcment = new fetch();
                                $res_fetch_announcemnet = $fetch_announcment->fetchAnnouncement();
                                if ($res_fetch_announcemnet->rowCount()>0) {
                                    while ($row = $res_fetch_announcemnet->fetch()) {
                                        ?>
                                            <tr>
                                                <td><?=$row['announce_what']?></td>
                                                <td><?=date('M-d-Y',strtotime($row['announce_when']));?></td>
                                                <td><?=$row['announce_who']?></td>
                                                <td><?=$row['announce_where']?></td>
                                                <td class="text-center">
                                                   <a href="inputConfig.php?delete_announce=<?=$row['announce_id']?>" class="btn btn-danger" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="delete" onclick="return confirm('Are you sure to delete this?')"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="view_user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Announcment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="inputConfig.php" method="POST">
        <input type="hidden" name="function" value="add_announcement">
        <!-- <input type="hidden" name="user_id" id="user_id"> -->
      <div class="modal-body">
        <div class="py-2">
            <label for="inputWhat">What :</label>
            <input type="text" name="inputWhat" class="form-control" id="inputWhat" placeholder="Title of Announcement/Programs/Activities">
        </div>
        <div class="py-2">
            <label for="inputWhen">When :</label>
            <input type="date" name="inputWhen" class="form-control" id="inputWhen" placeholder="">
        </div>
        <div class="py-2">
            <label for="inputWho">Who :</label>
            <input type="text" name="inputWho" class="form-control" id="inputWho" placeholder="Involve of this Programs or Activities">
        </div>
        <div class="py-2">
            <label for="inputWhere">Where :</label>
            <input type="text" name="inputWhere" class="form-control" id="inputWhere" placeholder="Place of Programs or Activities">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_announcement">Add</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).on('click','#addAnnouncement',function(){
        $("#view_user_modal").modal("show");
    })
</script>
<?php
include 'includes/footer.php';
?>