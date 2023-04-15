<?php include_once 'head.php';
 include_once 'config.php';
  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index.php");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen.php");
}
?>
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Videos List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">View Videos</a></li> -->
                                            <li class="breadcrumb-item active">View Videos</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php if(isset($_SESSION['quotesupdate']) and $_SESSION['quotesupdate'] == 'Video deleted successfully'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['quotesupdate'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['quotesupdate']) and $_SESSION['quotesupdate'] === 'Could not complete this action!'){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['quotesupdate'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>
                      
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Video Title</th>
                                                        <th scope="col">Video Description</th>
                                                        <th scope="col">Video Link</th>
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                   
                                                     $sql = formQuery("SELECT * FROM videos ORDER BY id DESC");
                                                     if($sql->num_rows>0){ $num = 1;
                                                         while($row=$sql->fetch_assoc()){
                                                            
                                                     ?>
                                                    <tr>
                                                        <td>
                                                           <?=$num++?>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark"><?= $row['vtitle']?></a></h5>
                                                            <!-- <p class="text-muted mb-0"></p> -->
                                                        </td>
                                                        <td><?= $row['vdesc'] ?></td>
                                                        
                                                        <td>
                                                        <?= $row['vlink'] ?>
                                                        </td>
                                                        <td>
                                                        <?= $row['regdate'] ?>
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                
                                                                <a href="edit-video.php?id=<?=$row['id']?>" class="btn btn-success waves-effect waves-light w-sm text-white">
                                                            <i class="mdi mdi-pencil"></i> Edit
                                                        </a>
                                                        <a href="delete.php?id=<?=$row['id']?>&vid=<?=$row['vid']?>&action=videos" class="btn btn-danger waves-effect waves-light w-sm text-white">
                                                            <i class="mdi mdi-trash-can"></i> Delete
                                                         </a>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                           <?php }} ?>     



                <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

           <!-- Magnific Popup-->
           <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>  
        
        <?php unset($_SESSION['quotesupdate'])?>

        <?php } ?>