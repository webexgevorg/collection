<?php
$status_array=array('0' => 'Unpublished', '1' => 'Publishing');
if(isset($_POST['sel-news-status'])){
		
		$_SESSION['status']=$_POST['sel-news-status'];
		
		if(isset($_SESSION['status'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
		else{
            echo "<option value='0' name='aa'>Unpublished</option>
		          <option value='1' name='aa'>Publishing</option>";		
		}
}
?>