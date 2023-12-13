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
                        Registration Period
                    </div>
                    <div class="card-body my-1">
                        <p>Registration Year: <span>2023</span></p>
                        <p>Status Registration: <span class="bg-success p-1 rounded text-white">Active</span></p>
                    </div>
                </div>
            </div>
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
                <div class="card bg-dark bg-opacity-75 text-white mb-4 p-1">
                    <div class="card-body">Total Admin</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$count_admin?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark bg-opacity-75 text-white mb-4 p-1">
                    <div class="card-body">Total Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$count_users?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark bg-opacity-75 text-white mb-4 p-1">
                    <div class="card-body">Total Barangay</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$count_brgy?></p>
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
                    <div class="card-body">Livelihood Program</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$count_livelihood_program?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-white mb-4 p-1">
                    <div class="card-body">Job offers</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white stretched-link fs-5"><?=$count_job_offers?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Admin Active
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Users Online
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
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
                    <div class="col-xl-4 col-lg-4 col-12 pb-3 m-2">
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
<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
<?php
include 'includes/footer.php';
?>