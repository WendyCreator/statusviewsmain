<?php 
include_once 'head.php';
include_once 'config.php';

  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen");
}
?>
<link rel="stylesheet" href="style.css">
<link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

           <?php include_once 'header.php' ?>
            

            <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'siderbar.php' ?>
            <!-- Left Sidebar End -->
            

            <?php 
                        $userid = $_GET['userid'];
                        $id = $_GET['id'];
                        $sql = formQuery("SELECT * FROM staffs WHERE userid = '$userid' AND id = '$id'");
                        $row= $sql->fetch_assoc();
                        ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                    
                        <!-- start page title -->
                        <div class="row">
                        <figure class="image" style='float:right; width:20%;'>
                                               <!-- <div class="placeholder" id="placeholder" style='border-radius:50%;'>Image Here</div> -->
                                               <img src="<?=$row['dimage']?>" alt="" class="rounded img-fluid" id='myImage'>
                                               <!-- <button id="btn" class="btn btn-secondary shadow">click Me</button> -->
                                            </figure>
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> Staff Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-ite active"> /Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                   

                       
                        <h3><?=$row['username']?>'s Information</h3>

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="<?=  $row['dimage'] ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?=  $row['firstname'] ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?= $row['dstatus'] .' '. $row['drole'] ?></p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">
                                                   
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">125</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">$1245</h5>
                                                            <p class="text-muted mb-0">Revenue</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                        <p class="text-muted mb-4">Hi I'm <?=$row['firstname'].' '.$row['lastname'] ?>, a registered and certified staff of Cimax Properties ltd</p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Title :</th>
                                                        <td><?=$row['title']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?=$row['firstname'].' '.$row['lastname'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td><?php echo $row['dphone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo  $row['demail'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Username :</th>
                                                        <td><?php echo  $row['username'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Gender :</th>
                                                        <td><?php echo  $row['dgender'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td><?php echo  $row['daddress'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status :</th>
                                                        <td><?php echo  $row['dstatus'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Role :</th>
                                                        <td><?php echo  $row['drole'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Registered at :</th>
                                                        <td><?php echo  $row['registerat'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
<!-- 
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Experience</h4>
                                        <div class="">
                                            <ul class="verti-timeline list-unstyled">
                                                <li class="event-list active">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-server h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Back end Developer</a></h5>
                                                                <span class="text-primary">2016 - 19</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-code h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark">Front end Developer</a></h5>
                                                                <span class="text-primary">2013 - 16</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <i class="bx bx-edit h4 text-primary"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"></a></h5>
                                                                <span class="text-primary">2018 - present</span>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>   -->
                                <!-- end card -->
                            </div>         
                            
                            <div class="col-xl-8">

                            <?php if(isset($_SESSION['update']) and !empty($_SESSION['update'])){ ?>
                            <span class='alert alert-primary my-2 d-block text-center'><?php echo $_SESSION['update'] ?></span>
                        <?php } ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Change Staff role</p>
                                                        <h4 class="mb-0"><?=$row['drole']?></h4>
                                                    </div>
                                                    
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-check-circle font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- popup form here -->
                                            <div class="card mfp-hide mfp-popup-form mx-auto" id="drole">
                                            <div class="card-body">
                                                <h4 class="mb-4">Select Role Here...</h4> 
                                                <form action='update-role' method='post'>
                                                    <div class="row">
                                                    <input type="hidden" class="form-control" name='userid' value= '<?= $row['userid']?>'>
                                                    <input type="hidden" class="form-control" name='id' value= '<?= $row['id']?>'>
                                                        <div class="col-lg-12">
                                                        <div class="form-group invisi mb-3">
                                        <label for="role">Staff Role:</label>
                                            <select name="role" id="role" class='form-control'>
                                                <option value="<?=$row['drole']?>"><?=$row['drole']?></option>
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
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                            <!-- popup form here -->
                                            <div class="btn-group">
                                               <a class="popup-form btn btn-primary"  href="#drole" >
                                                Change Staff Roles
                                               </a>
                                              
                                            </div><!-- /btn-group -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Change Staff status</p>
                                                        <h4 class="mb-0"><?=$row['dstatus']?></h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-hourglass font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="update-status?userid=<?= $row['userid']?>&id=<?= $row['id']?>&status=suspended">Suspend</a>
                                                    <a class="dropdown-item" href="update-status?userid=<?= $row['userid']?>&id=<?= $row['id']?>&status=terminated">Terminate</a>
                                                    <a class="dropdown-item" href="update-status?userid=<?= $row['userid']?>&id=<?= $row['id']?>&status=active">Restore</a>
                                                </div>
                                            </div><!-- /btn-group -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium mb-2">Delete Staff</p>
                                                        <h4 class="mb-0"><?=$row['drole']?></h4>
                                                    </div>
        
                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-package font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Delete <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="delete-staff?userid=<?= $row['userid']?>&id=<?= $row['id']?>">Delete?</a>
                                                    <!-- <a class="dropdown-item" href="#">Demote</a> -->
                                                </div>
                                            </div><!-- /btn-group -->
                                        </div>
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Revenue</h4>
                                        <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div> -->

                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title mb-4"><?= $row['firstname'] ?>'s Tasks</h4>
                                        <div class="table-responsive">
                                        
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Tasks</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">Deadline</th>
                                                        <th scope="col">Budget</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- get staff tasks -->


                                                    <?php
                                                    $staffid = $row['userid'] ;
                                                     $sql1 = $conn->query("SELECT * FROM tasks WHERE userid='$staffid'");
                                                     if($sql1->num_rows>0){
                                                        $num = 0;
                                                         while($row1 = $sql1->fetch_assoc()){
                                                            $num++;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$num?></th>
                                                        <td><?=$row1['title']?></td>
                                                        <td><?=$row1['startdate']?></td>
                                                        <td><?=$row1['deadline']?></td>
                                                        <td><?=$row1['dbudget']?></td>
                                                        <td><?=$row1['dstatus']?></td>
                                                        <td>
                                                            <a href="task-update?id=<?=$row1['id']?>&action=edit&staffuser=<?=$row['userid']?>&staffid=<?=$row['id']?>" class="btn btn-success">Change</a>
                                                            <a href="task-update?id=<?=$row1['id']?>&action=delete&staffuser=<?=$row['userid']?>&staffid=<?=$row['id']?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                         }}
                                                    if(isset($_SESSION['tasks']) and !empty($_SESSION['tasks'])){ ?>
                            <span class='alert alert-primary my-2 d-block text-center'><?php echo $_SESSION['tasks'] ?></span>
                        <?php } 
                                                    if(isset($_SESSION['taskupdate']) and !empty($_SESSION['taskupdate'])){ ?>
                            <span class='alert alert-primary my-2 d-block text-center'><?php echo $_SESSION['taskupdate'] ?></span>
                        <?php } ?>
                        
                                                    <div><a class="popup-form btn btn-info w-full"  href="#tasks" >
                                                Assign Tasks
                                               </a></div>
                                               <!-- popup form here -->
                                            <div class="card mfp-hide mfp-popup-form mx-auto" id="tasks">
                                            <div class="card-body">
                                                <h4 class="mb-4">Assign Staffs Task Here...</h4> 
                                                <form action='assign-task' method='post'>
                                                    <div class="row">
                                                    <input type="hidden" class="form-control" name='userid' value= '<?= $row['userid']?>'>
                                                    <input type="hidden" class="form-control" name='id' value= '<?= $row['id']?>'>
                                                        <div class="col-lg-12">
                                                          <div class="form-group my-2">
                                                            <label for="title">Tasks Title:</label>
                                                            <input type="text" id="title" name="title" class="form-control">
                                                          </div>
                                                          <div class="form-group my-2">
                                                            
                                                            <div class="form-group row">
                                                    <label for="">Start Date:</label>
            <div class="col-md-4">
                <select name="startday" id="" class="form-control">
                <option value="15">Day</option> 
                <?php for($i=1; $i<=31; $i++){
                    if(strlen($i)==1){  $i= '0'.$i; }
                    ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>

                </select>
            </div>

            <div class="col-md-4">
                <select name="startmonth" id="" class="form-control">
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
                <select name="startyear" id="" class="form-control">
                <option value="2022">Year</option>  
                <?php for($i=2025; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
            </div>
        </div>
                                                          </div>
                                                          
                                                        <div class="form-group my-2">
                                                          <div class="form-group row">
                                                    <label for="">Deadline:</label>
            <div class="col-md-4">
                <select name="stopday" id="" class="form-control">
                <option value="15">Day</option> 
                <?php for($i=1; $i<=31; $i++){
                    if(strlen($i)==1){  $i= '0'.$i; }
                    ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>

                </select>
            </div>

            <div class="col-md-4">
                <select name="stopmonth" id="" class="form-control">
                <option value="06">Month</option>  
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
                <select name="stopyear" id="" class="form-control">
                <option value="2022">Year</option>  
                <?php for($i=2025; $i>=1970; $i--){ ?>
                <option value="<?php echo $i; ?>"> <?php echo $i; ?> </option> 
                <?php } ?>          
                </select>
            </div>
        </div>
                                                          </div>
                                                          <div class=" my-2">
                                                            <label for="title">Budget:</label>
                                                            <!-- <span class="input-text">hi</span> -->
                                                            <input type="number" id="title" name="budget" class="form-control" value="00">
                                                          </div>
                                                        </div>
                                                    </div>
                                                     

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary btn-lg" name='submit'>Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                            <!-- popup form here -->
                                                    <!-- <tr>
                                                        <th scope="row">2</th>
                                                        <td>Skote admin Logo</td>
                                                        <td>1 Sep, 2019</td>
                                                        <td>2 Sep, 2019</td>
                                                        <td>$94</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Redesign - Landing page</td>
                                                        <td>21 Sep, 2019</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>$156</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>App Landing UI</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>04 Oct, 2019</td>
                                                        <td>$122</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>Blog Template</td>
                                                        <td>05 Oct, 2019</td>
                                                        <td>16 Oct, 2019</td>
                                                        <td>$164</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Redesign - Multipurpose Landing</td>
                                                        <td>17 Oct, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$192</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>Logo Branding</td>
                                                        <td>04 Nov, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$94</td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/profile.init.js"></script>

          <!-- Magnific Popup-->
          <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- lightbox init js-->
<script src="assets/js/pages/lightbox.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <?php
        unset( $_SESSION['update']);
        unset( $_SESSION['tasks']);
        unset( $_SESSION['taskupdate']);
        ?>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/contacts-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:04:39 GMT -->
</html>



