<?php include_once 'head.php';
include_once 'config.php';
  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen");
}
?>

<?php 
  if(isset($_SESSION['adm$5log#$!@ged%$#in'])){ ?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php';
             
           ?>
            

            <!-- ========== Left Sidebar Start ========== -->
             <?php include_once 'siderbar.php';
          
             ?>
            <!-- Left Sidebar End -->
 
 
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Download Contacts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                            <li class="breadcrumb-ite active">Download Contacts</li>
                                        </ol>
                                    </div>

                                </div>
                                <div class="col-12">
                                <h1 class="alert alert-success text-center display-5 p-3 shadow-sm">Download The Contact of your choice</h1>
                                <div class="row">
                                    <div class="col-12 my-4">
                                    <h4>Contacts</h4>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 p-4 shadow-sm">
                                        <p class="alert alert-info">Contacts from : </p>
                                        <a href="" class="btn btn-primary btn-lg">Download Contacts</a>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 p-4 shadow-sm">
                                        <p class="alert alert-info">Contacts from : </p>
                                        <a href="" class="btn btn-primary btn-lg">Download Contacts</a>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 p-4 shadow-sm">
                                        <p class="alert alert-info">Contacts from : </p>
                                        <a href="" class="btn btn-primary btn-lg">Download Contacts</a>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Status Views.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by wendycreates
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                        <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:44 GMT -->
</html>
<?php } ?>