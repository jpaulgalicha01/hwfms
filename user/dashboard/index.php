<?php
include 'include/autoload.inc.php';
include 'include/header.php';
?>

<div class="container py-3">
        <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

    </div>
    <div class="carousel-inner">

        <div class="carousel-item active">
        <img src="../img/Banner.jpg" width="100%" style="height:90%; max-height: 480px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
        </div>

        <div class="carousel-item">
        <img src="../img/banner1.png" width="100%" style="height:90%; max-height: 480px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
        </div>
        <div class="carousel-item">
        <img src="../img/banner2.png" width="100%" style="height:90%; max-height: 480px;">
        <div class="carousel-caption d-none d-md-block">
        </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
        </div>
</div>

<div class="bg-dark-subtle" id="member" style="height:100%; min-height:480px;">
    <h1 class="text-center py-4">Officer of Organization</h1>
    <div class="container py-5">
        <div class="row d-flex align-items-center">

        <?php
            $fetch_org_mem = new fetch();
            $res = $fetch_org_mem->fetchOrgMem();

            if($res){
                while($row = $res->fetch()){
                    $name = $row['org_mem_name_id'];
                    ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="card border-secondary mb-3" >
                                <div class="card-header text-center">
                                    <?php
                                        $mem_img = new fetch();
                                        $mem_img->fetchImg($name);
                                    ?>
                                </div>
                                <div class="card-body text-secondary">
                                    <h5 class="card-title"><?=$row['org_mem_name']?></h5>
                                    <p class="card-text"><?=$row['org_mem_pos']?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="card border-secondary mb-3" >
                            <div class="card-body text-secondary">
                                <p class="card-text text-center">No Data Found</p>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>

        
        </div>
    </div>
</div>


<?php
include 'include/footer.php';
?>
