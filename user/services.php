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

    <div class="row py-5" id="services">
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/services.jpg) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-center text-white">
                    <h1 class="hero-txt">City Serivces</h1>

                    <marquee style="height:350px; text-align:center" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                    	<?php
                        $city_notice = new fetch();
                        $res = $city_notice->fetchService();

                        if($res){
                            while($row = $res->fetch()){
                                $date = $row['sched_events_date'];
                                $result = date("M-d-Y",strtotime($date));
                                ?>
                                    <a href="view-services.php?id=<?=$row['sched_events_id']?>" style="text-decoration: none; color:#fff" target="_blank"><p class="hero-txt fs-6"><?=$row['sched_events_title']?> (<?=$result?>)</p><hr></a> 
                                <?php
                                }
                            }
                        ?>  
                    </marquee>

                </div>
            </div>
        </div>
    </div>

    <div class="row py-5" >
        <div class="col-12" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/services.jpg) !important; background-size:cover; min-height: 500px;">
            <div class="d-flex justify-content-center py-5">
                <div class="col-8 text-center text-white">
                    <h1 class="hero-txt">Barangay Serivces</h1>

                    <marquee style="height:350px; text-align:center" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                    	
                        <?php
                        $brgy_notice = new fetch();
                        $res_brgy = $brgy_notice->fetchServiceBrgy();

                        if($res_brgy){
                            while($row_brgy = $res_brgy->fetch()){
                                $date = $row_brgy['sched_events_date'];
                                $result_brgy = date("M-d-Y",strtotime($date));
                                ?>
                                    <a href="view-services.php?id=<?=$row_brgy['sched_events_id']?>" style="text-decoration: none; color:#fff" target="_blank"><p class="hero-txt fs-6"><?=$row_brgy['sched_events_title']?> (<?=$result_brgy?>)</p><hr></a> 
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