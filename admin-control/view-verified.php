<?php include_once 'head.php';
 include_once 'config.php';
  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen");
}
?>
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css"> -->
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

                    <?php if(isset($_SESSION['veriupdate']) and $_SESSION['veriupdate'] == 'Member deleted successfully'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['veriupdate'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['veriupdate']) and $_SESSION['veriupdate'] === 'Could not complete this action!'){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['veriupdate'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Payed Members List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">View Verified Contacts</a></li>
                                            <li class="breadcrumb-ite active"> /verified</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <form action="" method="get">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="demail" placeholder="Search by email or plan">
                                                <button class="input-group-text btn btn-info" name="search">Search</button>
                                                <a href="view-verified" class="input-group-text btn btn-success">Get all data</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <!-- <th scope="col" style="width: 70px;">Featured Image</th> -->
                                                        <th scope="col">User Email</th>
                                                        <th scope="col">User Plan</th>
                                                        <th scope="col">Amount Paid</th>
                                                        <th scope="col">Status</th>
                                                        <!-- <th scope="col">Date of Event</th> -->
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                   
                                                 if(isset($_GET['search']) and !empty($_GET['demail'])){
                                                    $demail = $_GET['demail'];
                                                    $sql = formQuery("SELECT * FROM ceeverified WHERE demail LIKE '%$demail%' OR dplan LIKE '%$demail%' ORDER BY id DESC");
                                                    if($sql->num_rows>0){ $num = 1;
                                                        while($row=$sql->fetch_assoc()){ ?>

<tr>
                                                        <!-- <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="<?= $row['dimage'] ?>" alt="">
                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['demail']?></a></h5>
                                                            <!-- <p class="text-muted mb-0"></p> -->
                                                        </td>
                                                        <td><?= $row['dplan'] ?></td>
                                                        <!-- <td>
                                                        <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['ddate']?></a></h5> 
                                                        </td> -->
                                                        <td>
                                                        <?= $row['damount'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row['dstatus'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row['regdate'] ?>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                
                                                                <!-- <a href="edit-category?id=<?= $row['id'] ?>" class="btn btn-success waves-effect waves-light w-sm">
                                                            <i class="mdi mdi-pencil"></i> Edit
                                                        </a> -->
                                                        <button type="button" class="btn btn-danger waves-effect waves-light w-sm" data-toggle="modal" data-target="#exampleModal<?=$row['id']?>">
                                                            <i class="mdi mdi-trash-can"></i> Delete
                                                         </button>

                                                        


<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete File!</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
      Are you sure you want to permanently delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="delete?id=<?=$row['id']?>&memberid=<?=$row['memberid']?>&action=ceeverified" class="btn btn-danger">Yes, Delete</a>
      </div>
    </div>
  </div>
</div>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                           <?php }}}    


                                                 
                                                           
                                                   

                                                
                                                   else{  
                                                     $sql = formQuery("SELECT * FROM ceeverified ORDER BY id DESC");
                                                     if($sql->num_rows>0){ $num = 1;
                                                         while($row=$sql->fetch_assoc()){
                                                             
                                                     ?>
                                                    <tr>
                                                        <!-- <td>
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="<?= $row['dimage'] ?>" alt="">
                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['demail']?></a></h5>
                                                            <!-- <p class="text-muted mb-0"></p> -->
                                                        </td>
                                                        <td><?= $row['dplan'] ?></td>
                                                        <!-- <td>
                                                        <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['ddate']?></a></h5> 
                                                        </td> -->
                                                        <td>
                                                        <?= $row['damount'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row['dstatus'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row['regdate'] ?>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                
                                                                <!-- <a href="edit-category?id=<?= $row['id'] ?>" class="btn btn-success waves-effect waves-light w-sm">
                                                            <i class="mdi mdi-pencil"></i> Edit
                                                        </a> -->
                                                        <button type="button" class="btn btn-danger waves-effect waves-light w-sm" data-toggle="modal" data-target="#exampleModal<?=$row['id']?>">
                                                            <i class="mdi mdi-trash-can"></i> Delete
                                                         </button>

                                                        


<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete File!</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
      Are you sure you want to permanently delete this?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="delete?id=<?=$row['id']?>&memberid=<?=$row['memberid']?>&action=ceeverified" class="btn btn-danger">Yes, Delete</a>
      </div>
    </div>
  </div>
</div>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                           <?php }} } ?>     



                <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

           <!-- Magnific Popup-->
           <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="bootstrap4/js/bootstrap.min.js"></script>


<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>      
        
        <?php unset($_SESSION['veriupdate']);?>
        <?php } ?>