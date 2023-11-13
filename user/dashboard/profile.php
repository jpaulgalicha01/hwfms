<?php
include 'include/autoload.inc.php';
include 'include/header.php';
?>

<div class="container py-3">
	<div class="row">
		<div class="col-lg-1 col-md-1"></div>

		<div class="col-lg-10 col-md-10 col-12">
			<div class="card bg-light p-3">
				<h4 class="text-center">Personal Information</h4>
				<div class="text-center py-3">
				<img src="../../uploads/<?=$profile?>" width="150" height="150">
				</div>
				<form action="inputConfig.php" method="POST" enctype="multipart/form-data" class="form-group">
					<input type="hidden" name="function" value="update_admin_info">
                      <input type="hidden" name="user_id" value="<?=$user_id?>">

					<div class="py-3">
					<label>Change Profile Image</label>
                  	<input type="file" name="profile_img" accept=".jpg, .png, .jpeg" class="form-control">
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<label>First Name</label>
                  	    <input type="text" name="fname" value="<?=$fname?>" class="form-control" required='true'>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<label>Middle Name</label>
                      	<input type="text" name="mname" value="<?=$mname?>" class="form-control" required='true'>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<label>Last Name</label>
	                    <input type="text" name="lname" value="<?=$lname?>" class="form-control" required='true'>

					</div>
				</div>
				<div class="py-3">
					<label>Date Of Birth</label>
                  	<input type="date" name="birth" value="<?=$birth?>" class="form-control" required='true'>

				</div>
				<div class="py-3">
					<label>Contact Number</label>
		            <input type="text" name="contact" value="<?=$contact?>" class="form-control" required='true'>

				</div>
				<div class="py-3">
					<label>Email Address</label>
                    <input type="text" name="email" value="<?=$email?>" class="form-control" required='true'>

				</div>
				<h2>Login Details</h2>
				<div class="py-3">
					 <label for="">User Name</label>
                     <input type="text" name="uname"value="<?=$uname?>" class="form-control" required='true'>
				</div>
				<div class="py-3">
					<label for="">Current Password</label>
                    <input type="text" name="cpass"value="" class="form-control">
				</div>
				<div class="py-3">
					<label for="">New Password</label>
                    <input type="text" name="npass" value="" class="form-control">
				</div>
				<h2>Services</h2>
				<div class="py-2">
                  	<ul class="list-group">
                  		<div class="py-2">
                  			<p>City Services</p>
                  			<?php
                   	 		  $status="CS";
                              $fetch_city_serv = new fetch();
                              $res_serv_city = $fetch_city_serv->fetchCityServ($status);

                              if($res_serv_city->rowCount()>0){
                                while ($row_serv_city = $res_serv_city->fetch()) {
                                  ?>
                                      <li class="list-group-item"><?=$row_serv_city['ser_name']?> (<?=$row_serv_city['ser_date']?>)<br>
                                      	sponsor: <b><?=$row_serv_city['ser_sponsor']?></b>
                                      </li>
                                  <?php
                                }
                              }else{
                                ?>
                                    <li class="list-group-item">No Data Found</li>
                                <?php
                              }
                            ?>
                  		</div>
                  		<div class="py-2">
                  			<p>Barangay Services</p>
                   	 		<?php
                   	 		  $status="BS";
                              $fetch_city_serv = new fetch();
                              $res_serv_city = $fetch_city_serv->fetchCityServ($status);

                              if($res_serv_city->rowCount()>0){
                                while ($row_serv_city = $res_serv_city->fetch()) {
                                  ?>
                                      <li class="list-group-item"><?=$row_serv_city['ser_name']?> (<?=$row_serv_city['ser_date']?>)<br>
                                      	sponsor: <b><?=$row_serv_city['ser_sponsor']?></b>
                                      </li>
                                  <?php
                                }
                              }else{
                                ?>
                                    <li class="list-group-item">No Data Found</li>
                                <?php
                              }
                            ?>
                  		</div>
                	</ul>
				</div>
				<button type="submit" class="btn btn-success btn-sm form-control" name="update_admin_info">Update</button>
				</form>
			</div>
			
		</div>

		<div class="col-lg-1 col-md-1"></div>
	</div>
</div>


<?php
include 'include/footer.php';
?>