<?php include_once 'head.php';
  if(!isset($_SESSION['adm$5log#$!@ged%$#in'])){
    header("Location:index");
} elseif($_SESSION['adm$5log#$!@ged%$#in'] != true){
    header("Location:auth-lock-screen");
}
?>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-10">
                        <?php if(isset($_SESSION['message']) and $_SESSION['message'] == 'Record inserted successfully!'){ ?>
                                           <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                                <?=$_SESSION['message'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php }

                        elseif(isset($_SESSION['message'])){ ?>
                                           <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                           <?=$_SESSION['message'] ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                        <?php } ?>
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h2>Mutual Status Views</h2>
                                        <h5 class="text-primary">Admin Registration</h5>
                                            <p>Kindly provide the required details</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="needs-validation" novalidate action="register-admin-process" method='post' id='myform' enctype="multipart/form-data">

                                    <div class="form-group mb-3">
                                           <label for="firstname">First Name:</label>
                                             <input type="text" class="form-control" placeholder="Enter your first name" id="firstname" name='firstname'>
                                             <div class="invalid-feedback">
                                                Please Enter First Name
                                            </div>
                                         </div>
                                            
                
                                        <div class="form-group invisi mb-3">
                                          <label for="lastname">Last Name:</label>
                                          <input type="text" class="form-control" placeholder="Enter your last name" id="lastname" name='lastname'>
                                          <div class="invalid-feedback">
                                                Please Enter Last Name
                                            </div>
                                        </div>
            
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email" required name='email'>  
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>      
                                        </div>
                
                                        <!-- <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                                            <div class="invalid-feedback">
                                                Please Enter Username
                                            </div>  
                                        </div> -->

                                        <div class="form-group invisi mb-3">
                                           <label for="email">Phone Number:</label>
                                           <input type="text" class="form-control" placeholder="Enter phone number" id="phone" name='phone'>
                                           <span class="error" id="phone-err"></span>
                                        </div>

                                        <div class="form-group invisi mb-3">
                                        <label for="role">Staff Role:</label>
                                            <select name="role" id="role" class='form-control'>
                                                <option value="">---</option>
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                            </select>
                                        </div>

                                        <div class="form-group invisi mb-3">
                                        <label for="img">Staff image:</label>
                                           <input type="file" class="form-control" placeholder="Enter your profile picture" id="img" name='files'>
                                           <span class="error" id="img-err"></span>
                                        </div>
                
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
                    
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name='register'>Register</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <!-- <h5 class="font-size-14 mb-3">Sign up using</h5> -->
            
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="mdi mdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the CPL <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Go to  ? <a href="index" class="fw-medium text-primary"> Login</a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> status views. Crafted with <i class="mdi mdi-heart text-danger"></i> by wendycreates</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- validation init -->
        <script src="assets/js/pages/validation.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote-symfony/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Apr 2022 02:05:44 GMT -->
</html>
