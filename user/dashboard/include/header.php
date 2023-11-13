<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HWFC  Management System || Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a href="index.php"><img src="../../images/hwfms-logo.png" width="50" style="height: 100%; min-height:50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php#member">Officer of Organiztion</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="list-appointment.php">List of Appointment</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Election
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="brgy-election.php">Barangay 
                    <?php
                        $check_election_brgy = new fetch();
                        $res = $check_election_brgy->checkElectionbrgy();

                        if($res->rowCount()==1){
                            ?>
                                <span class="badge bg-success">Open</span>
                            <?php
                        }else{
                            ?>
                                <span class="badge bg-danger">Close</span>
                            <?php
                        }
                    ?>
                </a></li>
                <li><a class="dropdown-item" href="org-election.php">Organization <?php
                        $check_election_org = new fetch();
                        $res = $check_election_org->checkElectionorg();

                        if($res->rowCount()==1){
                            ?>
                                <span class="badge bg-success">Open</span>
                            <?php
                        }else{
                            ?>
                                <span class="badge bg-danger">Close</span>
                            <?php
                        }
                    ?></a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../">Announcement</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                (<?=$name?>)
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>