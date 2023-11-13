<?php
include 'include/autoload.inc.php';
include 'include/header.php';

$title= "";
$date= "";
$message="";

if(isset($_REQUEST['id'])){
    $value = secured($_REQUEST['id']);

    $viewNotice = new fetch();
    $res = $viewNotice->viewService($value);

    if($res){
        $row = $res->fetch();
        $title=$row['sched_events_title'];
        $change = $row['sched_events_date'];
        $date = date("M-d-Y",strtotime($change));
        $message = $row['sched_events_message'];
    }
}
?>

    <style type="text/css">
        textarea {
              width: 100%;
              height: 250px;
              padding: 12px 20px;
              box-sizing: border-box;
              border: 2px solid #ccc;
              border-radius: 4px;
              background-color: rgba(255,255,255, .8);
              font-size: 16px;
              resize: none;
            }
                </style>
    <title>View Services</title>


</head>
<body>
    
    <div class="container-fluid">


    <div class="row" id="announcement">
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)), url(img/services.jpg) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-white">
                    <h1 class="hero-txt text-center">Services</h1>
                    
                    <div class="py-5 form-group">
                        <h3 style="font-size: calc(.5rem + .7rem) !important"><b class="text-uppercase"><?=$title?></b> (<i><?=$date?></i>)</h3><br><br>
                            <div class="mb-3">
                              <textarea disabled><?=$message?></textarea>
                            </div>
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