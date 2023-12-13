<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "Dashboard"; 

    include 'includes/header.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item active">Election Status :</li>
        </ol>
        <div class="row pb-4">
            <div class="col-md-6 my-sm-2 my-2">
                <div class="card">
                    <div class="card-header">
                        Election Period
                    </div>
                    <div class="card-body my-1">
                        <p>Election Year: <span>2023</span></p>
                        <p>Status Election: <span class="bg-success p-1 rounded text-white">Active</span></p>
                    </div>
                </div>
            </div>
        </div>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item active">Users :</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 p-1">
                    <div class="card-body">Total Users Account</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$account_total?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4 p-1">
                    <div class="card-body">Account Accept</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$account_accept?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4 p-1">
                    <div class="card-body">Account Declined</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$account_declined?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4 p-1">
                    <div class="card-body">Account Pending</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$account_pending?></p>
                    </div>
                </div>
            </div>
        </div>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item active">Announcement :</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark text-white mb-4 p-1">
                    <div class="card-body">Total Announcement</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$announce_count?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2 row">
            <div class="col-md-12 pb-5">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        List of Officers
                    </div>
                    <div class="card-body">
                        <div class="row pb-4">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                <div class="shadow p-3">
                                    <p class="fs-4">President:</p>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                            <img src="../images/hwfms-logo.png" width="100" height="100" style="border-radius: 50%; fit: ;">
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-6">
                                            <label>Name </label>
                                            <p>Name Name Nameasdddd</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Activity Logs
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-start">
                    <div class="col-md-5 pb-3 m-2">
                        <label>Date:</label>
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
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