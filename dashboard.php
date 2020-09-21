<?php

require('inc/config.php');
require('style.php');


if(isset($_POST['uploadfilesub'])){

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $status = $_POST['status'];
             

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
   



   $job_photo = $_FILES['uploadfile1']['name'];
   $jobtmpname = $_FILES['uploadfile1']['tmp_name'];
 
   //$array1 = explode($_FILES['uploadfile'],['name']);
 //$file_name_extension = $array1;
   $new_file_name1 = time().rand(1000,9999)."_".$job_photo;
   $folder1="uploads/".date('Y')."/".date('m')."/".date('d');

   if(!is_dir($folder1)){
       mkdir($folder1,0777,true);
       $folder1 = $folder1."/".$new_file_name1;
   }else{
       $folder1 = $folder1."/".$new_file_name1;
   }
   


  move_uploaded_file($jobtmpname, $folder1);
  




       
   $sql = "INSERT INTO `work` SET `title`='{$_POST['title']}',
   `subtitle`='{$_POST['subtitle']}' ,
   `description`='{$_POST['description']}' ,
   `details`='{$_POST['details']}' ,
   `cover-photo`='$folder',
   `job-photo`='$folder1'
   ";
  

 


   $db->query($sql);
   if($db->error){
       echo $db->error;
   }else{
      ($sql);

}


}



?>

<link rel="stylesheet" href="css/mdb.css">
<script src="js/jquery.js"></script>

<style>
.add-project{
    display: none;
}


.add-member{
    display: none;
}


.team{
    display: none;
}

.projects{
    display: none;
}

td:hover{
    cursor: pointer;
    color:tomato;
}


a.td {
    color: white !important;
    padding:0px;
}

a.td:hover {
    color: tomato !important;
    padding:0px;
    cursor: pointer;
}

.td:hover{
    color:tomato;
}

</style>


<div class="container-fluid "
style="
position: relative;
float:right;



"



>
<div class="col-2  " 
style="
    height: 100vh;
    background-color: #231f20;
    color: white;
    position: fixed;
    
"
>
<img src="img/logo.png" alt="" width="100%">
<div class="m-5"></div>
<table class="table text-white ">
   
        <tr>
            <td class="td">Dashboard</td>
        </tr>
  

        <tr>
            <td ><a href="home.php"  class="td">Visit Site</a></td>
        </tr>  
        
        <tr>
            <td id="team"  class="td">Team</td>
        </tr>
    
        <tr>
            <td id="projects"  class="td">Work</td>
        </tr>

        <tr>
            <td  class="td">Log Out</td>
        </tr>

        <tr>
            <td></td>
        </tr>
   
   
</table>

</div>

<div class="col-10 bg-white float-right"
style="
height: 100vh;
"
>
    <div class="container-fluid">
<h1>Dashboard</h1>


<button class="btn btn-sm btn-brown" id="add-member">ADD TEAM MEMBER</button>
<button class="btn btn-sm btn-brown" id="add-project">ADD NEW PROJECT</button>
<br><br>
<div class="row pb-3">
<?php 

require('inc/config.php');


 $query = 'SELECT * FROM team ORDER BY id DESC  ';

 $result = mysqli_query($db,$query);

 $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);

?>
<div class="card col-2 m-3">
    
    <div class="card-body">
        <h5 class="card-title">Members</h5>
        <p class="card-text"></p>
    </div>
    <div class="card-footer">
        <?php echo count($members); ?> Members in Your team
    </div>
</div>


<?php 

require('inc/config.php');


 $query = 'SELECT * FROM work ORDER BY id DESC  ';

 $result = mysqli_query($db,$query);

 $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);

?>
<div class="card col-2 m-3">
    
    <div class="card-body">
        <h5 class="card-title">projects</h5>
        <p class="card-text"></p>
    </div>
    <div class="card-footer">
        <?php echo count($projects); ?> Projects done
    </div>
</div>


</div>
<!--ADD  PROJECT-->
<div class="add-project">
    
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-group container-fluid d-flex ">
     
        <div class="col-4 ">
            <h4 class="pb-1">ADD PROJECT</h4>
            <label for="">Title</label>
            <input type="text" name="title" class="w-100 form-control"><br>
            <label for="">Subtitle</label>
            <input type="text" class="w-100 form-control" name="subtitle"><br>
            <label for="">Description</label>
            <input type="text" class="w-100 form-control" name="description"><br>
            <label for="">Details</label>
            <textarea id="" cols="30" rows="10" name="details" class="w-100 form-control"></textarea><br>
          
    </div>
    <div class="col-4 p-5">
              <label for="">Cover Photo</label><br>
            <input class="text-center btn cloudy-knoxville-gradient form-control-file" type="file" name="uploadfile" id="uploaded" accept=".jpg,.jpeg,.png.,"><br>
            <label for="">Job Photo</label><br>
            <input class="text-center btn blue-gradient-rgba form-control-file" type="file" name="uploadfile1" id="uploaded1" accept=".jpg,.jpeg,.png.,">
        <br><br>
        <input type="submit" name="uploadfilesub" value="SAVE" class="btn ">
       </div>
        
    </form>
    <hr>
