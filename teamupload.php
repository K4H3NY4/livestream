    <?php

require('inc/config.php');
require('style.php');


if(isset($_POST['uploadfilesub'])){

    $name = $_POST['name'];
    $tagline = $_POST['tagline'];
    $details = $_POST['details'];
  
             

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
   







       
   $sql = "INSERT INTO `team` SET `name`='{$_POST['name']}',
   `tagline`='{$_POST['tagline']}' ,
   `details`='{$_POST['details']}' ,
   `cover-photo`='$folder'
  
   ";
  

 


   $db->query($sql);
   if($db->error){
       echo $db->error;
   }else{
      ($sql);

      header('Location: dashboard.php');


}


}



?>
