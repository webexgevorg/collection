<?php
class uploadImage {
	public function upl($folder_img, ){
		if(isset($_POST['btn'])){
     echo "<meta http-equiv='refresh' content='2'>";
        
	           $name=$_POST['img'];
	       //   echo $name;
              // ==========uploaded image banner===============                 
             $img=$_FILES['img']['name'];
             $tmp=$_FILES['img']['tmp_name'];
                                  
             $type=$_FILES['img']['type'];
             $format=explode(".", $img);
             $extantion=end($format);
             // $folder="../../images_banner/".$img;
             $file_name =$folder_img. time() . '.' . $extension;
             // $folder=$folder_img.$img;

            if($extantion != "jpg" && $extantion != "png" && $extantion != "jpeg"){
              
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed in URL banner image";
            }
              else{
              
                    move_uploaded_file($tmp, $file_name);
                                   echo "Image moved";
              }
  }          
	}
}


?>