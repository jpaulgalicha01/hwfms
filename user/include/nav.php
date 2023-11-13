<!-- Navbar/Header -->
<div class="row bg-hero d-xxl-block d-xl-block d-lg-block d-none">
    <div class="col-12 py-3">
        <div class="row justify-content-center">

            <div class="col-2">
                <p class="fs-1 text-white text-center">
                    <a href="index.php"><img src="../images/hwfms-logo.png" width="100" style="height: 100%; min-height:100px;"></a>
                </p>
            </div>

            <div class="col-12 navig-links">
                <ul class="d-flex flex-row justify-content-center m-0 list-unstyled">

                    <li>
                        <a href="index.php#city_announce" class="px-3 text-decoration-none">
                        City Announcement
                        </a>
                    </li>

                    <li>
                        <a href="index.php#brgy_announce" class="px-3 text-decoration-none">
                        Barangay Announcement
                        </a>
                    </li>

                    <li>
                        <a href="services.php#services" class="px-3 text-decoration-none">
                        Services
                        </a>
                    </li>
                    <li>
                        <a href="<?php if(isset($_SESSION['election_type'])){ echo'pre-register.php'; }else{ echo'#'; }?>" target="_blank" class="px-3 text-decoration-none">
                            Pre-Registration (<?php 
                            if(isset($_SESSION['election_status']) && $_SESSION['election_status']=="open"){
                                ?>
                                    <font color="#198754">Open</font>
                                <?php
                            }else{
                                ?>
                                    <font color="#dc3545">Closed</font>
                                <?php
                            }
                                ?>)
                        </a>
                    </li>

                    <li>
                        <a href="dashboard/index.php" class="px-3 text-decoration-none">
                            Dashboard
                        </a>
                    </li>

                </ul>
            </div>

            <div class="col-12 py-5 my-5">
                <div class="row py-5 my-5">

                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-8">
                                <h1 class="fs-2 hero-txt text-uppercase text-white text-center">
                                Hinigaran Women's Federation Community Management System
                                </h1>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </div>
</div>

<!-- For SideNav -->
<nav class="navbar bg-side navbar-expand-lg d-xxl-none d-xl-none d-lg-none d-block py-0">

    <div class="px-1 py-1">

        <div class="d-flex img_size_md_div">

            <button class="btn pe-md-5 col-1 pe-sm-4 pe-4 py-0 open-btn d-flex justify-content-start align-self-center">
                <i class="bi bi-list" style="font-size: 1.5rem; color: rgb(255,255,255);"></i>
            </button>

            <div class="d-flex col-11 justify-content-center pe-4">
                <a href="site.php" class="text-decoration-none">
                    <p class="fs-1 text-white text-center">
                        <a href="index.php"><img src="../images/hwfms-logo.png" width="60" style="height: 100%; min-height:60px;"></a>
                    </p>
                </a>
            </div>

        </div>

    </div>

</nav>