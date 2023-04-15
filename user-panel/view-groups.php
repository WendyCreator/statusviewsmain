
<?php include_once 'head.php';
include_once 'config.php';
  if(!isset($_SESSION['use%#5log#&45@ger%$#pa'])){
    header("Location:index");
} elseif($_SESSION['use%#5log#&45@ger%$#pa'] != true){
    header("Location:auth-lock-screen");
}
?>
<link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css"> -->

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
                        <div class="row">
                            <div class="col-12">
                              
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Whatsapp group</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li> -->
                                            <li class="breadcrumb-item active">Groups' Grid</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                        <div class="col-lg-12">
                                <div class="card card-body">
                                <?php if(isset($_SESSION['pastordelete']) and $_SESSION['pastordelete'] == 'Detail deleted successfully'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['pastordelete'] ?>

                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['pastordelete']) and $_SESSION['pastordelete'] === 'Could not complete this action!'){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['pastordelete'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>     
                                        <div class="row">
                                            <div class="col-lg-12">
                                            
                                                     <div class="card">
                                                       <div class="card-body">
                                            <form action="" method="get">
                                                <div class="row">
                                                    
                                                    <div class="form-group invisi col-8">
                                        <label for="role">Search Group By Category:</label>
                                            <select name="role" id="role" class='form-control'>
                                                <?php
                                                $category = formQuery("SELECT * FROM ceecategories ");
                                                if($category->num_rows > 0){
                                                    while($rowcat=$category->fetch_assoc()){
                                                ?>
                                                <option><?=$rowcat['ctitle']?></option>
                                                <?php } } ?>
                                                <!-- <option value="manager">Manager</option>
                                                <option value="manager">Accountant</option>
                                                <option value="treasure">Treasurer</option>
                                                <option value="agent">Agent</option>
                                                <option value="front desk officer">Front desk officer</option>
                                                <option value="office assistant">Office assistant</option>
                                                <option value="tech support">Tech Support</option> -->
                                            </select>
                                        </div>
                                        <div class="col-4 mt-4">
                                <input type="submit" value="Search" class="btn btn-info btn-lg" name="searchstaff">
                                <a href="view-groups" class="btn btn-success btn-lg">Get all Groups</a>
                            </div>
                                                    </div>
                                                </div>
                                         
                                       
                                            </form>

                                        </div>
                                        
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <input type="search" class="form-control" placeholder='Filter Staffs by name here...' id='search'>
                                                </div>
                                                
                                            <!-- </div> -->
                                        <!-- </form> -->
                                    <!-- <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light">Search</a> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           

                            <?php if(isset($_GET['searchstaff'])){
                                if(!empty($_GET['role'])){
                                    $search = cleanInputField('role');
                           
                                    // Search the database...
                                    // $school = $_SESSION['school'];
                                   
                                    $sql = formQuery("SELECT * FROM ceegroups WHERE gcategory = '$search'");
                                    if($sql->num_rows>0){ 
                                        $num = 1;
                                        while($row=$sql->fetch_assoc()){
                                  
                                            
                                    ?>
        <section class="col-xl-3 col-sm-6">
                                  <div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <?php if($row['dstatus'] == 'active'){?>
                                        <div class="alert alert-success" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                Active
                                            </div>
                                            <?php }
                                            elseif($row['dstatus'] == 'suspended'){?>
                                        <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i>
                                                Suspended
                                            </div>
                                            <?php }
                                             elseif($row['dstatus'] == 'terminated'){?>
                                        <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                                Terminated
                                            </div>
                                            <?php }?>
                                            <img class="rounded-circle avatar-sm" src="../admin-control/<?php echo ($row['gimage'] != 'no image')? $row['gimage'] :'assets/images/users/avatar-2.jpg'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['gtitle']?></a></h5>
                                        <p class="text-muted">Group Admin:  <?=$row['groupadmin']?></p>
                                        <p class="text-muted">Group Category:  <?=$row['gcategory']?></p>

                                        <div>
                                        <a href="<?=$row['grouplink']?>" class="btn btn-primary m-2" target="_blank">Join Group</a>
                                            <!-- <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">csc</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">ece</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">eee</a> -->
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20 d-none" >
                                            <div class="flex-fill">
                                                <a href="staff-profile?id=<?=$row['id']?>&userid=<?=$row['userid']?>"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="edit-staff?id=<?=$row['id']?>&userid=<?=$row['userid']?>"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                            <button type="button" class='btn btn-lg' data-toggle="modal" data-target="#exampleModal<?=$row['id']?>"><i class="fas fa-trash text-danger"></i></button>


                                                                                    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete File!</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
      Are you sure you want to permanently delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="delete-staff?id=<?=$row['id']?>&userid=<?=$row['userid']?>" class="btn btn-danger">Yes, Delete</a>
      </div>
    </div>
  </div>
</div> -->
                                            </div>

    
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  </section>
                                   
                               <?php     }
                                   
                               }
                              }
                            }
                              
                            

                           

                            else{ 
                                  $sql = formQuery("SELECT * FROM ceegroups");
                                  if($sql->num_rows>0){ $num = 1;
                                      while($row=$sql->fetch_assoc()){
                                
                                          
                                  ?>
                                  <section class="col-xl-3 col-sm-6">
                                  <div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <?php if($row['dstatus'] == 'active'){?>
                                        <div class="alert alert-success" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                Active
                                            </div>
                                            <?php }
                                            elseif($row['dstatus'] == 'suspended'){?>
                                        <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i>
                                                Suspended
                                            </div>
                                            <?php }
                                             elseif($row['dstatus'] == 'terminated'){?>
                                        <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                                Terminated
                                            </div>
                                            <?php }?>
                                            <img class="rounded-circle avatar-sm" src="../admin-control/<?php echo ($row['gimage'] != 'no image')? $row['gimage'] :'assets/images/users/avatar-2.jpg'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['gtitle']?></a></h5>
                                        <p class="text-muted">Group Admin:  <?=$row['groupadmin']?></p>
                                        <p class="text-muted">Group Category:  <?=$row['gcategory']?></p>

                                        <div>
                                            <a href="<?=$row['grouplink']?>" class="btn btn-primary m-2" target="_blank">Join Group</a>
                                            <!-- <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">ece</a>
                                            <a href="javascript: void(0);" class="badge bg-primary font-size-11 m-1">eee</a> -->
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="contact-links d-flex font-size-20 d-none" >
                                            <div class="flex-fill">
                                                <a href="staff-profile?id=<?=$row['id']?>&userid=<?=$row['userid']?>"><i class="bx bx-message-square-dots"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="edit-staff?id=<?=$row['id']?>&userid=<?=$row['userid']?>"><i class="fas fa-pencil-alt"></i></a>
                                            </div>
                                            <div class="flex-fill">
                                            <button type="button" class='btn btn-lg' data-toggle="modal" data-target="#exampleModal<?=$row['id']?>"><i class="fas fa-trash text-danger"></i></button>


                                                                                    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete File!</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
      Are you sure you want to permanently delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="delete-staff?id=<?=$row['id']?>&userid=<?=$row['userid']?>" class="btn btn-danger">Yes, Delete</a>
      </div>
    </div>
  </div>
</div> -->
                                            </div>

    
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  </section>
                            
                            <?php }} }?>
                              
                            
                          
                        </div>
                        <!-- end row -->
<!-- 
                        
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>
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
                                    Design & Develop by wendycreates.
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

          <!-- Magnific Popup-->
          <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="bootstrap4/js/bootstrap.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
            const search = document.querySelector('#search');
            const searchForm  = document.querySelector('#search-form');
            const fullnames  = document.querySelectorAll('.fullname');

            search.addEventListener('input',(e)=>{
                fullnames.forEach(fullname=>{
                    const fullInner = fullname.innerText.toLowerCase();
                    const filterText = e.target.value.toLowerCase();
                    // console.log(filterText)
                    if(fullInner.includes(filterText)){
                        fullname.closest('section').style.display = ''
                           }else{
                             fullname.closest('section').style.display = 'none' 
                            }
                })
                // ajaxSend();
            })

           
        </script>

    </body>
    <?php unset($_SESSION['pastordelete']) ?>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:42 GMT -->
</html>
