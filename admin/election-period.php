<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "Election"; 

    include 'includes/header.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Election</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Election
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary btn-sm">Add Year Election</a>
                <div class="table-responsive pt-4">
                    <table id="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Year Election</th>
                                <th>Participant</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2023</td>
                                <td>20</td>
                                <td>
                                    <span class="bg-success p-1 rounded text-white">Active</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm">
                                        edit
                                    </button>
                                </td>
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