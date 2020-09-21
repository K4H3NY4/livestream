<?php
require('inc/config.php');
include('header.php');

$id = mysqli_real_escape_string($db, $_GET['id']);

$query = 'SELECT * FROM work WHERE id = '.$id;


$result = mysqli_query($db,$query);

$work = mysqli_fetch_assoc($result);




?>


<!-- video section-->
<section class="container-fluid workVideo" style="
height: 70vh;
    width: 100%;
    background-color: grey;
    background-image: url(<?php echo $work ["cover-photo"]; ?>);
    background-attachment: fixed;
    background-size: cover;
    background-position: center;
   


">
        


        </section>
    
        <div style="padding: 30px;"></div>
        <!-- work details-->
       
        <section class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-7 col-sm-12">
                    <h2 class="font-weight-bolder" style="font-size: 3em;"><?php echo $work ["title"]; ?></h2>
                     <h3 style="font-size: 2em;"><?php echo $work ["subtitle"]; ?></h3>   
                     <h4 class="font-weight-lighter" style="font-size: 2em;"><?php echo $work ["description"]; ?></h4>
                     <br>
                     <p style="    margin-top: 0;
                     margin-bottom: 1rem;
                     font-size: 1.5em;
                     font-weight: 300;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquam erat
                        volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        Duis autem vel eum iriure dolor in hendrerit in
                        vulputate velit esse molestie consequat, vel illum
                        dolore eu feugiat nulla facilisis at vero eros et </p>
                </div>
    
                <div class="col-lg-4 col-xl-4 col-sm-12 ">
               <img src="<?php echo $work ["job-photo"]; ?>" alt="" style="    vertical-align: middle;
                    border-style: none;
                    position: relative;
                    bottom: 10px;
                    padding-top:20vh;
                    
                    width: 100%">
                </div>
            </div>
        <br>
        <br>
        <br>
        <br>
        <br>
           <i class="fa fa-angle-down " style="
                color: #999;
                font-weight: 100;
                  "></i>
        </section>

           <!--view more work-->

   <div class="container-fluid view-more pt-5">
    VIEW MORE WORK <br>

    <img src="img/chevron.png" alt="" class="bottomChevron">
</div>



<?php
 require('style.php'); 
 $query = 'SELECT * FROM work  ';
 $result = mysqli_query($db,$query);
 $works = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);



?> 


<div class="swiper-container">
    <div class="swiper-wrapper">
    <?php foreach ( $works as $work) :?>
      <div class="swiper-slide preview " style="
        background-image: url(<?php echo $work ["cover-photo"]; ?>);
    background-size: cover;
    background-position: center;
      
      
      ">
        <div class="workText pl-3 pb-3">
      
      <h5><a class="" href="project.php?id=<?php echo $work['id']; ?>"><?php echo $work ["title"]; ?></a></h5>
      <p class="pl-3"><?php echo $work ["subtitle"]; ?></p>
      <small class="pl-3"><?php echo $work ["description"]; ?></small>
      </div>
      
        
     </div>
     <?php endforeach  ;?>
      
      
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <?php

  include('partners.php');

  ?>

<!-- Swiper JS -->
<script src="js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    direction: getDirection(),
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      resize: function () {
        swiper.changeDirection(getDirection());
      }
    }
  });

  function getDirection() {
    var windowWidth = window.innerWidth;
    var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

    return direction;
  }
</script>