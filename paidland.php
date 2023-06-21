<?php 
include_once 'head.php';
include_once 'header.php';
include_once 'admin-control/config.php';
?>



  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <!-- <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated"> -->
      <img src="assets/img/team/smile3.jpg" class="img-fluid animated" id="imgshow">
      <h2>Congratulations! You are now a Member of <span>StatusViews</span></h2>
      <!-- <p>Mutual Whatsapp Status Viewer... Let's Skyrocket your Whatsapp Views</p> -->
      <div class="d-flex">
        <a href="#pricing" class="btn-get-started scrollto d-none">Get Started</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        
      </div>
      <div class="d-flex m-4 justify-between px-5 w-full d-none">
      <a href="#entry" class="btn-get-started scrollto m-2 d-block"><span>Submit Entry</span>&nbsp;<i class="bi bi-arrow-right"></i></a>
        <a href="user-panel/index" class="btn-get-started scrollto m-2 d-block"><span>Login</span>&nbsp;<i class="bi bi-arrow-down"></i></a>
      </div>
    </div>
  </section>


  <main>
   <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">
         <h2 class="col-12 text-primary">4 Easy steps to follow... After payment</h2>
          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Get your details</a></h4>
              <p>Immediately your payment is completed, your login details will be sent to your mail. Get it</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Click on the link Provided</a></h4>
              <p>Click on the 'Click to login' button sent in the mail to get to the user-panel then insert the provided login details accordingly</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Save your Contact</a></h4>
              <p>Click on the add contact link on your dashboard to register your contact</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Set up your profile</a></h4>
              <p>Click on the add member link to set up your profile. </p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-xl-3 col-md-6 d-none" data-aos="zoom-out" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Start downloading</a></h4>
              <p>You nw have unlimited access to download all contacts </p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->
  </main>


  <?php 
 include_once 'footer.php';
 ?>

 <script>
    const showimg = document.querySelector('#imgshow')
    const images = [ 'smile3.jpg', 'smile1.avif','smile2.avif','smile4.avif','smile5.avif','smile6.avif','smile7.avif','smile8.avif','smile9.avif','smile0.avif']
    let num = 0;
    const changeImg =  ()=>{
        if(num > 9) num=0
        showimg.src = `assets/img/team/${images[num]}`
        num++
    }

const changenow = setInterval(changeImg, 3500)
 </script>