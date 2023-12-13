<?php
include 'includes/autoload.inc.php';
include 'includes/header.php';
?>
<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <a href="index.php">
                    <img src="images/hwfms-logo.png" width="80" height="80" class="position-absolute top-0 start-50 translate-middle-x mt-5" style="z-index:1">
                </a>
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">HWFMS</h3></div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['message'])){
                                ?>
                                    <div class="alert alert-<?= $_SESSION['message_color']?> alert-dismissible fade show mb-2 pb-1" role="alert">
                                      <p><?= $_SESSION['message']?></p>
                                    </div>
                                <?php
                                unset($_SESSION['message']);    
                            }
                        ?>
                        
                        <form action="inputConfig.php" method="POST">
                            <input type="hidden" name="function" value="acc_login">
                            <div class="form-floating mb-3">
                                <input name="acc_uname" class="form-control" id="inputEmail" type="text" placeholder="Enter your username" required />
                                <label for="inputEmail">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="acc_pass" class="form-control" id="inputPassword" type="password" placeholder="Enter your password" required />
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="showPassword" type="checkbox" value="" />
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small text-dark" href="password.php">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary" name="acc_login">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="register.php" class="text-dark">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
function showPassword(){
    if(this.checked){
    // alert("check");
    document.getElementById('inputPassword').setAttribute('type','text')
    }
    else{
    // alert("ubcheck");
    document.getElementById('inputPassword').setAttribute('type','password')
    }
}
document.getElementById('showPassword').addEventListener('click' , showPassword);
</script>


<?php
include 'includes/footer.php';
?>