<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Profiling</div>
                            <a class="nav-link" href="list-user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                List of User
                            </a>

                            <div class="sb-sidenav-menu-heading">Barangay Activities</div>
                            <a class="nav-link" href="list-announcement.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Announcement
                            </a>
<!--                             <a class="nav-link" href="list-organization.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Services
                            </a> -->

                            <div class="sb-sidenav-menu-heading">Election</div>
                            <a class="nav-link" href="election-period.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Election Period
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <div class="py-0">
                            <small><?= $user_name?> (<?= $user_type?>)</small>
                        </div>
                        <small><u><?=$user_address?></u></small>
                    </div>
                </nav>
            </div>