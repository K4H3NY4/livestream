<?php
require('inc/config.php');
include('header.php');
$id = mysqli_real_escape_string($db, $_GET['id']);

$query = 'SELECT * FROM team WHERE id = '.$id;


$result = mysqli_query($db,$query);

$team = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    $update_id = mysqli_real_escape_string($db, $_POST['update_id']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $tagline = mysqli_real_escape_string($db, $_POST['tagline']);
    $details = mysqli_real_escape_string($db, $_POST['details']);


    $cover_photo = $_FILES['uploadfile']['name'];
    $covertmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'uploads/';
    //$array1 = explode($_FILES['uploadfile'],['name']);
  //$file_name_extension = $array1;
    $new_file_name = time().rand(1000,9999)."_".$cover_photo;
    $folder="uploads/".date('Y')."/".date('m')."/".date('d');

    if(!is_dir($folder)){
        mkdir($folder,0777,true);
        $folder = $folder."/".$new_file_name;
    }else{
        $folder = $folder."/".$new_file_name;
    }
    


   move_uploaded_file($covertmpname, $folder);
   
    $query = "UPDATE team SET
       `name`='{$_POST['name']}',
   `tagline`='{$_POST['tagline']}' ,
   `details`='{$_POST['details']}' ,
   `cover-photo`='$folder'
        WHERE id = {$update_id}
    ";

$db->query($query);
if($db->error){
    echo $db->error;
}else{
    echo ("");
}
}

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

<section class="container d-flex">
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

    <div class="col-5">
        
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-group  d-flex container-fluid">
    
    <div class="col-12 ">
        <h4 class="pb-1">EDIT PROFILE</h4>
        <label for="">Name</label>
        <input type="text" name="name" class="w-100 form-control" value="<?php echo $team['name']; ?>"><br>
        <label for="">Tagline</label>
        <input type="text" class="w-100 form-control" name="tagline" cols="30" rows="10" value="<?php echo $team['tagline']; ?>"><br>
        <label for="">Details</label>

        
        <textarea id="" cols="30" rows="10" name="details" class="w-100 form-control" value=" "><?php echo $team ["details"]; ?> </textarea><br>
        

          <label for="">Cover Photo</label><br>
        <input class="text-center btn blue-gradient-rgba form-control-file" type="file" name="uploadfile" id="uploaded" accept=".jpg,.jpeg,.png.," value="<?php echo $team['cover-photo']; ?>"><br>
        <input type="hidden" name="update_id" value="<?php echo $team['id']; ?>">
        
    <input type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">
   </div>
    
</form>
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