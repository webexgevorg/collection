<?php
$status_array=array('0' => 'Unread', '1' => 'Read');
$option = "";
if(isset($_POST['sel-publications-status'])){

		$_SESSION['status_publications']=$_POST['sel-publications-status'];
		
		if(isset($_SESSION['status_publications'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_publications']==$key){
                   $option .= "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					$option .= "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status_publications'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_publications']==$key){
                    $option .= "<option value='$key'  selected>$value</option>";
				}
				else{
                    $option .= "<option value='$key' >$value</option>";
				}
			}
		}
		// if there is no session type this value  0 or 1

}
?>