<?php 
include_once 'head.php';
include_once 'header.php';
include_once 'admin-control/config.php';
?>


<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <!-- <img src="assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated"> -->
      <img src="assets/img/hero-carousel/status.jpg" class="img-fluid animated">
      <h2> Click to <span>Join any Group of Your Choice</span></h2>
     
    </div>
  </section>


  <section>
    <div class="container">
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
                    <div class="card my-4 shadow-sm" data-aos="fade-up">
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
                    <div class="card my-4 shadow-sm" data-aos="fade-up">
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
  <?php 
 include_once 'footer.php';
 ?>