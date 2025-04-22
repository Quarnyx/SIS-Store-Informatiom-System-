<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>

    <?php include('layouts/head.php'); ?>

</head>

<body>

    <!-- Top Bar Start -->
    <?php include('layouts/top-bar.php'); ?>
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <?php include('layouts/side-bar.php'); ?>
    <!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <?php include('daftar-halaman.php'); ?>
            <!-- container -->
            <div class="modal fade bd-example-modal-lg" id="exampleModalLarge" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="myLargeModalLabel"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div><!--end modal-header-->
                        <div class="modal-body">

                        </div><!--end modal-body-->
                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div><!--end modal-->
            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <?php include('layouts/right-bar.php'); ?>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->
            <!--Start Footer-->

            <?php include('layouts/footer.php'); ?>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

    <?php include('layouts/vendor.php'); ?>
</body>
<!--end body-->

</html>