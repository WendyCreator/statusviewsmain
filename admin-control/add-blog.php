<?php include_once 'head.php';
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
                  
                    <?php if(isset($_SESSION['eventmsg']) and $_SESSION['eventmsg'] == 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['eventmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } 

                         elseif(isset($_SESSION['eventmsg'])and $_SESSION['eventmsg'] !== 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['eventmsg'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                       
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Blog Information</h4>
                                   

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class=""><a href="javascript: void(0);">All Events</a></li> -->
                                           
                                            <li class="breadcrumb-item active">Add all Blogs</li>
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
        
                                        <form class="needs-validation" novalidate action="add-blog-process" method='post' id='myform' enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label for="productname">Blog Title</label>
                                                        <input id="productname" name="blogtitle" type="text" class="form-control" placeholder="Blog Title">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="productname">Author</label>
                                                        <input id="productname" name="author" type="text" class="form-control" placeholder="Enter Fullname of Blog Author">
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
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="cat">Blog Category:</label>
                                                        <input type="text" list='category' id="cat" class='form-control' name="category">
                                                        <datalist id="category">
                                                        <option value="Lands">    
                                                        <option value="Buldings">          
                                                        <option value="Promos">          
                                                        <option value="Fun">    
                                                        <option value="Security">    
                                                        <datalist>
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-12">
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
                                                        <label for="desc">Blog Detail</label>
                                                        <textarea class="form-control" id="desc" rows="5" placeholder="Blog Detail" name='blogdetails'></textarea>
                                                    </div>

               
                                                    
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="">Date of Posting</label>
            <div class="col-md-4">
                <select name="day" id="" class="form-control">
                <option value="15">Day</option> 
                <?php for($i=1; $i<=31; $i++){
                    if(strlen($i)==1){  $i= '0'.$i; }
                    ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>

                </select>
            </div>

            <div class="col-md-4">
                <select name="month" id="" class="form-control">
                <option value="6">Month</option>  
                <option value="01">Jan</option>          
                <option value="02">Feb</option>          
                <option value="03">Mar</option>          
                <option value="04">Apr</option>          
                <option value="05">May</option>          
                <option value="06">Jun</option>          
                <option value="07">Jul</option>          
                <option value="08">Aug</option>          
                <option value="09">Sep</option>          
                <option value="10">Oct</option>          
                <option value="11">Nov</option>          
                <option value="12">Dec</option>          
                </select>
            </div>

            <div class="col-md-4">
                <select name="year" id="" class="form-control">
                <option value="2022">Year</option>  
                <?php for($i=2025; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
            </div>
        </div>

                                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Featured Images</h4>

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
                                                <button type="submit" class="btn btn-primary waves-effect waves-light" name='blog'>Add Blog</button>
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
        <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'desc' );
            </script>

        <?php unset($_SESSION['eventmsg'])?>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/ecommerce-add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:17 GMT -->
</html>
<?php } ?>