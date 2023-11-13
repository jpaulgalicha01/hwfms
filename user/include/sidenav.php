<div class="sidebar d-xxl-none d-xl-none d-lg-none d-block" id="side_nav">

    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-end">

        <!-- Close Btn -->
        <button class="btn d-xxl-none d-xl-none d-lg-none d-block close-btn p-5 py-0 text-dark">
            <i class="bi bi-x-lg" style="font-weight: 900 !important;"></i>
        </button>

    </div>

    <ul class="list-unstyled ps-5 pt-5">
        
        <li class=" px-4 py-3 d-block">
            <a href="index.php#city_announce" class="px-3 text-decoration-none">
                City Announcement
            </a>
        </li>        
        <li class=" px-4 py-3 d-block">
            <a href="index.php#brgy_announce" class="px-3 text-decoration-none">
                Barangay Announcement
            </a>
        </li>
        <li class=" px-4 py-3 d-block">
            <a href="services.php#services" class="px-3 text-decoration-none">
                Services
            </a>
        </li>        
        <li class=" px-4 py-3 d-block">
            <a href="<?php if(isset($_SESSION['election_type'])){ echo'pre-register.php'; }else{ echo'#'; }?>" target="_blank" class="px-3 text-decoration-none">
            Pre-Registration (<?php 
                            if($_SESSION['election_status']=="open"){
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
        <li class=" px-4 py-3 d-block">
            <a href="dashboard/index.php" class="px-3 text-decoration-none">
                Dashboard
            </a>
        </li>

    </ul>

</div>