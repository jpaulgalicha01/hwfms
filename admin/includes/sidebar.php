<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../uploads/<?=$user_profile?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$name?></p>
                  <p class="designation">
                </div>
               
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link"><?=$_SESSION['title']?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Barangay Org</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-organization.php">Add Organization</a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-organization.php">Manage Organization</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="manage-user.php">
              <span class="menu-title">Manage Users
              <?php
                      $count_user_new = new fetch();
                      $res = $count_user_new->countUserNew();

                      if($res){
                        ?>
                          <span class='badge badge-dark'><?=$res->rowCount();?></span>
                        <?php
                      }
                    ?>
              </span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Announcement</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-notice.php"> Add Announcement </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-notice.php"> Manage Announcement </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Services</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add-services.php"> Add Services </a></li>
                  <li class="nav-item"> <a class="nav-link" href="manage-service.php"> Manage Services </a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#appointment" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Appointment</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="appointment">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="manage-appointment.php">List of Appointment </a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#elect" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Election</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="elect">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pre-register.php">Pre Registration</a></li>
                  <li class="nav-item"> <a class="nav-link" href="election-period.php">Election Period</a></li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>