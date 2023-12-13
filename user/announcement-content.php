<?php
include 'includes/autoload.inc.php';
include 'includes/header.php';

$header = "";
$what = "";
$when = "";
$who = "";
$where = "";

if($_SERVER['REQUEST_METHOD'] == "GET"){
	$announce_id = $_GET['id'];

	$fetch_announce  = new fetch();
	$res_fetch_announce = $fetch_announce->fetchAnnounce($announce_id);
	if($res_fetch_announce->rowCount()==1){
		$fetch = $res_fetch_announce->fetch();

		$header = $fetch['announce_brgy'];
		$what = $fetch['announce_what'];
		$when = date('M-d-Y',strtotime($fetch['announce_when']));
		$who = $fetch['announce_who'];
		$where = $fetch['announce_where'];
	}else{
		ob_end_flush(header("Location: index.php"));
	}
}else{
	return false;
}

?>

<main>
	<div class="container-fluid">
		<div class="row">
		  <div class="col-xl-2 col-lg-2 col-md-2 col-3 shadow py-4">
		    <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy ">
		      <h6>City Announcement</h6>
		      <a class="p-1 text-success" href="announcement.php#job-offers">Job Offers</a>
		      <a class="p-1 text-success" href="announcement.php#livelihood-program">Livelihood Program</a>
		      <h6 class="pt-5">Barangay Announcement</h6>
		      <a class="p-1 text-success" href="announcement.php#barangay">Announcement</a>
		    </div>
		  </div>
		  <div class="col-xl-10 col-lg-10 col-md-10 col-9 py-4">
		    <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example px-4" tabindex="0" style="height: 100%; min-height: 555px; max-height:560px; width: auto; overflow-y: scroll;">
		      <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a>
		      <h1 class="pb-3"><u><?= $header?> Announcement</u></h1>
		      	<h5 id="job-offers">*Job Offers*</h5>
			    <div class="row pb-4">
	      			<div class="pt-2">
	      				<h1>What: </h1>
      					<p class="px-5 fs-4"><?= $what?></p>
	      			</div>
	      			<div class="pt-2">
	      				<h1>When: </h1>
      					<p class="px-5"><?= $when?></p>
	      			</div>
	      			<div class="pt-2">
	      				<h1>Who: </h1>
      					<p class="px-5"><?= $who?></p>
	      			</div>
	      			<div class="pt-2">
	      				<h1>Where: </h1>
      					<p class="px-5"><?= $where?></p>
	      			</div>
		      	</div>
		    </div>
		  </div>
		</div>
	</div>
</main>
<?php
include 'includes/footer.php';
?>