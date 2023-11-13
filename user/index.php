<?php
include 'include/autoload.inc.php';
include 'include/header.php';
?>

    <title>Home</title>


</head>
<body>
    <div class="container-fluid">
        <?php
        include 'include/sidenav.php';
        include 'include/nav.php';
        ?>

    <div class="row py-5" id="city_announce">
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/city_hall.png) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-center text-white">
                    <h1 class="hero-txt">City Announcement</h1>

                    <marquee style="height:350px; text-align:center" direction="up" onmouseover="this.stop();" onmouseout="this.start();">

                    <?php
                        $city_notice = new fetch();
                        $res = $city_notice->fetchNotice();

                        if($res){
                            while($row = $res->fetch()){
                                $date = $row['sched_events_date'];
                                $result = date("M-d-Y",strtotime($date));
                                ?>
                                    <a href="view-announcement.php?id=<?=$row['sched_events_id']?>" style="text-decoration: none; color:#fff" target="_blank"><p class="hero-txt fs-6"><?=$row['sched_events_title']?> (<?=$result?>)</p><hr></a> 
                                <?php
                            }
                        }
                    ?>                    
                    </marquee>

                </div>
            </div>
        </div>
    </div>
    <div class="row py-5" id="brgy_announce">
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/city_hall.png) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-center text-white">
                    <h1 class="hero-txt">Barangay Announcement</h1>

                    <marquee style="height:350px; text-align:center" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                    
                    <?php
                        $brgy_notice = new fetch();
                        $res_brgy = $brgy_notice->fetchNoticeBrgy();

                        if($res_brgy){
                            while($row_brgy = $res_brgy->fetch()){
                                $date_brgy = $row_brgy['sched_events_date'];
                                $result_brgy = date("M-d-Y",strtotime($date_brgy));
                                ?>
                                    <a href="view-announcement.php?id=<?=$row_brgy['sched_events_id']?>" style="text-decoration: none; color:#fff" target="_blank"><p class="hero-txt fs-6"><?=$row_brgy['sched_events_title']?> (<?=$result_brgy?>)</p><hr></a> 
                                <?php
                            }
                        }
                    ?>


                    </marquee>

                </div>
            </div>
        </div>
    </div>

    
        <?php
        include 'include/footer.php';
        include 'include/script.php';
        ?>

    </div>

</body>
</html>