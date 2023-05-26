<?php include_once 'head.php';
  if(!isset($_SESSION['use%#5log#&45@ger%$#pa'])){
    header("Location:index");
} elseif($_SESSION['use%#5log#&45@ger%$#pa'] != true){
    header("Location:auth-lock-screen");
}
?>
<?php 
  if(isset($_SESSION['use%#5log#&45@ger%$#pa'])){ ?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php' ?>
            

            <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'siderbar.php' ?>
            <!-- Left Sidebar End -->

            


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->

                        <?php if(isset($_SESSION['contactmsg']) and $_SESSION['contactmsg'] == 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['contactmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php }

                        elseif(isset($_SESSION['contactmsg']) and $_SESSION['contactmsg'] !== 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['contactmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Contacts</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">All Quotes</a></li> -->
                                            <li class="breadcrumb-item active">Add all Contact Links</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form  action="add-contact-process" method='post' >
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="productname">Contact Name:</label>
                                                        <input id="productname" name="name" type="text" class="form-control" placeholder="Enter name of the Contact...">
                                                    </div>
                                                    

                                                    <div class="mb-3">
                                                        <label for="phone">Contact Number:</label>
                                                        <div class="row">
                                                            <div class="col-3">
                                                            <select name="code" id="country" class="form-select shadow-sm p-3">
                  <option value="+234">+234 &nbsp; Nigeria</option>
                 
                </select>
                                                            </div>
                                                            <div class="col-9">
                                                            <input id="phone" name="phone" type="tel" class="form-control shadow-sm p-3" placeholder="Enter the Contact Number...">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <label for="manufacturername">Manufacturer Name</label>
                                                        <input id="manufacturername" name="manufacturername" type="text" class="form-control" placeholder="Manufacturer Name">
                                                    </div> -->
                                                    <!-- <div class="mb-3">
                                                        <label for="manufacturerbrand">Manufacturer Brand</label>
                                                        <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control" placeholder="Manufacturer Brand">
                                                    </div> -->
                                                    <!-- <div class="mb-3">
                                                        <label for="price">Price</label>
                                                        <input id="price" name="price" type="text" class="form-control" placeholder="Price">
                                                    </div> -->
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <!-- <div class="mb-3">
                                                        <label class="control-label">Category</label>
                                                        <select class="form-control select2">
                                                            <option>Select</option>
                                                            <option value="FA">Fashion</option>
                                                            <option value="EL">Electronic</option>
                                                        </select>
                                                    </div> -->
                                                    <!-- <div class="mb-3">
                                                        <label class="control-label">Features</label>
        
                                                        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                                            <option value="WI">Wireless</option>
                                                            <option value="BE">Battery life</option>
                                                            <option value="BA">Bass</option>
                                                        </select>
        
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label for="password">Password:</label>
                                                        <input id="passwor" name="password" value="<?=$_SESSION['password']?>" type="text" readonly class="form-control" type='password' placeholder="Enter the Member Password...">
                                                    </div>
                                                    <div class="mb-3">
                                                    <label for="plan" class="form-label">Selected Plan:</label>
                                                    <input id="plan" name="plan" value="<?=$_SESSION['dplan']?>" type="text" readonly class="form-control" placeholder="Enter the Member Plan...">
                                                    <input type="hidden" value="<?=$_SESSION['email']?>" name="email">
                                                    </div>

               
                                                    
                                                    
                                                </div>
                             

            
                                    </div>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name='contact'>Save Contact</button>
                                                <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>

                              

                                </div> <!-- end card-->
        
                                <!-- <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Meta Data</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="metatitle">Meta title</label>
                                                        <input id="metatitle" name="productname" type="text" class="form-control" placeholder="Metatitle">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="metakeywords">Meta Keywords</label>
                                                        <input id="metakeywords" name="manufacturername" type="text" class="form-control" placeholder="Meta Keywords">
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="metadescription">Meta Description</label>
                                                        <textarea class="form-control" id="metadescription" rows="5" placeholder="Meta Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- end row -->

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
<script src="../assets/js/code.js"></script>


        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>

        <!-- dropzone plugin -->
        <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <?php unset($_SESSION['contactmsg'])?>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/ecommerce-add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:17 GMT -->
</html>
<?php } ?>