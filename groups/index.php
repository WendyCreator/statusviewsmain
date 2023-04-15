<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mutual Whatsapp Status Viewer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo2.png" rel="icon">
  <link href="../assets/img/logo2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="../assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <link href="../assets/css/variables-green.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

 
</head>



<?php 


include_once '../head.php';
// include_once 'header.php';
include_once '../admin-control/config.php';
?>

<div class="d-flex align-items-center justify-content-center shadow-lg">

      <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        
        <img src="../assets/img/logo3.png" alt="" height="300">
      </a>
</div>
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <!-- <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated"> -->
      <img src="../assets/img/hero-carousel/status.jpg" class="img-fluid animated">
      <h2> Click to <span>Join any Group of Your Choice</span></h2>
     
    </div>
  </section>


  <section>
    <div class="container-fluid p-3">
        <div class="row">
           <div class="col-12">
            <h3 class="display-6 my-2 text-secondary">Search by Category</h3>
           <form action="" method="get">
            <div class="form-floating input-group">
                <select name="group" id="" class="form-select shadow-sm">
                <?php
                                                $category = formQuery("SELECT * FROM ceecategories ");
                                                if($category->num_rows > 0){
                                                    while($rowcat=$category->fetch_assoc()){
                                                ?>
                                                <option><?=$rowcat['ctitle']?></option>
                                                <?php } } ?>
                </select>
                <button class="input-group-text btn btn-primary" name="search">Search Groups</button>
                <a href="groups" class="input-group-text btn btn-success">All Groups</a>
            </div>
           </form>
           </div>
           <div class="col-12">
            <div class="row">
            <?php if(isset($_GET['search'])){
                                if(!empty($_GET['group'])){
                                    $search = cleanInputField('group');
                           
                                    // Search the database...
                                   
                                    $sql = formQuery("SELECT * FROM ceegroups WHERE gcategory = '$search'");
                                    if($sql->num_rows>0){ 
                                        $num = 1;
                                        $fade = 100;
                                        while($row=$sql->fetch_assoc()){
                                  
                                            
                                    ?>
                
<section class="col-12 col-md-6 col-lg-3">
                    <div class="card my-4 shadow-lg" data-aos="fade-up">
                        <div class="card-body" data-aos="fade-up" data-aos-delay="<?=$fade+=100?>">
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
                                            <img class="img-fluid rounded avatar-sm" src="./admin-control/<?php echo ($row['gimage'] != 'no image')? $row['gimage'] :'assets/img/images/26.'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['gtitle']?></a></h5>
                                        <p class="text-muted">Group Admin:  <?=$row['groupadmin']?></p>
                                        <p class="text-muted">Group Category:  <?=$row['gcategory']?></p>

                                        <div>
                                            <a href="<?=$row['grouplink']?>" class="btn btn-primary m-2" target="_blank">Join Group</a>
                                            
                                        </div>
                        </div>
                    </div>
                </section>

                <?php } } } } 

else{ 
    $sql = formQuery("SELECT * FROM ceegroups");
    if($sql->num_rows>0){
         $num = 1;
         $fade = 100;
        while($row=$sql->fetch_assoc()){
  
            
    ?>

<section class="col-12 col-md-6 col-lg-3">
                    <div class="card my-4 shadow-lg" data-aos="fade-up">
                        <div class="card-body" data-aos="fade-up" data-aos-delay="<?=$fade+=100?>">
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
                                            <img class="img-fluid rounded avatar-sm" src="./admin-control/<?php echo ($row['gimage'] != 'no image')? $row['gimage'] :'assets/img/images/26.'?>" alt="">
                                        </div>
                                        <h5 class="font-size-15 mb-1 fullname"><a href="javascript: void(0);" class="text-dark"><?= $row['gtitle']?></a></h5>
                                        <p class="text-muted">Group Description:  <?=limit_text($row['gdesc'])?></p>
                                        <p class="text-muted">Group Admin:  <?=$row['groupadmin']?></p>
                                        <p class="text-muted">Group Category:  <?=$row['gcategory']?></p>

                                        <div>
                                            <a href="<?=$row['grouplink']?>" class="btn btn-primary m-2" target="_blank">Join Group</a>
                                            
                                        </div>
                        </div>
                    </div>
                </section>

                <?php } } } ?>
            </div>
           </div>
        </div>
    </div>
  </section>





  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="footer-info">
          <h3>StatusViews</h3>
          <p>
            Lekki Phase <br>
            Lagos, Nigeria<br><br>
            <strong>Phone:</strong> +234 5589 55488 55<br>
            <strong>Email:</strong> info@statusviews.com<br>
          </p>
        </div>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="/about">About us</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="/#services">Services</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="/contact">Services</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="/terms">Terms of service</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="/terms">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)">Connecting interest</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)">User-friendly platform</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)">Subcription Option</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)">Marketing</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)">Customer Reliabliity</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Our Newsletter</h4>
        <p>Join our news letter to get all updates</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>

      </div>

    </div>
  </div>
</div>

<div class="footer-legal text-center">
  <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

    <div class="d-flex flex-column align-items-center align-items-lg-start">
      <div class="copyright">
        &copy; Copyright <strong><span>StatusViews</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="#">WendyCreator</a>
      </div>
    </div>

    <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

  </div>
</div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/code.js"></script>
<!-- <script src="../assets/js/paystack.js"></script> -->

</body>

</html>