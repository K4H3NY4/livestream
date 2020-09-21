<?php
 
 require('inc/config.php');
 require('style.php');
 

 $query = 'SELECT * FROM work ORDER BY id DESC  LIMIT 4 ';

 $result = mysqli_query($db,$query);

 $works = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);





?>  
<section class="container-fluid row  animated fadeInUp delay-0s  " >
  <!-- work preview-->
  <?php foreach ( $works as $work) :?>

        <div class="col-lg-6 col-sm-12 preview p-1 " style="
         background-image: url(<?php echo $work ["cover-photo"]; ?>);
    background-size: cover;
 /*   border-style: solid;
    border-width: 10px;*/
    background-position: center;"
    >

            <div class="workText pl-3 pb-3">
      
            <h5><a class="" href="project.php?id=<?php echo $work['id']; ?>"><?php echo $work ["title"]; ?></a></h5>
            <p class="pl-3"><?php echo $work ["subtitle"]; ?></p>
            <small class="pl-3"><?php echo $work ["description"]; ?></small>
            </div>
            
        </div>

       
        <?php endforeach  ;?>
        <div class="container-fluid view-more pt-5">
    VIEW MORE WORK <br>

    <img src="img/chevron.png" alt="" class="bottomChevron">
</div>

        


    </section> 