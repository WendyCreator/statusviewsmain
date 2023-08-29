<?php include_once 'head.php';
include_once 'config.php';
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
                                    <h4 class="mb-sm-0 font-size-18">Welcome to ... </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li><a href="javascript: void(0);">Dashboards/</a></li>
                                            <li class="breadcrumb-item active">Status Views</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <img src="<?php echo ($_SESSION['image'] != 'no image')?$_SESSION['image']:'assets/images/users/avatar-1.jpg' ?>" alt="Profile Picture" class="avatar-md rounded-circle img-thumbnail">
                                                    </div>
                                                    <div class="flex-grow-1 align-self-center">
                                                        <div class="text-muted">
                                                            <p class="mb-2">Welcome to <?php echo $_SESSION['fullname'] ?> Dashboard</p>
                                                            <h5 class="mb-1"><?php echo $_SESSION['fullname'] ?></h5>
                                                            <p class="mb-0"> Status <?php echo $_SESSION['status'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 align-self-center">
                                                <div class="text-lg-center mt-4 mt-lg-0">
                                                    <!-- <div class="row">
                                                        <div class="col-4">
                                                            <div>
                                                                <p class="text-muted text-truncate mb-2">Total Projects</p>
                                                                <h5 class="mb-0">48</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div>
                                                                <p class="text-muted text-truncate mb-2">Projects</p>
                                                                <h5 class="mb-0">40</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div>
                                                                <p class="text-muted text-truncate mb-2">Clients</p>
                                                                <h5 class="mb-0">18</h5>
                                                                
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                
                                            <div class="col-lg-4 d-none d-lg-block">
                                                <div class="clearfix mt-4 mt-lg-0">
                                                    <div class="dropdown float-end">
                                                        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bxs-cog align-middle me-1"></i> Setting
                                                        </button> -->
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card bg-primary bg-soft">
                                    <div>
                                        <div class="row">
                                            <div class="col-7">
                                                <!-- <a href=""> -->
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome <?=$_SESSION['fullname']?> !</h5>
                                                    <p>Status Views Dashboard</p>

                                                </div>
                                                <!-- </a> -->
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card bg-primary bg-soft">
                                    <div>
                                        <div class="row">
                                            <div class="col-7">
                                             <a href="view-contacts">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">.... !</h5>
                                                    <p> Download Contacts</p>
                                                
                                                </div>
                                            </a>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card bg-primary bg-soft">
                                    <div>
                                        <div class="row">
                                            <div class="col-7">
                                                <a href="view-groups">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Status Views...!</h5>
                                                    <p>Join Groups.</p>

                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           

                                <!-- ///////////////////// -->
                                <div class='container'>
                                    <div class='row my-4'>
                                     <div class='col-12 borde'>
                                        <h4 class='text-center my-4'>Active Groups</h4>
                                     </div>
                                    
                                <?php 
                                { 
                                  $sql = formQuery("SELECT * FROM ceegroups LIMIT 4");
                                  if($sql->num_rows>0){ $num = 1;
                                      while($row=$sql->fetch_assoc()){
                                
                                          
                                  ?>
                                  <section class="col-xl-3 col-sm-6 col-12">
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
                        </div>
                                </div>
                        <!-- end row -->
                                <!-- //////////////////// -->

                                <div class="col-xl-12">
                            <div class="card bg-primary bg-soft">
                                    <div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3 text-center">
                                                    <h5 class="text-primary">Status View Quote of The Week</h5>
                                                    <p>Quote here...</p>
                                                    <p>Quote Source here</p>

                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <!-- <img src="assets/images/profile-img.png" alt="" class="img-fluid"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-copy-alt"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-14 mb-0">Orders</h5>
                                                </div>
                                                <div class="text-muted mt-4">
                                                    <h4>1,452 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-14 mb-0">Revenue</h5>
                                                </div>
                                                <div class="text-muted mt-4">
                                                    <h4>$ 28,452 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-purchase-tag-alt"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="font-size-14 mb-0">Average Price</h5>
                                                </div>
                                                <div class="text-muted mt-4">
                                                    <h4>$ 16.2 <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                                    
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
<!-- 
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-end">
                                                <div class="input-group input-group-sm">
                                                    <select class="form-select form-select-sm">
                                                        <option value="JA" selected>Jan</option>
                                                        <option value="DE">Dec</option>
                                                        <option value="NO">Nov</option>
                                                        <option value="OC">Oct</option>
                                                    </select>
                                                    <label class="input-group-text">Month</label>
                                                </div>
                                            </div>
                                            <h4 class="card-title mb-4">Earning</h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="text-muted">
                                                    <div class="mb-4">
                                                        <p>This month</p>
                                                        <h4>$2453.35</h4>
                                                        <div><span class="badge badge-soft-success font-size-12 me-1"> + 0.2% </span> From previous period</div>
                                                    </div>

                                                    <div>
                                                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Details <i class="mdi mdi-chevron-right ms-1"></i></a>
                                                    </div>
                                                    
                                                    <div class="mt-4">
                                                        <p class="mb-2">Last month</p>
                                                        <h5>$2281.04</h5>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div id="line-chart" class="apex-charts" dir="ltr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Sales Analytics</h4>

                                        <div>
                                            <div id="donut-chart" class="apex-charts"></div>
                                        </div>

                                        <div class="text-center text-muted">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mt-4">
                                                        <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i> Product A</p>
                                                        <h5>$ 2,132</h5>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-4">
                                                        <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success me-1"></i> Product B</p>
                                                        <h5>$ 1,763</h5>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-4">
                                                        <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-danger me-1"></i> Product C</p>
                                                        <h5>$ 973</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- end row -->

                        <!-- <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-end">
                                                <div class="input-group input-group-sm">
                                                    <select class="form-select form-select-sm">
                                                        <option value="JA" selected>Jan</option>
                                                        <option value="DE">Dec</option>
                                                        <option value="NO">Nov</option>
                                                        <option value="OC">Oct</option>
                                                    </select>
                                                    <label class="input-group-text">Month</label>
                                                </div>
                                            </div>
                                            <h4 class="card-title mb-4">Top Selling product</h4>
                                        </div>

                                        <div class="text-muted text-center">
                                            <p class="mb-2">Product A</p>
                                            <h4>$ 6385</h4>
                                            <p class="mt-4 mb-0"><span class="badge badge-soft-success font-size-11 me-2"> 0.6% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>
                                        </div>

                                        <div class="table-responsive mt-4">
                                            <table class="table align-middle mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1">Product A</h5>
                                                            <p class="text-muted mb-0">Neque quis est</p>
                                                        </td>

                                                        <td>
                                                            <div id="radialchart-1" class="apex-charts"></div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-1">Sales</p>
                                                            <h5 class="mb-0">37 %</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1">Product B</h5>
                                                            <p class="text-muted mb-0">Quis autem iure</p>
                                                        </td>

                                                        <td>
                                                            <div id="radialchart-2" class="apex-charts"></div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-1">Sales</p>
                                                            <h5 class="mb-0">72 %</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1">Product C</h5>
                                                            <p class="text-muted mb-0">Sed aliquam mauris.</p>
                                                        </td>

                                                        <td>
                                                            <div id="radialchart-3" class="apex-charts"></div>
                                                        </td>
                                                        <td>
                                                            <p class="text-muted mb-1">Sales</p>
                                                            <h5 class="mb-0">54 %</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Tasks</h4>

                                        <ul class="nav nav-pills bg-light rounded">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">In Process</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Upcoming</a>
                                            </li>
                                        </ul>

                                        <div class="mt-4">
                                            <div data-simplebar style="max-height: 250px;">
                                            
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap align-middle table-hover mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 50px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck01">
                                                                        <label class="form-check-label" for="tasklistCheck01"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Saas Dashboard</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Mark</p>
                                                                </td>
                                                                <td style="width: 90px;">
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck02">
                                                                        <label class="form-check-label" for="tasklistCheck02"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">New Landing UI</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Team A</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck02">
                                                                        <label class="form-check-label" for="tasklistCheck02"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Janis</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck04">
                                                                        <label class="form-check-label" for="tasklistCheck04"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Blog Template UI</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Dianna</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck05">
                                                                        <label class="form-check-label" for="tasklistCheck05"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Multipurpose Landing</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Team B</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck06">
                                                                        <label class="form-check-label" for="tasklistCheck06"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Jerry</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="tasklistCheck07">
                                                                        <label class="form-check-label" for="tasklistCheck07"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="text-truncate font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Crypto Dashboard</a></h5>
                                                                    <p class="text-muted mb-0">Assigned to Eric</p>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <ul class="list-inline mb-0 font-size-16">
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-success p-1"><i class="bx bxs-edit-alt"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <a href="javascript: void(0);" class="text-danger p-1"><i class="bx bxs-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="card-footer bg-transparent border-top">
                                        <div class="text-center">
                                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light"> Add new Task</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body border-bottom">
                                        <div class="row">
                                            <div class="col-md-4 col-9">
                                                <h5 class="font-size-15 mb-1">Steven Franklin</h5>
                                                <p class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p>
                                            </div>
                                            <div class="col-md-8 col-3">
                                                <ul class="list-inline user-chat-nav text-end mb-0">
                                                    <li class="list-inline-item d-none d-sm-inline-block">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-search-alt-2"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end py-0 dropdown-menu-md">
                                                                <form class="p-3">
                                                                    <div class="form-group m-0">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                                            
                                                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item  d-none d-sm-inline-block">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">View Profile</a>
                                                                <a class="dropdown-item" href="#">Clear chat</a>
                                                                <a class="dropdown-item" href="#">Muted</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </li>
    
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <button class="btn nav-btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div>
                                            <div class="chat-conversation">
                                                <ul class="list-unstyled" data-simplebar style="max-height: 260px;">
                                                    <li> 
                                                        <div class="chat-day-title">
                                                            <span class="title">Today</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="conversation-list">
                                                            <div class="dropdown">
        
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                  </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Copy</a>
                                                                    <a class="dropdown-item" href="#">Save</a>
                                                                    <a class="dropdown-item" href="#">Forward</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-name">Steven Franklin</div>
                                                                <p>
                                                                    Hello!
                                                                </p>
                                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:00</p>
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
        
                                                    <li class="right">
                                                        <div class="conversation-list">
                                                            <div class="dropdown">
        
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                  </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Copy</a>
                                                                    <a class="dropdown-item" href="#">Save</a>
                                                                    <a class="dropdown-item" href="#">Forward</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-name">Henry Wells</div>
                                                                <p>
                                                                    Hi, How are you? What about our next meeting?
                                                                </p>
        
                                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                                            </div>
                                                        </div>
                                                    </li>
        
                                                    <li>
                                                        <div class="conversation-list">
                                                            <div class="dropdown">
        
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                  </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Copy</a>
                                                                    <a class="dropdown-item" href="#">Save</a>
                                                                    <a class="dropdown-item" href="#">Forward</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-name">Steven Franklin</div>
                                                                <p>
                                                                    Yeah everything is fine
                                                                </p>
                                                                
                                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
        
                                                    <li class="last-chat">
                                                        <div class="conversation-list">
                                                            <div class="dropdown">
        
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                  </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Copy</a>
                                                                    <a class="dropdown-item" href="#">Save</a>
                                                                    <a class="dropdown-item" href="#">Forward</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-name">Steven Franklin</div>
                                                                <p>& Next meeting tomorrow 10.00AM</p>
                                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
        
                                                    <li class="right">
                                                        <div class="conversation-list">
                                                            <div class="dropdown">
        
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                  </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Copy</a>
                                                                    <a class="dropdown-item" href="#">Save</a>
                                                                    <a class="dropdown-item" href="#">Forward</a>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                            <div class="ctext-wrap">
                                                                <div class="conversation-name">Henry Wells</div>
                                                                <p>
                                                                    Wow that's great
                                                                </p>
        
                                                                <p class="chat-time mb-0"><i class="bx bx-time-five align-middle me-1"></i> 10:07</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="p-3 chat-input-section">
                                        <div class="row">
                                            <div class="col">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control rounded chat-input" placeholder="Enter Message...">
                                                    <div class="chat-input-links">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a href="javascript: void(0);"><i class="mdi mdi-emoticon-happy-outline"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript: void(0);"><i class="mdi mdi-file-image-outline"></i></a></li>
                                                            <li class="list-inline-item"><a href="javascript: void(0);"><i class="mdi mdi-file-document-outline"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Status Views
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

       <!-- JAVASCRIPT -->
       <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:42 GMT -->
</html>

<?php } ?>