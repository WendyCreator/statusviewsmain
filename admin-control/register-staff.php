<?php include_once 'head.php';
  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen");
}
?>

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
                  
                    <?php if(isset($_SESSION['staffmsg']) and $_SESSION['staffmsg'] == 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['staffmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php }
                        //  and $_SESSION['staffmsg'] === 'Oops! try again later'
                        elseif(isset($_SESSION['staffmsg'])){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['staffmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                       
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Staff</h4>
                                   

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Add Staff</a></li>
                                            <li class="breadcrumb-ite active"> /Staff Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <form action="register-staff-process" method="post" enctype="multipart/form-data">

                                <div class="form-group invisi mb-3">
                                        <label for="title">Title:</label>
                                            <select name="title" id="title" class='form-control'>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Engr">Engr</option>
                                            </select>
                                        </div>

                            <div class="form-group mb-3">
                                           <label for="firstname">First Name:</label>
                                             <input type="text" class="form-control" placeholder="Enter staff's first name" id="firstname" name='firstname'>
                                             <div class="invalid-feedback">
                                                Please Enter First Name
                                            </div>
                                         </div>
                                            
                
                                        <div class="form-group invisi mb-3">
                                          <label for="lastname">Last Name:</label>
                                          <input type="text" class="form-control" placeholder="Enter staff's last name" id="lastname" name='lastname'>
                                          <div class="invalid-feedback">
                                                Please Enter Last Name
                                            </div>
                                        </div>

                                        <div class="form-group invisi mb-3">
                                        <label for="title">Gender:</label>
                                            <select name="gender" id="title" class='form-control'>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                                <!-- <option value="Engr">Engr</option> -->
                                            </select>
                                        </div>
            
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email:</label>
                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email" required name='email'>  
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>      
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username:</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter Username" required name='username'>  
                                            <div class="invalid-feedback">
                                                Please Enter Username
                                            </div>      
                                        </div>
                

                                        <div class="form-group invisi mb-3">
                                           <label for="email">Phone Number:</label>
                                           <input type="text" class="form-control" placeholder="Enter phone number" id="phone" name='phone'>
                                           <span class="error" id="phone-err"></span>
                                        </div>
                                        <div class="col-12">
                                                <div class="mb-3">
                                                        <label for="address">Staff Address:</label>
                                                        <textarea class="form-control" id="address" rows="5" placeholder="Property Location here..." name='address'></textarea>
                                                    </div>
                                                </div> 

                                        <div class="form-group invisi mb-3">
                                        <label for="role">Staff Role:</label>
                                            <select name="role" id="role" class='form-control'>
                                                <!-- <option value="">---</option> -->
                                                <option value="staff">Staff</option>
                                                <option value="manager">Manager</option>
                                                <option value="manager">Accountant</option>
                                                <option value="treasure">Treasurer</option>
                                                <option value="agent">Agent</option>
                                                <option value="front desk officer">Front desk officer</option>
                                                <option value="office assistant">Office assistant</option>
                                                <option value="tech support">Tech Support</option>
                                            </select>
                                        </div>

                                        <!-- <div class="mb-3">
                                                        <label for="productdesc">Favorite Quote</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" placeholder="Enter Pastor's Favorite quote" name='quote'></textarea>
                                                    </div> -->
                                                    <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name='pass' required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>       
                                        </div>

                                        <div class="form-group invisi mb-3">
                                           <label for="cpwd"> Confirm Password:</label>
                                           <input type="password" class="form-control" placeholder="Confrim your password" id="cpwd" name='cpass'>
                                        <span class="error" id="cpsw-err"></span>
                                       </div>

                                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Staff's Image</h4>

                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input name="files" type="file" multiple class='form-control' />
                                            </div>
            
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                </div>
                                                
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
</div>
                                    </div>
                                            </div>
                                            
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name='submit'>Register Staff</button>
                                                <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>

                              

                                </div> <!-- end card-->
        
                               
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © CPL.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by covplusdigital
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

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>

        <!-- dropzone plugin -->
        <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <?php unset($_SESSION['staffmsg'])?>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/ecommerce-add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:17 GMT -->
</html>
