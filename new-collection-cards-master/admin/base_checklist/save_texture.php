<?php

//import.php

include "../../config/con1.php";

if(isset($_FILES["texture_name"]["name"]) && $_FILES["texture_name"]["name"] != '')
{
	$texture_val=$_POST['texture_hidd_val'];
	$exp_arr=explode("@", $texture_val);
	$set_type=$exp_arr[0];
	$parallel=$exp_arr[1];
echo $parallel;
	$allowed_extension = array('jpg', 'png', 'jpeg');
	$file_array = explode(".", $_FILES["texture_name"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name =time() . '.' . $file_extension;
		move_uploaded_file($_FILES['texture_name']['tmp_name'], "../textures/".$file_name);
		
   $sql="UPDATE base_checklist SET color='$file_name' WHERE set_type='$set_type' and parallel='$parallel'";
    
			if( mysqli_query($con, $sql)){
				$message='<div class="alert alert-success">File added</div>';
			}
			else{
				$message="error";
			}
	}
	else
	{
		$message = '<div class="alert alert-danger">Only .jpg .png or .jpeg file allowed</div>';
	}
	echo $message;
}

else
{
	$p_texture=mysqli_real_escape_string($con, $_POST['p_texture']);
  	$set_type=mysqli_real_escape_string($con, $_POST['set_type']);
  	$parallel=mysqli_real_escape_string($con, $_POST['parallel']);

  	
     
     $sql1="UPDATE base_checklist SET color='$p_texture' WHERE set_type='$set_type' and parallel='$parallel'";
     if(mysqli_query($con, $sql1)){
				$message='<div class="alert alert-success">Image added</div>';

     }
     else{
     	$message='error';
     }
     echo $message;
}



?>