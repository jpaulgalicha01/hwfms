<?php
include 'include/autoload.inc.php';
include 'include/header.php';

$title= "";
$date= "";
$message="";

if(isset($_REQUEST['id'])){
    $value = secured($_REQUEST['id']);

    $viewNotice = new fetch();
    $res = $viewNotice->viewNotice($value);

    if($res){
        $row = $res->fetch();
        $title=$row['sched_events_title'];
        $change = $row['sched_events_date'];
        $date = date("M-d-Y",strtotime($change));
        $message = $row['sched_events_message'];
    }
}
?>

    <title>View Announcement</title>


</head>
<body>
    
    <div class="container-fluid">


    <div class="row" id="announcement">
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/city_hall.png) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-white">
                    <h1 class="hero-txt text-center">Announcement</h1>
                    
                    <div class="py-5 form-group">
                        <h3 style="font-size: calc(.7rem + .7rem) !important"><b class="text-uppercase"><?=$title?></b> (<i><?=$date?></i>)</h3><br><br>
                        <textarea class="form-control" cols="50" rows="10" disabled><?=$message?></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>


        <?php
        include 'include/footer.php';
        ?>

    </div>

</body>
</html>