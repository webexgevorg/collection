<?php
session_start();
	include "config/con1.php";
	$msg='';
	if(isset($_POST['name-collection'])){
			$user_id = $_POST['user_id'];
			$name_collection = mysqli_real_escape_string($con, $_POST['name-collection']);
			$description	 = mysqli_real_escape_string($con, $_POST['description']);
			if($name_collection){
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
				$chanaparh = 'img/'.$name2;
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
				{
				    $sql = "INSERT INTO `new_collection_card`
					(`user_id`, `name_of_collection`, `description`) 
					VALUES 
					('$user_id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
						$msg = '<div class="alert alert-success">hajoxutyamb avelacela</div>';
					}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `new_collection_card`
						(`user_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$user_id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
							$msg = '<div class="alert alert-success">hajoxutyamb avelacela</div>';
						}
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					else{
						$msg ='<div class="alert alert-danger">Nkari formaty chi hamapatsxanum</div>';
					}  
				}
			}
			else{
				$msg = 'name_of_checklist partadire lracnel';
			}
	}
	echo $msg;


	if(isset($_POST['btn_save_chenge'])){
		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `collection_first_folder` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `collection_first_folder` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}

		if(isset($_POST['btn_save_chenge2'])){
		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		   
		    $sql = "UPDATE `new_collection_card` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id' AND `user_id`='$uid'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:collection_checklist.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);

				$sql = "UPDATE `new_collection_card` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id' AND `user_id`='$uid'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:collection_checklist.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}

		if(isset($_POST['chenge_second'])){
		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `folder2` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:second_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `folder2` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:second_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}
		
		if(isset($_POST['add_folder'])){
            $folder_position=mysqli_real_escape_string($con, $_POST['folder_position']);
			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_folder = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description = mysqli_real_escape_string($con, $_POST['first_description']);
			if($folder_position=='second_folder'){
				$link='first_folder';
			}
			else{
				$link='collection_checklist';
			}
			if($name_folder){
		if(isset($_POST['add_first_folder'])){

			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_collection = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description	 = mysqli_real_escape_string($con, $_POST['first_description']);
			if($name_collection){
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = $file_name;
				$chanaparh = 'img/'.$name2;
				
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO collection_$folder_position
						(`card_id`, `name_of_folder`, `description`, `image`) 
						VALUES 
						('$id','$name_folder','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:'.$link.'.php?id='.$id.'');
						
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
					
				{
				    $sql = "INSERT INTO `collection_first_folder`
					(`card_id`, `name_of_collection`, `description`) 
					VALUES 
					('$id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
					header('location:collection_checklist.php?id='.$id.'');
				}else {
					echo "sxal";
				}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `collection_first_folder`
						(`card_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:collection_checklist.php?id='.$id.'');
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					  
				}
			
			
	}
	else{
		header('location:'.$link.'.php?id='.$id.'');
	}
			}
			
	}
}

	if(isset($_POST['add_second_folder'])){
			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_collection = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description	 = mysqli_real_escape_string($con, $_POST['first_description']);
			if($name_collection){
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = $file_name;
				$chanaparh = 'img/'.$name2;
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
				{
				    $sql = "INSERT INTO `collection_second_folder`
					(`card_id`, `name_of_collection`, `description`) 
					VALUES 
					('$id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
					header('location:collection_checklist.php?id='.$id.'');
				}else {
					echo "sxal";
				}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `collection_second_folder`
						(`card_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:collection_checklist.php?id='.$id.'');
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					  
				}
			}
			
	}
}
// <!-- verji papkov folder -->
if(isset($_POST['btn_save_chenge_folder2'])){

		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);

		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `collection_first_folder` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'"; 
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `collection_first_folder` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}

			if(isset($_POST['add_first_folder2'])){
			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_collection = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description	 = mysqli_real_escape_string($con, $_POST['first_description']);
			if($name_collection){
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = $file_name;
				$chanaparh = 'img/'.$name2;
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
				{
				    $sql = "INSERT INTO `folder2`
					(`card_id`, `name_of_collection`, `description`) 
					VALUES 
					('$id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `folder2`
						(`card_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:first_folder.php?id='.$id.'');
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					  
				}
			}
			
	}
}
	if(isset($_POST['add_card'])){

	if(isset($_POST['add_second_folder2'])){
			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_collection = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description	 = mysqli_real_escape_string($con, $_POST['first_description']);
			$card_name=mysqli_real_escape_string($con, $_POST['card-name']);
			if($name_collection){
				$array_session=array(
					"id"=>$id, 
					"user_id"=>$user_id, 
					"card_name"=>$card_name,
					"name_collection"=>$name_collection, 
					"description"=>$description
				);
				$_SESSION['card-info']=$array_session;
				header('Location: card-editor.php');
                exit;
			// 	$file_name = $_FILES['file']['name'];
			// 	// $tmp = $_FILES['file']['tmp_name'];
			// 	// $type = $_FILES['file']['type'];
			// 	// $size = $_FILES['file']['size'];
			// 	// $size = round($size/1024);
			// 	// $test = explode('.', $file_name);
			// 	// $extension = end($test);
			// 	// $name2 = $file_name;
			// 	// $chanaparh = 'img/'.$name2;
			// 	if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
			// 	{
			// 	    $sql = "INSERT INTO `card2`
			// 		(`card_id`, `name_of_collection`, `description`) 
			// 		VALUES 
			// 		('$id','$name_collection','$description')";
			// 		$query = mysqli_query($con, $sql);
			// 		if($query){
			// 		header('location:first_folder.php?id='.$id.'');
			// 	}else {
			// 		echo "sxal";
			// 	}
			// 	}
			// 	else
			// 	{
			// 	// 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
			// 	// 		move_uploaded_file($tmp, $chanaparh);
			// 	// 		$sql = "INSERT INTO `card2`
			// 	// 		(`card_id`, `name_of_collection`, `description`, `image`) 
			// 	// 		VALUES 
			// 	// 		('$id','$name_collection','$description','$name2')";
			// 	// 		$query = mysqli_query($con, $sql);
			// 	// 		if($query){
			// 	// 		header('location:first_folder.php?id='.$id.'');
			// 	// 		/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
			// 	// 		$resid = mysqli_query($con, $sqlid);
			// 	// 		$tox = mysqli_fetch_assoc($resid);
			// 	// 		$cid = $tox['id'];*/
			// 	// 	}
					  
			// 	// }
			// }
			if($name_collection){
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = $file_name;
				$chanaparh = 'img/'.$name2;
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
				{
				    $sql = "INSERT INTO `card2`
					(`card_id`, `name_of_collection`, `description`) 
					VALUES 
					('$id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
					header('location:first_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `card2`
						(`card_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:first_folder.php?id='.$id.'');
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					  
				}
			}
			
	}
}
	if(isset($_POST['add_second_folder3'])){
			$id= mysqli_real_escape_string($con, $_POST['id']);
			$user_id = $_POST['uid'];
			$name_collection = mysqli_real_escape_string($con, $_POST['first_folder']);
			$description	 = mysqli_real_escape_string($con, $_POST['first_description']);
			if($name_collection){
				$file_name = $_FILES['file']['name'];
				$tmp = $_FILES['file']['tmp_name'];
				$type = $_FILES['file']['type'];
				$size = $_FILES['file']['size'];
				$size = round($size/1024);
				$test = explode('.', $file_name);
				$extension = end($test);
				$name2 = $file_name;
				$chanaparh = 'img/'.$name2;
				if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
				{
				    $sql = "INSERT INTO `card3`
					(`card_id`, `name_of_collection`, `description`) 
					VALUES 
					('$id','$name_collection','$description')";
					$query = mysqli_query($con, $sql);
					if($query){
					header('location:second_folder.php?id='.$id.'');
				}else {
					echo "sxal";
				}
				}
				else
				{
					if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
						move_uploaded_file($tmp, $chanaparh);
						$sql = "INSERT INTO `card3`
						(`card_id`, `name_of_collection`, `description`, `image`) 
						VALUES 
						('$id','$name_collection','$description','$name2')";
						$query = mysqli_query($con, $sql);
						if($query){
						header('location:second_folder.php?id='.$id.'');
						/*$sqlid = "SELECT MAX(id) as id FROM custom_name_checklist";
						$resid = mysqli_query($con, $sqlid);
						$tox = mysqli_fetch_assoc($resid);
						$cid = $tox['id'];*/
					}
					  
				}
			}
			
	}
}


if(isset($_POST['btn_card'])){

		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
	
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `collection_second_folder` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `collection_second_folder` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}

	if(isset($_POST['btn_card1'])){

		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
	
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `card2` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `card2` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}


	if(isset($_POST['btn_card2'])){

		$id 			 = mysqli_real_escape_string($con, $_POST['id']);
		$name_collection = mysqli_real_escape_string($con, $_POST['name']);
		$description	 = mysqli_real_escape_string($con, $_POST['desc']);
	
		$uid	 = mysqli_real_escape_string($con, $_POST['uid']);
		$file_name = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$size = round($size/1024);
		$test = explode('.', $file_name);
		$extension = end($test);
		$name2 = md5(rand(0,1000). rand(0,1000). rand(0,1000). rand(0,1000)).'.'.$extension;
		$chanaparh = 'img/'.$name2;

		if (!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
		    $sql = "UPDATE `card3` SET `name_of_collection`='$name_collection',`description`='$description' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		else
		{
		// if($size <= 200){
		 	if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
				move_uploaded_file($tmp, $chanaparh);
				$sql = "UPDATE `card3` SET `name_of_collection`='$name_collection',`description`='$description',`image`='$name2' WHERE id='$id'";
				$query = mysqli_query($con, $sql);
				if($query){
					header('location:profile-page.php?id='.$id.'');
				}else {
					echo "sxal";
				}
			}
		//}
		}
	}

?>