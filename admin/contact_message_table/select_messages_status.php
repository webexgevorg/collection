<?php
$status_array=array('0' => 'Unread', '1' => 'Read');
$option = "";
if(isset($_POST['sel-messages-status'])){

		$_SESSION['status_messages']=$_POST['sel-messages-status'];

		if(isset($_SESSION['status_messages'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_messages']==$key){
                   $option .= "<option value='$key' name='aa' selected>$value</option>";
				}
				else{
					$option .= "<option value='$key' name='aa'>$value</option>";
				}
			}
		}
}
else{
	if(isset($_SESSION['status_messages'])){
			foreach ($status_array as $key => $value) {
				if($_SESSION['status_messages']==$key){
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