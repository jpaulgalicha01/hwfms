<?php
include 'includes/autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hinigaran womens federation || User signup Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
   <style type="text/css">
      .bg-img{
            background-image: url("images/Banner.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center justify-content-center bg-img">
          <div class="row flex-grow">
            <div class="col-lg-5 col-md-6 mx-auto">
              <div class="card text-left p-5">
                <div class="text-center">
                       <h2> Hinigaran Womens Federation</h2>
                </div>
                <h4 class="text-center">Create Your Account</h4>

                <form class="pt-3" action="inputConfig.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="function" value="create_user">
                  <div class="form-group">
                    <label for="">User Photo</label>
                    <input type="file" name="profile_img" accept=".jpg, .png, .jpeg" class="form-control" required='true'>
                  </div>
                  <div class="form-group">
                    <label for="">First Name: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="First Name" required name="fname">
                  </div>
                  <div class="form-group">
                    <label for="">Middle Name: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="(Optional)" name="mname">
                  </div>
                  <div class="form-group">
                    <label for="">Last Name: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="Last Name" required name="lname">
                  </div>                  
                  <div class="form-group">
                    <label for="">Birthdate: </label>
                    <input type="date" class="form-control form-control-lg" placeholder="MM-DD-YYYY" required name="birth">
                  </div>
                  <div class="form-group">
                    <label for="">Barangay: </label>
                    <select class="form-control form-control-lg text-center" name="address" id="brgy" required>
                      <option value="" selected disabled>--- PLEASE SELECT BARANGAY ---</option>
                          <option>Barangay 1</option>
                          <option>Barangay 2</option>
                          <option>Barangay 3</option>
                          <option>Barangay 4</option>
                          <option>Anahaw</option>
                          <option>Aranda</option>
                          <option>Baga-as</option>
                          <option>Bato</option>
                          <option>Calapi</option>
                          <option>Camalobalo</option>
                          <option>Camba-og</option>
                          <option>Cambugsa</option>
                          <option>Candumarao</option>
                          <option>Gargato</option>
                          <option>Himaya</option>
                          <option>Miranda</option>
                          <option>Nanunga</option>
                          <option>Narauis</option>
                          <option>Paticui</option>
                          <option>Pilar</option>
                          <option>Quiwi</option>
                          <option>Tagda</option>
                          <option>Tuguis</option>
                          <option>Palayog</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Organization: </label>
                    <select class="form-control form-control-lg text-center" name="org" id="result" required>
                      <option value="" selected disabled>--- PLEASE SELECT ORGANIZATION ---</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Email Address: </label>
                    <input type="email" class="form-control form-control-lg" placeholder="email@email.com" required name="email">
                  </div>
                  <div class="form-group">
                    <label for="">Phone Number: </label>
                    <input type="tel" class="form-control form-control-lg" placeholder="09xxxxxxxxx" required name="phone" pattern="[0-9]{2}[0-9]{9}">
                  </div>
                  <div class="form-group">
                    <label for="">Username: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="Username" required name="uname">
                  </div>
                  <div class="form-group">
                    <label for="">Password: </label>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" required name="password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="create_user" type="submit">Register</button>
                  </div>
                  <hr>
                  <div class="mb-2">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Already Account </a>
                  </div>


</form>
</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>

<script>       
  $(document).ready(function(){
    $("#brgy").change(function(){
      var value = document.getElementById("brgy").value;
      // alert(value);
      $.ajax({
        type:"POST",
        url:"inputConfig.php",
        data:{value:value, function:"fetch_org"},
        success:function(response){
          $("#result").html(response);
        }
      })
    });
  });
</script>
<!-- endinject -->
</body>
</html>