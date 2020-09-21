<?php
 require('inc/config.php');
 require('style.php');
 include('header.php');
 

 $query = 'SELECT * FROM team ORDER BY id DESC  ';

 $result = mysqli_query($db,$query);

 $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);





?>






    <div class="container align-self-center" style="padding-top:150px;">
        <h1 style="text-align: center;font-size: 4em;
        font-weight: 900;">MEET THE PEOPLE <br>BEHIND THE WORK</h1>

        <div style="padding:30px;"></div>

        <P style="text-align: center;    
        margin-top: 0;
        margin-bottom: 1rem;
        font-size: 2em;
        font-weight: 500;
    " class="ml-5 mr-5">We believe that ideas have the power to change people’s perceptions and
            therefore change the world. <span style="font-weight:200;">
                Ut wisi enim ad minim veniam, quis nostrud
                exerci tation ullamcorper suscipit lobortis nisl ut aliquip.
                <br>
                <i class="las la-angle-down" style="font-size: 50px; font-size: 48px;
            color: black; text-align:center; padding: 35px;"></i>
            </span></P>
            
    </div>

    <div style="padding: 25px;"></div>
    
    <div class="container">
   
        <div class="row ">
        <?php foreach ( $teams as $team) :?>
        <div class="col-6 preview  border-10" style="  
        background-image: url(<?php echo $team["cover-photo"]; ?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-position: center;
    ">
    <div class="workText pb-3 text-uppercase">
            <h4 class="pl-3"><?php echo $team ["tagline"]; ?></h4>
            <P><a class="" href="profile.php?id=<?php echo $team['id']; ?>"><?php echo $team ["name"]; ?></a></P>
            </div>
        </div>
        
        <?php endforeach  ;?>
     
</div>

<i class="las la-angle-down" style="font-size: 50px; font-size: 48px;
color: black; position: relative;
left: 48%; padding-bottom:50px; padding-top:50px; margin:0;  "></i>

    </div>

<div class="m-5 p-5"></div>

    <div class="container-fluid view-more pt-5">
    VIEW OUR WORK <br>

    <img src="img/chevron.png" alt="" class="bottomChevron">
</div>
 
<?php
include('workscroll.php');
include('partners.php');
    

    ?>