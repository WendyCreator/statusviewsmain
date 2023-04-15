<?php 
include_once 'head.php';
include_once 'header.php';
include_once 'admin-control/config.php';
$plan = (isset($_REQUEST['plan']))?$_REQUEST['plan']:'';
if($plan){
  $plan = cleanInput($plan);
  $plan = strtolower($plan);
    if($plan == cleanInput('basic')){
      $amount = 1000;
    } 
    else if($plan == cleanInput('advance')){
      $amount = 1500;
    } 
    else if($plan == cleanInput('premium')){
      $amount = 2000;
    }
    else {
      $amount = 5000;
    }
}
?>

<br><br><br><br>
      <!-- ======= On Form Section ======= -->
      <section id="payment" class="onfocus d-non p-1 my-5">
      <div class="container-fluid p-0" data-aos="fade-up">

        <div class="row g-0">
          <div class="col-lg-12 video-pla position-relative shadow-lg p-4">
            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->
            <div class="text">
            <h2 class="text-center text-bg-success p-4">You Selected the <?=$plan?> Plan</h2>
              <p class="text-center alert alert-info" id="msg">Please Fill in the required information accurately</p>
              
          
            </div>
           <div class="container">
           <form action="" method="post" id="paymentForm" role="form">
              <div class="form-group my-4">
                <label for="email-address" class="form-label">Email Address</label>
                  <input type="email" id="email-address" class="form-control shadow-sm p-2" required />
              </div>
              <div class="form-group my-4">
                
                <label for="amount"class="form-label">Amount to be payed</label>
                  <input type="tel" id="amount" value='<?=isset($amount)?$amount:2000;?>' class="form-control shadow-sm p-2" required readonly/>
              </div>
              <div class="form-group my-4">
                  <label for="first-name" class="form-label">Member Name</label>
                     <input type="text" id="first-name" class="form-control shadow-sm p-2" required  />
              </div>
              <div class="form-group my-4 d-none">
                  <label for="last-name" class="form-label">Last Name</label>
                     <input type="text" id="last-name" class="form-control shadow-sm p-2" required  />
              </div>

              <div class="row">
                <div class="col-5">
                <div class="form-group my-2">
                <label for="country" class="form-label">Country Code:</label>
                <select name="code" id="country" class="form-select shadow-sm p-2">
                  <option value="+234">+234 &nbsp; Nigeria</option>
                 
                </select>
              </div>
                </div>
                <div class="col-7">
                <div class="form-group my-2">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="number" class="form-control  shadow-sm p-2" id="phone" name="phone">
              </div>
                </div>
              </div>
              <!-- <input type="hidden" id="password" name="password"> -->
              <div class="form-submit">
              <button type="submit" class="read-more align-self-start btn btn-success my-4 mx-2 p-3" name="submit"><span>Continue to Payment</span><i class="bi bi-arrow-right"></i></button>

             

              <!-- <div class="form-submit">
    <button type="submit" onclick="payWithPaystack()"> Pay </button>
  </div> -->
             

              </div>
            </form>

            <form id="user-details" method="post">
              <input type="hidden" id="password" name="password">
              <input type="hidden" id="user-email" name="user-email">
              <input type="hidden" id="user-plan" name="plan1" value="<?=$plan?>">
              <input type="hidden" id="amount-paid" name="amount-paid"   value="<?=isset($amount)?$amount:2000;?>">
              
              </form>
           </div>
          </div>
          <div class="col-lg-6 d-none">
            <div class="content d-flex flex-column justify-content-center h-100">
              <h3>Why Choose StatusViews</h3>
              <p class="fst-italic">
              We have built a fundamental platform that covers all areas of concern:
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i>Wide range of contacts</li>
                <li><i class="bi bi-check-circle"></i>  User-friendly platform</li>
                <li><i class="bi bi-check-circle"></i> Dedicated customer support</li>
                <li><i class="bi bi-check-circle"></i>Subscription options</li>
                <li><i class="bi bi-check-circle"></i>  Discover new interests</li>
                <li><i class="bi bi-check-circle"></i>  Your  Convenience is our priority</li>
              </ul>
              
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End On Form Section -->


 <!-- ======= Footer ======= -->
 <script src="https://js.paystack.co/v1/inline.js"></script>

 <?php 
 include_once 'footer.php';
 ?>