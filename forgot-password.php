<?php
include 'includes/autoload.inc.php';
sleep(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>HWFC  Management System|| Forgot Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <script src="js/sweetalert.min.js"></script>

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
        <div class="content-wrapper d-flex align-items-center auth justify-content-center bg-img">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo text-center">
                  <a href="index.php">
                    <img src="images/hwfms-logo.png" style="width: 70px;">
                  </a>
                </div>
                <h4>RECOVER PASSWORD</h4>
                <h6 class="font-weight-light">Enter your email address to reset password!</h6>
                <!-- <form class="pt-3" method="post" action="inputConfig.php"> -->
                <div id="change">
                    <form class="pt-3" id="reset_pass">
                    <input type="hidden" name="function" value="reset_pass">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true" name="email_add">
                    </div>
                    <div class="mt-3" id="spinner">
                      <button class="btn btn-success btn-block loginbtn" type="submit" >
                        <span >Reset Password</span>
                      </button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="icon-social-home mr-2"></i>Back Home </a>
                    </div>
                  </form>
                </div>
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
    <script src="js/misc.js"></script>
    <!-- endinject -->

    <script type="text/javascript">
        $(document).on('submit',"#reset_pass",function(e){
          e.preventDefault();
          var formData = new FormData(this);
          formData.append("res_pass",true);

          // alert(formData);
          $.ajax({
            type: "POST",
            url: "inputConfig.php",
            data: formData,
            cache:false,
            processData: false,
            contentType: false,
            beforeSend:function(){
              $("#spinner").html("<button class='btn btn-success btn-block btn-sm' type='button' disabled><span class='spinner-border text-light p-0' role='status'></span></button>");
            },
            success:function(response){
              $('#spinner').removeClass();
                $("#change").html(response);
            }
          });
        });

          // Verify Otp
        $(document).on('submit','#verify_otp',function(f){
          f.preventDefault();
          var formData = new FormData(this);
          formData.append("verify_otp_code",true);
          // alert(formData);

          $.ajax({
            type:"POST",
            url:"inputConfig.php",
            data:formData,
            processData: false,
            contentType: false,
            success:function(res){
                var res = jQuery.parseJSON(res);
                if(res.status == 200){
                  window.location.href="change-password.php?acc_id="+ res.acc_id + "&otp_code="+res.otp_code;
                }else if(res.status == 404){
                  $("#err_msg").text(res.message);
                  // alert("message");
                }
            }
          })

        })

    </script>

  </body>
</html>