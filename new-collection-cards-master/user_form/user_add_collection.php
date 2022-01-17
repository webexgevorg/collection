<?php
include "../config/con1.php";
	if(!empty($_POST['name-collection']) && !empty($_POST['description']) && !empty($_FILES['file']['name'])){
			$user_id = $_POST['user_id'];
			$name_collection = mysqli_real_escape_string($con, $_POST['name-collection']);
			$description	 = mysqli_real_escape_string($con, $_POST['description']);
			
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = time().'.'.$extension;
				$chanaparh = '../img/'.$name2;
				
				move_uploaded_file($tmp, $chanaparh);
				$sql = "INSERT INTO new_collection_card	(user_id, name_of_collection, description, image) 
				VALUES ($user_id, '$name_collection', '$description', '$name2')";
				$query = mysqli_query($con, $sql);
				if($query){
					$msg = '<div class="alert alert-success">Collection successfully added</div>';
					header('location:../user-collections.php');
				}
					
			
	}
?>