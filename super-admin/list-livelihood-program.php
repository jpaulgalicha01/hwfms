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
                Livelihood Program
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                                $type = "Livelihood Program";
                                $fetch_announcment = new fetch();
                                $res_fetch_announcemnet = $fetch_announcment->fetchAnnouncement($type);
                                if ($res_fetch_announcemnet->rowCount()>0) {
                                    while ($row = $res_fetch_announcemnet->fetch()) {
                                        ?>
                                            <tr>
                                                <td><?=$row['announce_what']?></td>
                                                <td><?=date('M-d-Y',strtotime($row['announce_when']));?></td>
                                                <td><?=$row['announce_who']?></td>
                                                <td><?=$row['announce_where']?></td>
                                                <td class="text-center">
                                                   <a href="inputConfig.php?delete_annoncement=<?=$row['announce_id']?>" class="btn btn-danger" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="delete" onclick="return confirm('Are you sure to delete this?')"><i class="fa-solid fa-trash"></i></a>
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

<?php
include 'includes/footer.php';
?>