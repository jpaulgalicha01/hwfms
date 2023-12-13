<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Title - HWFMS</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
        
        <!-- Include Simple DataTables CSS and JavaScript -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/ajax.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            include 'includes/navbar.php';
        ?>

        <?php
            if(isset($_SESSION['message']) && isset($_SESSION['message_color'])){
                ?>
                    <div class="alert alert-<?= $_SESSION['message_color']?> alert-dismissible fade show" role="alert" style="position: absolute; align-self: end; top:15%; right: .5%;">
                      <?= $_SESSION['message']?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                unset($_SESSION['message'],$_SESSION['message_color']);             
            }
        ?>