<?php
 require('inc/config.php');
 require('style.php'); 
 $query = 'SELECT * FROM team ';
 $result = mysqli_query($db,$query);
 $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);



?> 
 


<div class="swiper-container">
    <div class="swiper-wrapper">
    <?php foreach ( $teams as $team) :?>
      <div class="swiper-slide preview " style="
        background-image: url(<?php echo $team ["cover-photo"]; ?>);
    background-size: cover;
    background-position: center;
      
      
      ">
        
      <div class="workText pl-5 pb-5">
           <h3 class="font-weight-bold pl-3" style="font-weight: 900; font-size: 3em; text-transform: uppercase;" ><?php echo $team ["tagline"]; ?></h3>
           <p style="font-size:1.5em;text-transform: uppercase;"><a class="" href="profile.php?id=<?php echo $team['id']; ?>"><?php echo $team ["name"]; ?></a></p>
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