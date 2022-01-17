<?php
$status_array=array('0' => 'Read', '1' => 'Unread');
if(isset($_POST['sel-publications-status'])){
		
		$_SESSION['status_publications']=$_POST['sel-publications-status'];
		
		if(isset($_SESSION['status_publications'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_publications']==$key){
                   echo "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					echo "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status_publications'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_publications']==$key){
                   echo "<option value='$key'  selected>$value</option>";
				}
				else{
					echo "<option value='$key' >$value</option>";
				}
			}
		}
		// if there is no session type this value  0 or 1
		else{
            echo "<option value='0'>Unread</option>
		          <option value='1'>Read</option>";		
		}
}
?>