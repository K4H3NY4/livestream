<?php

$db = new mysqli( "localhost","root","","livestream");
if($db ->connect_error){
    exit("Cannot connect to the database");
}





?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   

   
<script src="../js/jquery.js"> </script>
<link rel="stylesheet" href="css/bootstrap-4.2.1.css">
<link rel="stylesheet" href="css/livestream.css">
<link rel="stylesheet" href=".css/animate.css">
<link rel="stylesheet" href="css/swiper.css">
<link rel="stylesheet" href="css/swiper.css">

</head>
<style>



</style>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark "> 
    <a class="navbar-brand livestreamlogo ml-5" href="#"></a>

<img src="../img/ic_menu_white_18dp.png" alt="" class="d-lg-none d-xl-none  openMobile" id="mobile-menu">
<div class="mobile-menu animated slideInRight " >

    <li class=""> <a class="nav-link1" href="work.php">Work</a></li>
    <li class=""> <a class="nav-link1" href="grace.html">About Us</a></li>      
    <li class=""> <a class="nav-link1 " href="team.php">Team</a> </li>
    <li class=""> <a class="nav-link1 " href="#">Services</a> </li>
    <li class=""> <a class="nav-link1" href="#">Blog</a> </li>
    <li class=""> <a class="nav-link1" href="#">Contact</a> </li>
<br><br>
    <img src="../img/ic_close_white_24dp.png" alt="" id="closeMobile">


</div>
      <ul class="navbar-nav mr-auto pr-5 d-xl-flex d-lg-flex  d-sm-none d-none  d-md-none" style="text-transform: uppercase; position: absolute;right: 0px;">
        
        <li class=""> <a class="nav-link1" href="work.php">Work</a></li>
        <li class=""> <a class="nav-link1" href="grace.html">About Us</a></li>      
        <li class=""> <a class="nav-link1 " href="team.php">Team</a> </li>
        <li class=""> <a class="nav-link1 " href="#">Services</a> </li>
        <li class=""> <a class="nav-link1" href="#">Blog</a> </li>
        <li class=""> <a class="nav-link1" href="#">Contact</a> </li>
      </ul> 
    
  </nav>

  <style>
 
 body {

  
   font-size: 14px;

   margin: 0;
   padding: 0;
 }
 .swiper-container {
   width: 100%;
   height: 50%;
 }
 .swiper-slide {
  
   background: #fff;
 height: 50vh;
 width: 50vw !important;
   /* Center slide text vertically */
   
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   -webkit-justify-content: center;
   justify-content: center;
   -webkit-box-align: center;
   -ms-flex-align: center;
   -webkit-align-items: center;
 
 }

 @media (max-width: 760px) {
   .swiper-button-next {
     right: 20px;
     transform: rotate(90deg);
   }

   .swiper-button-prev {
     left: 20px;
     transform: rotate(90deg);
   }


   .swiper-slide {
 
   font-size: 18px;
   background: #fff;
 height: 50vh;
 width: 100vw !important;
 }

 .swiper-button-prev,
.swiper-button-next {
position: absolute;
top: 50%;
width: calc(var(--swiper-navigation-size) / 44 * 27);
height: var(--swiper-navigation-size);
margin-top: calc(-1 * var(--swiper-navigation-size) / 2);
z-index: 10;
cursor: pointer;
display: flex;
align-items: center;
justify-content: center;
color: var(--swiper-navigation-color, var(--swiper-theme-color));
}

.swiper-container {
   width: 100%;
   height: 100%;
 }


}


</style>




  <script>
  $(document).ready(function() {
  
  $( '#tsec1' ).click(function () {
  $('.tsec1').toggle();
  $('.tsec2').toggle();
  });
  
  $( '#tsec2' ).click(function () {
  $('.tsec1').toggle();
  $('.tsec2').toggle();
  
  });
  
  $( '#tsec3' ).click(function () {
  $('.tsec1').toggle();
  $('.tsec2').toggle();
  
  });
  
  $( '#tsec4' ).click(function () {
  $('.tsec1').toggle();
  $('.tsec2').toggle();
  
  });
  
  $( '#mobile-menu' ).click(function () {
  $('.mobile-menu').show();
  
  
  });
  
  
  $( '#closeMobile' ).click(function () {
  $('.mobile-menu').hide();
  
  });
  
  
  });
  
      
  </script>


