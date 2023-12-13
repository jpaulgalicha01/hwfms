<?php
include 'includes/autoload.inc.php';
include 'includes/header.php';
?>

<main>
	<div class="container-fluid">
		<div class="row">
		  <div class="col-xl-2 col-lg-2 col-md-2 col-3 shadow py-4">
		    <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy ">
		      <h6>City Announcement</h6>
		      <a class="p-1 text-success" href="#job-offers">Job Offers</a>
		      <a class="p-1 text-success" href="#livelihood-program">Livelihood Program</a>
		      <h6 class="pt-5">Barangay Announcement</h6>
		      <a class="p-1 text-success" href="#barangay">Announcement</a>
		    </div>
		  </div>
		  <div class="col-xl-10 col-lg-10 col-md-10 col-9 py-4">
		    <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example px-4" tabindex="0" style="height: 100%; min-height: 555px; max-height:560px; width: auto; overflow-y: scroll;">
				
				<h1 class="pb-3"><u>City Announcement</u></h1>
				<h5 id="job-offers">*Job Offers*</h5>
				<div class="row pb-4">
					<?php
						$fecth_job_offers = new fetch();
						$res_fetch_job_offers = $fecth_job_offers->fecthJobOffers();

						if($res_fetch_job_offers->rowCount()>0){
							while ($job_offers = $res_fetch_job_offers->fetch()) {
								?>
									<div class="col-md-4 py-xl-2 py-lg-2 py-md-3 py-3" style="cursor: pointer;">
										<div class="card p-2 shadow">
											<h1>Title: <?=$job_offers['announce_what']?></h1>
											<p>Date: <?=date('M-d-Y',strtotime($job_offers['announce_when']))?></p>
											<a href="announcement-content.php?id=<?=$job_offers['announce_id']?>" class="text-success">See More..</a>
										</div>
									</div>
								<?php
							}
						}
					?>
					
				</div>

				<h5 id="livelihood-program">*Livelihood Program*</h5>
				<div class="row pb-4">
					<?php
						$fecth_livelihood_program = new fetch();
						$res_fetch_livelihood_program = $fecth_livelihood_program->fecthLivelihoodProgram();

						if($res_fetch_livelihood_program->rowCount()>0){
							while ($livelihood_program = $res_fetch_livelihood_program->fetch()) {
								?>
									<div class="col-md-4 py-xl-2 py-lg-2 py-md-3 py-3" style="cursor: pointer;">
										<div class="card p-2 shadow">
											<h1>Title: <?=$livelihood_program['announce_what']?></h1>
											<p>Date: <?=date('M-d-Y',strtotime($livelihood_program['announce_when']))?></p>
											<a href="announcement-content.php?id=<?=$livelihood_program['announce_id']?>" class="text-success">See More..</a>
										</div>
									</div>
								<?php
							}
						}
					?>
				</div>

				<h1 class="pt-3" id="barangay"><u>Barangay Announcement</u></h1>
				<div class="row pb-4">
					<?php
						$fecth_barangay = new fetch();
						$res_fetch_barangay = $fecth_barangay->fecthBarangay();

						if($res_fetch_barangay->rowCount()>0){
							while ($barangay = $res_fetch_barangay->fetch()) {
								?>
									<div class="col-md-4 py-xl-2 py-lg-2 py-md-3 py-3" style="cursor: pointer;">
										<div class="card p-2 shadow">
											<h1>Title: <?=$barangay['announce_what']?></h1>
											<p>Date: <?=date('M-d-Y',strtotime($barangay['announce_when']))?></p>
											<a href="announcement-content.php?id=<?=$barangay['announce_id']?>" class="text-success">See More..</a>
										</div>
									</div>
								<?php
							}
						}
					?>
				</div>

		    </div>
		  </div>
		</div>
	</div>
</main>
<?php
include 'includes/footer.php';
?>