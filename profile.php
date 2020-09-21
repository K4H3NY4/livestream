
<?php
require('inc/config.php');
include('header.php');

$id = mysqli_real_escape_string($db, $_GET['id']);

$query = 'SELECT * FROM team WHERE id = '.$id;


$result = mysqli_query($db,$query);

$team = mysqli_fetch_assoc($result);






?>

<!-- member profile picture-->
<section class="container-fluid s" style="
   height: 70vh;
    width: 100%;
    background-color: grey;
    background-image: url(<?php echo $team ["cover-photo"]; ?>);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
   
</section>

<div style="padding:60px"></div>

<section class="container">
    <div class="col-lg-7 col-xl-7 col-sm-12">
        <h2 style="
     font-size: 6rem;
     
     text-transform: uppercase;
    font-weight: bold;
    color: #f38120;
            

            "><?php echo $team ["tagline"]; ?></h2>
        <h3 style="font-size: 4.5em;
        font-weight: 100; color:red; text-transform: uppercase;"><?php echo $team ["name"]; ?></h3>
        <p style="font-size: 1.6em; font-weight: 300;">
        <?php echo $team ["details"]; ?>
        </p>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

<i class="las la-angle-down" style="font-size: 50px; font-size: 48px;
            color: black; position: relative;
            left: 48%; padding-bottom:50px; padding-top:50px; margin:0;  "></i>
            

</section>

<div class="container-fluid view-more pt-5">
    VIEW MORE PROFILES <br>

    <img src="img/chevron.png" alt="" class="bottomChevron">
</div>

  <?php
include('teamscroll.php');
include('partners.php');

?>