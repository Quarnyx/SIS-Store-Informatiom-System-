<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>


    <meta charset="utf-8" />
    <title>Login | SIS ( Store Informatiom System )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>


<!-- Top Bar Start -->

<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/logo-sm.png" height="50" alt="logo"
                                                class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Selamat Datang di Store
                                            Information System</h4>
                                        <p class="text-muted fw-medium mb-0">Login untuk masuk ke aplikasi.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form class="my-4" action="proses-login.php" method="post">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Masukkan username">
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="userpassword" placeholder="Masukkan password">
                                        </div><!--end form-group-->
                                        <!-- alert -->
                                        <?php if (isset($_GET['pass'])) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                                <i class="mdi mdi-close" data-bs-dismiss="alert" aria-label="Close"></i>
                                                Password Salah
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($_GET['username'])) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                                <i class="mdi mdi-close" data-bs-dismiss="alert" aria-label="Close"></i>
                                                Username Salah
                                            </div>
                                        <?php } ?>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i
                                                            class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->

                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
</body>
<!--end body-->

</html>