<?php
 require('inc/config.php');
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