</div>

<!--ADD MEMBER-->
<div class="add-member">



<form method="POST" action="teamupload.php" enctype="multipart/form-data" class="form-group  d-flex container-fluid">
    
    <div class="col-4 ">
        <h4 class="pb-1">ADD MEMBER</h4>
        <label for="">Name</label>
        <input type="text" name="name" class="w-100 form-control"><br>
        <label for="">Tagline</label>
        <input type="text" class="w-100 form-control" name="tagline"><br>
        <label for="">Details</label>
        <textarea id="" cols="30" rows="10" name="details" class="w-100 form-control"></textarea><br>
        
</div>
<div class="col-4 p-5 ">
          <label for="">Cover Photo</label><br>
        <input class="text-center btn blue-gradient-rgba form-control-file" type="file" name="uploadfile" id="uploaded" accept=".jpg,.jpeg,.png.,"><br>
       
    <input type="submit" name="uploadfilesub" value="SAVE" class="btn ">
   </div>
    
</form>



</div>

<div class="team">

    <!-- TEAM-->
 <?php
 require('inc/config.php');


 $query = 'SELECT * FROM team ORDER BY id DESC  ';

 $result = mysqli_query($db,$query);

 $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);

 mysqli_free_result($result);





?> 

<table class="table table-responsive table-hover">
    <h3>TEAM MEMBERS</h3>
    <tr>
        <th>COVER PHOTO</th>
        <th>TAGLINE</th>
        <th>NAME</th>
        <th>VIEW</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
<?php foreach ( $teams as $team) :?>
<tr>
    <td><img src="<?php echo $team ["cover-photo"]; ?>" alt="" width="100px"  height="100px"></td>
    <td class="text-uppercase"><?php echo $team ["tagline"]; ?></td>
    <td class="text-uppercase"><?php echo $team ["name"]; ?></td>
    <td><a class="btn btn-sm btn-cyan" href="profile.php?id=<?php echo $team['id']; ?>">View</a></td>
    <td><a class="btn btn-sm deep-blue-gradient" href="editprofile.php?id=<?php echo $team['id']; ?>">Edit</a></td>
    <td><a class="btn btn-sm btn-outline-danger" href="editCoverPrivateTP.php?id=<?php echo $private['id']; ?>">Delete</a></td>
</tr>

<?php endforeach  ;?>
</table>
</div>




<div class="projects">
    <!--WORK-->
    <?php
    require('inc/config.php');
   
   
    $query = 'SELECT * FROM work ORDER BY id DESC  ';
   
    $result = mysqli_query($db,$query);
   
    $works = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
    mysqli_free_result($result);
   
   
   
   
   
   ?> 
   
   <table class="table table-responsive table-hover">
       <h3>PROJECTS DONE</h3>
       <tr>
           <th>COVER PHOTO</th>
           <th>TITLE</th>
           <th>SUBTITLE</th>
           <th>VIEW</th>
           <th>EDIT</th>
           <th>DELETE</th>
       </tr>
   <?php foreach ( $works as $work) :?>
   <tr>
       <td><img src="<?php echo $work ["cover-photo"]; ?>" alt="" width="100px"  height="100px"></td>
       <td class="text-uppercase"><?php echo $work ["title"]; ?></td>
       <td class="text-uppercase"><?php echo $work ["subtitle"]; ?></td>
       <td><a class="btn btn-sm btn-cyan" href="profile.php?id=<?php echo $team['id']; ?>">View</a></td>
       <td><a class="btn btn-sm deep-blue-gradient" href="editCoverPrivateTP.php?id=<?php echo $private['id']; ?>">Edit</a></td>
       <td><a class="btn btn-sm btn-outline-danger" href="editCoverPrivateTP.php?id=<?php echo $private['id']; ?>">Delete</a></td>
   </tr>
   
   <?php endforeach  ;?>
   </table>
   </div>

    

   
      
   
   


</div>


</div>



<script>
    $(document).ready(function() {
    
    $( '#add-member' ).click(function () {
    $('.add-member').toggle();
    $('.add-project').hide();
    $('.projects').hide();
    $('.team').hide();
    });
    
    $( '#add-project' ).click(function () {
    $('.add-project').show();
    $('.add-member').hide();
    $('.projects').hide();
    $('.team').hide();
    
    });
    


    $( '#projects' ).click(function () {
    $('.projects').show(); 
    $('.team').hide(); 
    $('.add-project').hide();
    $('.add-member').hide();
    
    });
    

    $( '#team' ).click(function () {
    $('.projects').hide(); 
    $('.team').show(); 
    $('.add-project').hide();
    $('.add-member').hide();
    
    });

  
    
    
    
    });
    
        
    </script>
  
