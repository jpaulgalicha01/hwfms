<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Profiling</div>
                            <a class="nav-link" href="list-association.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                List of Association
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Manage Barangay Admin</div>
                            <a class="nav-link" href="add-admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-add"></i></div>
                                Add Admin
                            </a>
                            <a class="nav-link" href="admin-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                List of Admin
                            </a>

<!--                             <div class="sb-sidenav-menu-heading">List of User</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                User
                            </a> -->

                            <div class="sb-sidenav-menu-heading">Announcement</div>
                            <a class="nav-link" href="add-announcement.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                Add Announcement
                            </a>
                            <a class="nav-link" href="list-livelihood-program.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-note"></i></div>
                                Livelihood Program
                            </a>
                            <a class="nav-link" href="list-job-offers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Job Offers
                            </a>

                            <div class="sb-sidenav-menu-heading">Election</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-note"></i></div>
                                Registration Period
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Election Period
                            </a>


                       <!--      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
<!--                             <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.php">Register</a>
                                            <a class="nav-link" href="password.php">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.php">401 Page</a>
                                            <a class="nav-link" href="404.php">404 Page</a>
                                            <a class="nav-link" href="500.php">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <small><?= $user_name?></small>
                    </div>
                </nav>
            </div>