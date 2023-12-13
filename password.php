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
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                    <div class="card-body">
                        <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                        <form>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small text-dark" href="index.php">Return to login</a>
                                <button class="btn btn-primary">Reset Password</button>
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
<?php
include 'includes/footer.php';
?>
