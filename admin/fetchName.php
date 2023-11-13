<?php
include 'includes/autoload.inc.php';

if(isset($_POST['user_name'])){
    $name_user = secured($_POST['user_name']);

    $fetch_name = new fetch();
    $res = $fetch_name->fetchName($name_user);

    if($res->rowCount()>0){
        while($row = $res->fetch()){
            ?>
                <div class="px-2">
                    <div class="form-list-group">
                        <ul class="nav-item">
                            <a href="#" class="nav-link text-dark" value="<?=$row['acc_admin_id']?>" id="btn_user_name"><?=$row['acc_fname']?> <?=$row['acc_mname']?> <?=$row['acc_lname']?></a>
                        </ul>
                    </div>
                </div>
            <?php
        }
    }else{
        ?>
        <div class="px-2 my-2">
                <div class="py-2">
                    <p class="text-center">No Data Found</p>
                </div>
        </div>
        <?php
    }
}else{
    header("Location: index.php");
}
?>
